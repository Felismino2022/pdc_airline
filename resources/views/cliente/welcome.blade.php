@extends('layouts.cliente')
@section('titulo', 'HOME')
@section('content')

<?php
    $enc = new App\Classes\Encri;
?>


  
	<header  class="gtco-cover gtco-cover-md my-5" role="banner" style="background-image: url(/img/aviao4.jpg)">
		
        
		<div class="gtco-container">
            
			<div class="row">
				
            <!--começo-->
            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-0 text-left " >
            
                <div class="container-fluid h-50" >
                <div class="row align-items-center justify-content-center text-center p-3" >
                <div class="col-lg-12 col-sm-12 col-xs-12 align-self-end mb-4 page-title p-5">
                <div class="col-md-12 col-sm-12 col-xs-12 mb-2 text-left" id="altura">
                <div id="divisor" class="text-white my-2 p-3">
                    
                    <p class="text-center">SEJA BEM-VINDO AO PDC AIRLINE</p>
                </div>
                    <div class="card">
                   
                        <div class="card-body">
                    
						<div class="row form-group m-2">
                                    <div class="col-md-2 col-6 text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="trip" id="onewway" value="1" checked>
                                            <label class="form-check-label" for="onewway">
                                            Ida
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6 col-sm- text-center">
                                        <div class="form-check">
                                        <label class="form-check-label" for="rtrip">
                                            Ida e volta
                                            </label>
                                            <input class="form-check-input" type="radio" name="trip" id="rtrip" class="volta" value="2">
                                            
                                        </div>
                                    </div>
									<!--fim-->
                            
                                <div class="row form-group m-3">

									
                                    <div class="col-md-3 col-6 col-sm-5">
                                        <label for="" class="control-label">De</label>
                                        <select name="origem" id="origem" class="custom-select browser-default select2 form-control">
										@foreach($aeroportos as $aeroporto)
											<option value="{{$aeroporto->id}}">{{$aeroporto->cidade}}</option>
										@endforeach
                                            
                                        </select>
                                        <span id="tex-origem"></span>
                                    </div>
                                    <div class="col-md-3 col-6 col-sm-5">
                                        <label for="" class="control-label">Para</label>
                                        <select name="destino" id="destino" class="custom-select browser-default select2 form-control">
                                        @foreach($aeroportos as $aeroporto)
											<option value="{{$aeroporto->id}}">{{$aeroporto->cidade}}</option>
										@endforeach
										  
                                        </select>
                                        <span id="tex-destino" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-3 col-6 col-sm-5">
                                        <label for="" class="control-label">Data de partida</label>
                                        <input type="date" class="form-control input-sm datetimepicker2" 
                                        name="data_partida" id="data_partida" autocomplete="off">
                                        
                                        <span id="text-data" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-3 col-6 col-sm-5" id="rdate" style="display: none">
                                        <label for="" class="control-label">Data de Volta</label>
                                        <input type="date" id="rdate" class="form-control input-sm datetimepicker2 data_volta" 
                                        name="date_volta" autocomplete="off">
                                        <span id="text-dataVolta" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="row form-group m-3">
                                    
                                  
                                    <div class="col-md-3 offset-md-3 col-12 col-sm-6  mt-4">
                                        <button class="btn btn-block btn-sm btn-primary" id="encontrar_voo" 
                                       >Encontar voos</button>
									   
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>                        
                </div>
                
            </div>
        </div>
            <!---->

					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
								
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							
						</div>
					</div>
							
					
				</div>
			</div>
		</div>
	</header>

	

	
	<div class="gtco-section container">
		<div class="gtco-container2">
			
			<div class="row" id="info-voo">
            @if($voos)
                <p class="text-center listaVoo">Listas de Voos Disponiveis</p>
                @endif
				<div class="col-md-8 col-sm-8 col-md-offset-2 text-center gtco-heading">
               
				</div>
			</div>
			<div class="row " id="lista_voo">
			
			@foreach($voos as $voo)
				<div class="col-lg-4 col-md-4 col-sm-6 col-6">
					<a href="{{route('voo', ['id' => $enc->encriptar($voo->id)])}}" class="fh5co-card-item">
						
							<img src="{{asset('../img/paris.jpg')}}" alt="Image" class="img-responsive">
					
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
	
	<!--carrossel-->
	<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!--fim carrossel-->
	
	</div>
<!--fim-->
	</div>

    
	
<script src="/js/cliente.js"></script>
<script type="text/javascript">


</script>


@endsection

