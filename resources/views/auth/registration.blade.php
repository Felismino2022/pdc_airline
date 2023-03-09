@extends('layouts.cliente')
@section('content')
<br><br><br><br><br>
<main class="signup-form">
    <div class="cotainer">
        <div class="row text-dark">
            <div class="col-8 offset-2">
                <div class="card" id="card-membro">
                        <img src="/img/passageiro1.jpg" class="card-img-top" id="img1" alt="...">
                        <div class="card-body membro" >
                            <div>
                            <h1>Bem-vindo ao Membro Pdc</h1> 
                            <p class="text-dark">Bem-vindo ao Membro Pdc, o programa criado pela PDCAIRLINE para agradecer e retribuir a fidelidade dos nossos clientes.! crie já a sua conta para usufrir dos privilegios como Membro.</p>
                            <p><strong class="text-vermelho">*</strong>Campos Obrigatórios</p>
                            </div>
                             <form action="{{ route('register.user') }}" method="POST">
                            @csrf
 
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label for="name"><strong >Nome:<strong class="text-vermelho">*</strong></strong></label>
                                        <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}"
                                            required autofocus>
                                            @error('name')
                                            <span class="text-danger"><small>{{$message}}</small></span>
                                            @enderror
                            
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group mb-3">
                                    <label for="sobrenome"><strong >Sobrenome:<strong class="text-vermelho">*</strong></strong></label>
                                        <input type="text" id="sobrenome" class="form-control" name="sobrenome" value="{{old('name')}}"
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
                                        <input type="date"  id="aniversario" class="form-control" name="aniversario" value="{{old('aniversario')}}"
                                            required autofocus>
                                            @error('aniversario')
                                            <span class="text-danger"><small>{{$message}}</small></span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group mb-3">
                                    <label for="genero"><strong >Genero:<strong class="text-vermelho">*</strong></strong></label>
                                            <select name="genero" id="genero" class="form-control" required autofocus>
                                                <option value="M">Masculino</option>
                                                <option value="F">Feminino</option>
                                            </select>
                                        @if ($errors->has('genero'))
                                        <span class="text-danger">{{ $errors->first('genero') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                    <label for="idioma"><strong >Idioma:<strong class="text-vermelho">*</strong></strong></label>
                                            <select name="idioma" id="idioma" class="form-control" required autofocus>
                                                <option value="Português">Português</option>
                                                <option value="Inglês">Inglês</option>
                                            </select>
                                        @if ($errors->has('idioma'))
                                        <span class="text-danger">{{ $errors->first('idioma') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group mb-3">
                                    <label for="morada"><strong >Morada:<strong class="text-vermelho">*</strong></strong></label>
                                        <input type="text" id="morada" class="form-control"
                                            name="morada" value="{{old('morada')}}" required autofocus>
                                            @error('morada')
                                            <span class="text-danger"><small>{{$message}}</small></span>
                                            @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                            <label for="email"><strong >Email:<strong class="text-vermelho">*</strong></strong></label>
                                <input type="email" id="email" class="form-control"
                                    name="email" value="{{old('email')}}" required autofocus>
                                    @error('email')
                                        <span class="text-danger"><small>{{$message}}</small></span>
                                        @enderror
                            </div>

                            <div class="row">
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
                                            name="telefone" value="{{old('telefone')}}" required autofocus>
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
                                                <option value="Sem preferencia">Sem preferencia</option>
                                                <option value="Corredor">Corredor</option>
                                                <option value="Janela">Janela</option>
                                            </select>
                                        @if ($errors->has('lugar'))
                                        <span class="text-danger">{{ $errors->first('lugar') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                           

                           
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Lembre-me</label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary btn-block"><strong class="text-white">Registrar</strong></button>
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
@endsection


       