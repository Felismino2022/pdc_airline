@extends('layouts.cliente')
@section('titulo', 'Preencher Informações dos Passageiros')
@section('content')


<br><br><br><br><br>


<div id="test">

</div>

<form action="/info_passageiro" method="post">
    @csrf
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="my-3">
                <p><strong class="text-vermelho">*</strong>Campos Obrigatórios</p>
                </div>
                <!--inicio acordian-->
                    <div class="accordion" id="accordionExample">

                    <!--inicio item -->
                    @for($i = 1; $i <= $adult; $i++)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="adulto{{$i}}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
                            <h4 >Adulto{{$i}}</h4>
                            </button>
                            </h2>
                            <div id="collapse{{$i}}" class="accordion-collapse collapse <?php if($i == 1) echo 'show' ?>" aria-labelledby="adulto{{$i}}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                
                                 <!--campos-->
                                 <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label for="nameadulto{{$i}}"><strong >Nome:<strong class="text-vermelho">*</strong></strong></label>
                                                
                                                    <input type="text" id="nameadulto{{$i}}" class="form-control" name="nameadulto{{$i}}" 
                                                                required autofocus value="{{old('nameadulto1')}}"> 
                                                                @error('nameadulto1')
                                                                <span class="text-danger"><small>{{$message}}</small></span>
                                                                @enderror   
                                            </div>
                                        </div>

                                        <div class="col-6">
                                        <div class="form-group mb-3">
                                                <label for="sobrenomeadulto{{$i}}"><strong >Sobrenome:<strong class="text-vermelho">*</strong></strong></label>
                                                    <input type="text" placeholder="Sobrenome" id="sobrenomeadulto{{$i}}" class="form-control" name="sobrenomeadulto{{$i}}" 
                                                                required autofocus value="{{old('sobrenomeadulto1')}}">    
                                                                @error('sobrenomeadulto1')
                                                                <span class="text-danger"><small>{{$message}}</small></span>
                                                                @enderror
                                            </div>
                                            <input type="text" name="tarifa" id="" value="{{$tarifa->id}}" hidden>
                                            <input type="text" name="id_voo" id="" value="{{$id_voo}}" hidden>
                                            <input type="text" name="adult" id="" value="{{$adult}}" hidden>
                                            <input type="text" name="totalpassageiro" id="" value="{{$totalpassageiro}}" hidden>

                                        </div>
                                    </div><!--fim row-->
                                    
                                    <!--inicio2 row-->
                                    <div class="row">
                                        <div class="col-6">
                                        <div class="form-group mb-3">
                                                <label for="telefone{{$i}}"><strong >Telefone:<strong class="text-vermelho">*</strong></strong></label>
                                                    <input type="text" id="telefone{{$i}}" class="form-control" name="telefone{{$i}}" 
                                                                required autofocus value="{{old('telefone1')}}">  
                                                                @error('telefone1')
                                                                <span class="text-danger"><small>{{$message}}</small></span>
                                                                @enderror  
                                            </div>
                                        </div>

                                            <div class="col-6">
                                                <div class="form-group mb-3">
                                                <label for="email{{$i}}"><strong >Email:<strong class="text-vermelho">*</strong></strong></label>
                                                    <input type="email"  id="email{{$i}}" class="form-control" name="email{{$i}}"
                                                    required autofocus >           
                                                </div>
                                            </div>
                                    </div><!--fim row2-->


                                    

                                <!--fim campo-->
                                </div>
                            </div>
                        </div> <!--inicio item -->
                        @endfor

                        <!--criança-->
                        @if($crianca)
                        @for($i = 1; $i <= $crianca; $i++)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="crianca{{$i}}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collaps{{$i}}" aria-expanded="true" aria-controls="collaps{{$i}}">
                            <h4>Criança{{$i}}</h4>
                            </button>
                            </h2>
                            <div id="collaps{{$i}}" class="accordion-collapse collapse" aria-labelledby="crianca{{$i}}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                
                                 <!--campos-->
                                 <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label for="namecrianca{{$i}}"><strong >Nome:<strong class="text-vermelho">*</strong></strong></label>
                                                
                                                    <input type="text" id="namecrianca{{$i}}" class="form-control" name="namecrianca{{$i}}" 
                                                                required autofocus value="{{old('namecrianca1')}}"> 
                                                                @error('namecrianca1')
                                                                <span class="text-danger"><small>{{$message}}</small></span>
                                                                @enderror   
                                            </div>
                                        </div>

                                        <div class="col-6">
                                        <div class="form-group mb-3">
                                                <label for="sobrenomecrianca{{$i}}"><strong >Sobrenome:<strong class="text-vermelho">*</strong></strong></label>
                                                    <input type="text" placeholder="Sobrenome" id="sobrenomecrianca{{$i}}" class="form-control" name="sobrenomecrianca{{$i}}" 
                                                                required autofocus value="{{old('sobrenomecrianca1')}}">    
                                                                @error('sobrenomecrianca1')
                                                                <span class="text-danger"><small>{{$message}}</small></span>
                                                                @enderror
                                            </div>
                                            

                                        </div>
                                    </div><!--fim row-->
                                    
                                    <!--inicio2 row-->
                                    <div class="row">
                                        <div class="col-6">
                                        <div class="form-group mb-3">
                                        <div class="form-group mb-3">
                                            <label for="aniversario"><strong >Data de Nascimento:<strong class="text-vermelho">*</strong></strong></label>
                                            <input type="date"  id="aniversario" class="form-control" name="aniversario" value="{{old('aniversario')}}"
                                                required autofocus>
                                                @error('aniversario')
                                                <span class="text-danger"><small>{{$message}}</small></span>
                                                @enderror
                                    </div>  
                                                                @error('telefone1')
                                                                <span class="text-danger"><small>{{$message}}</small></span>
                                                                @enderror  
                                            </div>
                                        </div>

                                            <div class="col-6">
                                                <div class="form-group mb-3">
                                                <label for="genero"><strong >Genero:<strong class="text-vermelho">*</strong></strong></label>
                                                <select name="genero" id="genero" class="form-control" required autofocus>
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Feminino</option>
                                                </select>       
                                                </div>
                                            </div>
                                    </div><!--fim row2-->


                                    

                                <!--fim campo-->
                                </div>
                            </div>
                        </div> <!--inicio item -->
                        @endfor
                        @endif
                    
                    </div><!--fim acordian-->
                
                    <!--verif-->

                <div class="">
                    <h4>Pagamento</h4>
                    <hr>
                    <div>O total a pagar é AOA </div>
                    <hr>
                    <div id="total_pagar"> </div>
                
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Multicaixa Pagamento por Referencia                    </label>
                    </div>
                    <div class="form-check" hidden>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                    <label class="form-check-label" for="flexRadioDefault2">
                        Cartão de Credito
                    </label>
                    </div>
            
                <div style="text-align: right;">
                <button type="submit" class="btn btn-primary">Submeter</button>
            </div>
        </div>
        </div>
            
                    <!--ter-->
            </div>
        </div>
    </div>
   
</form>

<div class="mb-5">

</div>

<script type="text/javascript">
  
</script>

@endsection
