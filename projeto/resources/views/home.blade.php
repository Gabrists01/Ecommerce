<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop - Ecommerce</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
    <a href="#" class="navbar-brand">MyShop</a>
    <div class="collapse navbar-collapse">
        <div class="navbar-nav">
             <a class="nav-link" href="#">HOME</a>
             <a class="nav-link" href="#">Categorias</a>
             <a class="nav-link" href="#">Cadastrar</a>
            </div>
        </div>
        <a href= "#" class="btn-sm"><i class="fa fa-shopping-cart"></i></a>

    </nav>
    <div class="container">
        <div class="row">
            <div class="col-3 mb-3">
                <div class="card">
                    <img src="{{asset('imagens/produto1.jpg')}}" class ="card-img-top"/>
                    <div class="card-body">
                        <h6 class="card-title">Produto 1</h6>
                        <a href ="#" class="btn btn-sm btn-secondary">Adicionar Item</a>
                    </div>
                </div>
            </div>

            <div class="col-3 mb-3">
                <div class="card">
                    <img src="{{asset('imagens/produto2.jpg')}}" class ="card-img-top"/>
                </div>
            </div>
            <div class="col-3 mb-3">
                <div class="card">
                    <img src="{{asset('imagens/produto3.jpg')}}" class ="card-img-top"/>
                </div>
            </div>
            <div class="col-3 mb-3">
                <div class="card">
                    <img src="{{asset('imagens/produto4.jpg')}}" class ="card-img-top"/>
                </div>
            </div>
            <div class="col-3 mb-3">
                <div class="card">
                    <img src="{{asset('imagens/produto5.jpg')}}" class ="card-img-top"/>
                </div>
            </div>
            <div class="col-3 mb-3">
                <div class="card">
                    <img src="{{asset('imagens/produto6.jpg')}}" class ="card-img-top"/>
                </div>
            </div>
           
        </div>
    </div>
</body>
</html>