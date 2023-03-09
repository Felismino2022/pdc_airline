@extends('layouts.cliente')
@section('titulo', 'SELECIONAR LUGAR')
@extends('layouts.sidebar')
@section('content')
 


<br><br><br><br><br>


<div class="container">
<div class="row mb-5" >

    <div class="col-sm-8" >

    <div class="card" hidden>
    <div class="card-header">
        Featured
    </div>
    <div class="card-body">
        <h4>PARTIDA</h4>
       <span id="partida">
       {{date('d/m/Y', strtotime($voo->data_partida))}}
    </span> 
    <span id="regresso">
       {{date('d/m/Y', strtotime($voo->data_regresso))}}
    </span> 
    <span id="hora_partida_cidade_origem">
      <strong> {{date('H:i', strtotime($voo->data_partida))}}</strong> {{$partida->cidade}}
    </span>
    <span id="hora_partida_cidade_destino">
      <strong>{{date('H:i', strtotime($voo->data_regresso))}}</strong> {{$regresso->cidade}}
    </span>

        
        <p>{{$partida->cidade}} ----------- <ion-icon name="airplane-outline"></ion-icon> ------------ {{$regresso->cidade}}</p>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <hr>
        <h4>REGRESSO</h4>
        <p>{{$regresso->cidade}} ----------- <ion-icon name="airplane-outline"></ion-icon> ------------ {{$partida->cidade}}</p>

        
            <p class="text-right">1500</p>
            <p class="text-right">Por passageiro</p>
        
            <div class="col-md-2 offset-5" >
                <button type="button" class="btn btn-primary">Selecionar</button>
            </div>  
    </div>
    </div>
</div>
</div>
</div>

<div class="container px-5" >
<div class="row">
    <div class="col-md-8 col-7 col-sm-7">
        <div class="card" id="pessoalTarifa">
                <div class="card-body">
                    <div class="row  mx-3 ">
                        <div class="col-md-6 col-sm-12 col-12">
                        <input  type='text'  id='id_voo' value="{{$voo->id}}" hidden>
                        <label for="" class="control-label">Passgeiros:</label>
                        <br>
										<div class="dropdown">
											<button class="dropbtn">
												<span id="passageiros" >1 passageiro</span>
											</button>
										<!--Adulto-->
											<div class="dropdown-content p-2">
                                                <div class="row">
												<div class="col-md-12 col-12">
														<div class="passageiro-number">
															<label for="">Adulto</label>
															<div class="counter pull-right __web-inspector-hide-shortcut__">
																<span class="rounded-circle bg-primary p-2" onclick="decrementar('adults-number', 'Adulto')">-</span>
																	<input maxlength="1" type="text" id="adults-number" name="adults" value="1" disabled="">
																<span class="rounded-circle bg-primary p-2" onclick="increment('adults-number','Adulto')" >+</span>
															</div>
														</div>
												</div><!--fim passageiro-->  
                                                </div>
                                                <!--Criança-->
                                                <div class="row">
												<div class="col-md-12">
														<div class="passageiro-number">
                                                         <label for="">criança</label>
															<div class="counter pull-right __web-inspector-hide-shortcut__">
																<span class="rounded-circle bg-primary p-2" onclick="decrementar('crianca-number', 'crianca')">-</span>
																	<input maxlength="1" type="text" id="crianca-number" name="crianca-number" value="0" disabled="">
																<span class="rounded-circle bg-primary p-2" onclick="increment('crianca-number', 'crianca')" >+</span>
															</div>
														</div>
												</div><!--fim passageiro-->  
                                                </div>
                                    
                                </div>

                                
                            </div>
                            
                        </div>
                        
                        <div class="col-md-6 col-sm-12 col-12 ">

     

                            <label for="" class="control-label">Classe</label>
							<select name="classe" id="classe" class="custom-select browser-default select2 form-control">
										@foreach($tarifas as $tarifa)
											<option value="{{$tarifa->preco}}">{{$tarifa->nome}}</option>
										@endforeach			  
                            </select>
                            <div class="my-3">
                            <input type="button" id="btn_tarifa"  value="selecionar" onclick="selecionarTarifa()">
                            </div>
                        </div>
                        
                    </div>

                    
                </div>
        </div>
        <div class="row">
        <div class="col-md-12 col-12">

            <div class="py-5" >
                <h3>{{$partida->cidade}} - {{$regresso->cidade}}</h3> 
                @auth
                @else
                <div style="background-color:#FFF;" class="p-4" id="conta">
                    <h4><strong> Já tens uma conta?</strong></h4>
                    <p class="text-center">Inicie a sessão para efectuares a reserve mais depressa? </p>
                    <div class="text-center">
                    <button id="btn" type="button" data-toggle="modal" data-target="#exampleModalLong">Iniciar Sessao</button>
                    </div>
                </div>
                @endauth
            </div>

            <div class="escolher_lugar my-5" style="background-color:#FFF;">
                <p><strong id="tamnho" >Corredor ou janela?</strong> Escolhe o teu lugar agora para evitares decepções</p>
            </div>
                   
        </div>
        
    </div><!--fim da row-->
    </div>

    <div class="col-md-4 col-5 col-sm-5">                                    <!--Detalhes da compra-->
        

        <div class="card" style="width: 30rem;">
        <img src="{{asset('../img/paris.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h3 class="card-title">A sua reserva</h3>
                    <span id="adult"></span>    <span id="crian"></span>
                    <div id="data_partida"></div>
                    <div id="hor_cidade_origem"></div>
                    <div id="hor_cidade_destino"></div>
                    <div id="tarif"></div>
                    <div id="preco_total"></div>
                    <div id="preco"></div>
                    <div id="data_regresso"></div>
            </div>
        </div>

                            <!--fim detalhe-->
            </div>
    </div>
    
