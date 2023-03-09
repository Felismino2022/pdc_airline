@extends('layouts.cliente')
@section('titulo', 'SELECIONAR LUGAR')
@section('content')

<br><br><br><br><br>
<div class="container">
<div class="row mb-5">

    <div class="col-sm-8">

    @foreach($voos as $voo)
    <div class="card my-4">
        <div class="card-header">
            Featured
        </div>
    
        <div class="card-body ">
            <h4><strong>PARTIDA</strong> </h4>
            <div class="row">
                <div class="col-10">
                    <h4><strong>{{date('H:i', strtotime($voo->data_partida))}}</strong> ------------------------------- <ion-icon name="airplane-outline"></ion-icon> -------------------------------  <strong>{{date('H:i', strtotime($voo->data_regresso))}}</strong></h4>
                    <p>{{$voo->origem->cidade}} </p>
                </div>
                <div class="col-2">
                    <p class="text-center">{{$voo->destino->cidade}}</p>
                </div>
                
            </div>
            
            
            <hr class="bg-dark">
            <h4><strong>REGRESSO</strong> </h4>
            <div class="row">
                <div class="col-10">
                    <h4><strong>{{date('H:i', strtotime($voo->data_regresso))}}</strong> ------------------------------- <ion-icon name="airplane-outline"></ion-icon> -------------------------------  <strong>{{date('H:i', strtotime($voo->data_partida))}}</strong></h4>
                    <p>{{$voo->destino->cidade}} </p>
                </div>
                <div class="col-2">
                    <p class="text-center">{{$voo->origem->cidade}}</p>
                </div>
                {{$voo->preco}}
            </div>
            
           
            
            <div class="col-md-2 offset-5" >
                <button type="button" class="btn btn-primary">Selecionar</button>
            </div>
                
        </div>
    </div>
    @endforeach
</div>
</div>
</div>
@endsection