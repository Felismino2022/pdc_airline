@extends('layouts.membro')
@section('titulo','Dados do Usuario')
@section('content')


<main class="signup-form">
    <div class="cotainer">
        <div class="row text-dark">
            <div class="col-8 offset-2">
            @if(session('msg'))
					<div class="alert alert-primary " role="alert">
						{{session('msg')}}
					</div>
                @endif
                <div class="card" id="card-membro">
                        <img src="/img/passageiro1.jpg" class="card-img-top" id="img1" alt="...">
                        <div class="card-body membro" >
                            <div>
                            <h1>Bem-vindo ao Membro Pdc</h1> 
                            <p class="text-dark">Bem-vindo ao Membro Pdc, Actualize os seus dados </p>
                            <p><strong class="text-vermelho">*</strong>Campos Obrigatórios</p>
                            </div>
                             <form action="update_membro/{{$membro->user->id}}" method="POST">
                            @csrf
                            @method('PUT')
 
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label for="name"><strong >Nome:<strong class="text-vermelho">*</strong></strong></label>
                                        <input type="text" id="name" class="form-control" name="name" value="{{$membro->user->name}}"
                                            required autofocus>
                                            @error('name')
                                            <span class="text-danger"><small>{{$message}}</small></span>
                                            @enderror
                            
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group mb-3">
                                    <label for="sobrenome"><strong >Sobrenome:<strong class="text-vermelho">*</strong></strong></label>
                                        <input type="text" id="sobrenome" class="form-control" name="sobrenome" value="{{$membro->user->surname}}"
                                            required autofocus>
                                            @error('sobrenome')
                                            <span class="text-danger"><small>{{$message}}</small></span>
                                            @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                    <label for="aniversario"><strong >Data de Nascimento:<strong class="text-vermelho">*</strong></strong></label>
                                        <input type="date"  id="birthday" class="form-control" name="birthday" value="{{$membro->birthday->format('Y-m-d')}}"
                                            required autofocus>
                                            @error('birthday')
                                            <span class="text-danger"><small>{{$message}}</small></span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group mb-3">
                                    <label for="genero"><strong >Genero:<strong class="text-vermelho">*</strong></strong></label>
                                            <select name="genero" id="genero" class="form-control" required autofocus>
                                            <option value="M" {{$membro->user->gender=='M' ? "selected='selected'" : "" }}>Masculino</option>
                                            <option value="F" {{$membro->user->gender=='F' ? "selected='selected'" : "" }}>Feminino</option>
                                            </select>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                    <label for="idioma"><strong >Idioma:<strong class="text-vermelho">*</strong></strong></label>
                                            <select name="idioma" id="idioma" class="form-control" required autofocus>
                                            <option value="Português" {{$membro->idiom=='Português' ? "selected='selected'" : "" }}>Português</option>
                                            <option value="Inglês" {{$membro->idiom=='Inglês' ? "selected='selected'" : "" }}>Inglês</option>
                                            <option value="Frances" {{$membro->idiom=='Frances' ? "selected='selected'" : "" }}>Frances</option>
                                            </select>
                                       
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group mb-3">
                                    <label for="morada"><strong >Morada:<strong class="text-vermelho">*</strong></strong></label>
                                        <input type="text" id="morada" class="form-control"
                                            name="morada" value="{{$membro->address}}" required autofocus>
                                            @error('morada')
                                            <span class="text-danger"><small>{{$message}}</small></span>
                                            @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                            <label for="email"><strong >Email:<strong class="text-vermelho">*</strong></strong></label>
                                <input type="email" id="email" class="form-control"
                                    name="email" value="{{$membro->user->email}}" required autofocus>
                                    @error('email')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                            </div>

                            <div class="row" hidden>
                                <div class="col">
                                    <div class="form-group mb-3">
                                    <label for="pin"><strong >Pin:<strong class="text-vermelho">*</strong></strong></label>
                                    <input type="password" id="password" class="form-control"
                                            name="password" value="{{old('password')}}" required autofocus>
                                        @error('password')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group mb-3">
                                    <label for="telefone"><strong >Telefone:<strong class="text-vermelho">*</strong></strong></label>
                                        <input type="text" id="telefone" class="form-control"
                                            name="telefone" value="{{$membro->user->phone}}" required autofocus>
                                            @error('telefone')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                    <label for="comida"><strong >Preferencia Refeição:<strong class="text-vermelho">*</strong></strong></label>
                                            <select  class="form-control text-dark" id="comida" name="comida" required autofocus>
                                                <option value="Sem perferencia">Sem perferencia</option>
                                                <option value="Refeição de Peixe">Refeição de Peixe</option>
                                                <option value="Refeição com baixo teor de sal">Refeição com baixo teor de sal</option>
                                                <option value="Refeição Vegetariana">Refeição Vegetariana</option>
                                                <option value="Refeição para Diabeticos">Refeição para Diabeticos</option>
                                            </select>
                                        @if ($errors->has('comida'))
                                        <span class="text-danger">{{ $errors->first('comida') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group mb-3">
                                    <label for="lugar"><strong >Preferencia de Assento:<strong class="text-vermelho">*</strong></strong></label>

                                            <select  class="form-control text-dark" id="lugar" name="lugar" required autofocus>
                                            <option value="Sem Perferencia" {{$membro->preferencia->lugar=='Sem Perferencia' ? "selected='selected'" : "" }}>Sem Perferencia</option>
                                            <option value="Corredor" {{$membro->preferencia->lugar=='Corredor' ? "selected='selected'" : "" }}>Corredor</option>
                                            <option value="Janela" {{$membro->preferencia->lugar=='Janela' ? "selected='selected'" : "" }}>Janela</option>
                                            </select>
                                        
                                    </div>
                                </div>
                            </div>
                           

                           
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Lembre-me</label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary btn-block"><strong class="text-white">Actualizar</strong></button>
                            </div>
                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="my-5">

</div>
<!---->


@endsection