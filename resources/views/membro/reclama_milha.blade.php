@extends('layouts.membro')
@section('titulo','Reclamar Milhas')
@section('content')


<p>Voou nos últimos três meses com a nossa compania aerea e as suas milhas não foram atribuídas? Preencha o formulário abaixo com os detalhes do seu voo e submeta a reclamação das milhas.</p>
      

                @if(session('msg'))
					<div class="alert alert-primary " role="alert">
						{{session('msg')}}
					</div>
                @endif

            <h3 class="text-primary">Dados Pesssoais</h3>

            <div class="row">
                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="nome_pri">Primeiro Nome:</label>
                                        <input type="text"  id="nome_pri" class="form-control" name="nome_pri" value="{{$user_membro->name}}"
                                            required autofocus disabled>
                                       
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="sobre_nome">Ultimo Nome:</label>
                                        <input type="text"  id="sobre_nome" class="form-control" name="sobre_nome" value="{{$user_membro->surname}}"
                                            required autofocus disabled>
                                       
                                    </div>
                                </div>
                            </div>


                <h3 class="text-primary">Dados do Voo</h3>
                <form action="/dados_reclame" method="post">
                    @csrf
                    <div class="row">


        <div class="col-10">
                <div class="col-4">
                    <label for="bilhete_id">Número do bilhete</label>
                    <div class="form-group">
                        <input type="text" name="bilhete_id" id="bilhete_id" class="form-control" placeholder="numero do bilhete" >
                    </div>
                </div>
                </div>
                            <div class="col-4 ">

                            <div class="form-group my-3">
                                <label for="title">Descrição:</label>
                                <textarea name="descricao" id="descricao" class="form-control" placeholder="Descreva de forma suicinta as tuas reclamação" value="{{$membro->address}}"></textarea>
                            </div>    
                            <div style="text-align: right;" class="py-5">
                                <button type="submit" class="btn btn-primary btn-rigth" >Submeter</button>
                            </div>
                    </div>
                    </div>

                    
                    </form>

@endsection