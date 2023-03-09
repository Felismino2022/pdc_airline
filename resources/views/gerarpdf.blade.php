<?php
    $enc = new App\Classes\Encri;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdf do Bilhete</title>

    <style>
        img{
            width:12rem;
            height: 7rem;
            
        }
    </style>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
   

    <!--info pdf-->
    
    <h1 class="text-center">PDC<span  style="color: #6BB5E6;">AIRLINE</span> </h1>
    <div style="text-align: center;">
        <img src="{{public_path('img/aviao4.jpg')}}" alt="">
    </div>

<div class="py-5">
    <h2 class="text-center">Dados da Compra</h2>
    <div class="col-md-10 offset-1">
        
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Codigo da Reserva</th>
                    <th>Data da Compra do bilhete</th>
                    <th>Hora da compra</th>
                    <th>Quantidade de Passageiro</th>
                    <th>Data de Partida</th>
                    <th>Hora de Partida</th>
                </tr>
            </thead>
                
            <tbody>
                <tr>
                    <td>{{$bilhete->codigo}}</td>
                    <td>{{date('Y-m-d', strtotime($bilhete->data_compra))}}</td>
                    <td>{{date('H:i', strtotime($bilhete->data_compra))}}</td>
                    <td>{{$bilhete->qtd_passageiro}}</td>
                    <td>{{$voo->data_partida}}</td>
                    <td>{{$voo->hora_partida}}</td>      
                </tr>
            </tbody>
        </table>

        <div class="py-3">
            <p>{{$voo->origem->cidade}} -- {{$voo->destino->cidade}}</p>
        </div>

        <div class="py-3">
            <p>Total  <strong class="mx-4">{{$totalValor}}</strong></p>
        </div>

        <h2 class="text-center">Dados Passageiro</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>email</th>
                </tr>
            </thead>
                
            <tbody>
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->email}}</td>   
                </tr>
            </tbody>
        </table>  
    </div>
</div>

<p class="text-warning">Salut</p>

</body>
</html>