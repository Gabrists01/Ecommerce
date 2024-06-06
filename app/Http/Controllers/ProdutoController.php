<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;
use App\Services\VendaService;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use App\Models\ItensPedido;

class ProdutoController extends Controller
{
    protected $vendaService;

    public function __construct(VendaService $vendaService)
    {
        $this->vendaService = $vendaService;
    }

    public function index(Request $request)
    {
        $data = [];

        // Buscar os produtos
        $listaProdutos = Produto::all();
        $data["lista"] = $listaProdutos;

        return view("home", $data);
    }

    public function categoria(Request $request, $idcategoria = 0)
    {
        $data = [];

        $listaCategorias = Categoria::all();
        $queryProduto = Produto::limit(4);

        if ($idcategoria != 0) {
            $queryProduto->where("categoria_id", $idcategoria);
        }

        $listaProdutos = $queryProduto->get();

        $data["lista"] = $listaProdutos;
        $data["listaCategoria"] = $listaCategorias;
        $data["idcategoria"] = $idcategoria;

        return view("categoria", $data);
    }

    public function adicionarCarrinho($idProduto = 0, Request $request)
    {
        // Buscar produto por Id
        $prod = Produto::find($idProduto);
        if ($prod) {
            // Encontrou produto

            // Buscar da sessão o carrinho atual
            $carrinho = session('cart', []);

            array_push($carrinho, $prod);
            session(['cart' => $carrinho]);
        }
        return redirect()->route("home");
    }

    public function verCarrinho(Request $request)
    {
        $carrinho = session('cart', []);
        $data = ['cart' => $carrinho];

        return view("carrinho", $data);
    }

    public function excluirCarrinho($indice, Request $request)
    {
        $carrinho = session('cart', []);
        if (isset($carrinho[$indice])) {
            unset($carrinho[$indice]);
        }
        session(["cart" => $carrinho]);
        return redirect()->route("ver_carrinho");
    }

    public function finalizar(Request $request)
    {
        $prods = session('cart', []);

        // se de que o usuário está autenticado
        $user = Auth::user();
        if (!$user) {
            $request->session()->flash('err', 'Usuário não autenticado');
            return redirect()->route("ver_carrinho");
        }

        
        $vendaService = $this->vendaService;
        $result = $vendaService->finalizarVenda($prods, $user);

        if ($result["status"] == "ok") {
            $request->session()->forget("cart");
        }

        $request->session()->flash($result["status"], $result["message"]);
        return redirect()->route("ver_carrinho");
    }
    public function historico(Request $request){
        $data =[];

        $idusuario = \Auth::user()->id;
        $listaPedido = Pedido::where("usuario_id", $idusuario)
            ->orderBy("datapedido", "desc")
            ->get();

            $data["lista"] = $listaPedido;

        return view("compra/historico", $data);

    }
    public function detalhes(Request $request)
    {
        $idpedido = $request->input('idpedido');
        
        $listaItens = ItensPedido::join('produtos', 'produtos.id', '=', 'itens_pedidos.produto_id')
            ->where('itens_pedidos.pedido_id', $idpedido)
            ->get(['produtos.nome as produto_nome', 'itens_pedidos.quantidade', 'itens_pedidos.valor as valoritem']);

        return view('compra.detalhes', compact('listaItens'));
    }

    public function pagar(Request $request){
        $data = [];

        return view("compra/pagar", $data);

    }
}