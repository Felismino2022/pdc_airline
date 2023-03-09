@extends('layouts.cliente')
@section('titulo', 'Lista de voos')
@section('content')

<?php
    $enc = new App\Classes\Encri;
?>


<div class="gtco-section" id="mg-listar">
		<div class="gtco-container2">
			
			<div class="row" id="info-voo">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Listas de Voo Disponiveis</h2>
				</div>
			</div>
			<div class="row " id="lista_voo">
			
			
			@foreach($voos as $voo)
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="{{route('voo', ['id' => $enc->encriptar($voo->id)])}}" class="fh5co-card-item">
						
							<img src="../img/paris.jpg" alt="Image" class="img-responsive">
					
						<div class="fh5co-text">
							<h2>{{$voo->destino->cidade}} - {{$voo->destino->pais}}</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
							<button type="btn" class="btn btn-primary">Comprar já</button>
						</div>
					</a>
				</div>
			@endforeach
			</div>
		</div>
	</div>
	
@endsection