</div>




<div id='qtd_passageiros' hidden>1</div>

<!--detalhes-->



<!--fim detalhes-->

<!--selecionar lugar-->
<div class="container">


                <div class="row">
                    <div class="col-md-3 col-sm-5 col-12">
                        <span id="livre" class="text-white bg-primary py-1 px-3 mx-2"></span> 
                        <span class="text-dark">Livre</span>
                        <span id="ocupado" style="background-color:black" class="text-white py-1 px-3 mx-2"></span> 
                        <span class="text-dark">ocupado</span>
                        <span id="selecionado" class="text-white bg-success py-1 px-3 mx-2"></span>  
                        <span class="text-dark">selecionado</span> 
                        <hr> 
                    </div>   
                    <div class="col-8">  
                        
                    </div>
                </div><!--fim row2-->
            <div class="row">
                <div class="col-4">
                 <p>Todos os lugares</p>
                 @php
                
                    foreach($lugares as $lugar){
                        if(in_array($lugar,$array_lugares_ocupados)){
                            
            @endphp
            <span id="@php echo $lugar @endphp" style="background-color:black" class="place text-white my-3 py-6 px-3 mx-2 " >@php echo $lugar @endphp</span>
                    @php     }else{ @endphp
                        <span id="num@php echo $lugar @endphp" style="background-color:blue;" class="place text-white my-3 py-6 px-3 mx-2 point lugares" onclick="selec_lug(@php echo $lugar @endphp)" value="@php echo $lugar @endphp"> 
                         @php echo $lugar @endphp
                       
                         
                        </span>
                       @php    
                        }
                    }
                    @endphp
                 
                 <div class="container py-4">
                    <button class="btn btn-primary btn-sm" onclick="getUser()" >Seguinte</button>
                </div>
                </div>
                
                <div class="col-8" id="pass_lugares"></div>
                <div id="preco_apagar" hidden></div>
        
            </div><!--fim row3-->
            </div>


  

    
    <input  type='text'  id='num_lugar' name="num_lugar" hidden>
    <input  type='text'  id='id_voo' name="{{$voo->id}}" hidden>
    

<script src="/js/selec_lugar.js"></script>
<script src="/js/teste.js"></script>
<script type="text/javascript">
</script>
@endsection
