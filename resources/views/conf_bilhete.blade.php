@extends('layouts.cliente')
@section('titulo', 'SELECIONAR LUGAR')
@section('content')


<br><br><br><br>
<div class='container my-5'>
                <div class='card'>
                <div class='card-body'>
                    <h5 class='card-title'></h5>
                    <p class='card-text'> </p>
                    <p class='card-text'></p>
                    <div class="row">
                        <h4 class="text-dark">Pesquise O seu Blihete Pelo Codigo</h4>
                        <div class="col">
                        <input class="form-control me-2" type="search" placeholder="Search" id="codigo_voo" aria-label="Search">

                        </div>
                        <div class="col">
                        <button class="btn btn-primary" onclick='getVooByid()'>Search</button>

                        </div>
                    </div>
                   
                   
                </div>
            </div>
            </div>

    <div class="container" id="painel">
        
    </div>

    <br><br><br>
    <div class="my-5">

    </div>

    <script src="/js/cli/clientBi.js"></script>
@endsection