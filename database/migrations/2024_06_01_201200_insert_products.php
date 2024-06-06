<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $cat = new \App\Models\Categoria(['categoria' => 'Geral']);
        $cat->save();

        


        $prod = new \App\Models\Produto(['nome'=>'Produto 1','valor'=>10, 'foto'=> 'imagens/produto1.jpg', 'descricao'=> '', 'categoria_id'=> $cat->id]);
        $prod->save();


        $prod2 = new \App\Models\Produto(['nome'=>'Produto 2','valor'=>10, 'foto'=> 'imagens/produto2.jpg', 'descricao'=> '', 'categoria_id'=> $cat->id]);
        $prod2->save();


        $prod3 = new \App\Models\Produto(['nome'=>'Produto 3','valor'=>10, 'foto'=> 'imagens/produto3.jpg', 'descricao'=> '', 'categoria_id'=> $cat->id]);
        $prod3->save();

        $prod4 = new \App\Models\Produto(['nome'=>'Produto 4','valor'=>10, 'foto'=> 'imagens/produto4.jpg', 'descricao'=> '', 'categoria_id'=> $cat->id]);
        $prod4->save();


        $prod5 = new \App\Models\Produto(['nome'=>'Produto 5','valor'=>10, 'foto'=> 'imagens/produto5.jpg', 'descricao'=> '', 'categoria_id'=> $cat->id]);
        $prod5->save();

        $prod6 = new \App\Models\Produto(['nome'=>'Produto 6','valor'=>10, 'foto'=> 'imagens/produto6.jpg', 'descricao'=> '', 'categoria_id'=> $cat->id]);
        $prod6->save();


        



        
        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
