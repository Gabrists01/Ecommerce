@extends('layout')

@section('scriptjs')
<script>
    $(function() {
        $(".infocompra").on('click', function(){
            let id = $(this).data("value");
            let csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '{{ route("compra_detalhes") }}',
                type: 'POST',
                data: {
                    idpedido: id,
                    _token: csrfToken
                },
                success: function(result) {
                    $("#conteudopedido").html(result);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Erro: ' + textStatus + ' - ' + errorThrown);
                }
            });
        });
    });
</script>
@endsection

@section('conteudo')

<div class="col-12">
    <h2>Minhas Compras</h2>
</div>

<div class="col-12">
    <table class="table table-bordered">
        <tr> 
            <th>Data da Compra</th>
            <th>Situação</th>
            <th></th>
        </tr>
        @foreach($lista as $ped)
            <tr>
                <td>{{ (new DateTime($ped->datapedido))->format('d/m/Y H:i') }}</td>
                <td>{{ $ped->statusDesc() }}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-info infocompra" data-value="{{ $ped->id }}" data-toggle="modal" data-target="#modalcompra">
                        <i class="fas fa-shopping-basket"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalcompra" tabindex="-1" role="dialog" aria-labelledby="modalCompraLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCompraLabel">Detalhes da Compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="conteudopedido"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

@endsection
