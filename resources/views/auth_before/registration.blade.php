@extends('layouts.cliente')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Registrar um membro PDC</h3>
                    <div class="card-body">
                        <form action="{{ route('register.user') }}" method="POST">
                            @csrf
 
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Nome" id="name" class="form-control" name="name"
                                            required autofocus>
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="sobrenome" id="sobrenome" class="form-control" name="sobrenome"
                                            required autofocus>
                                        @if ($errors->has('sobrenome'))
                                        <span class="text-danger">{{ $errors->first('sobrenome') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <input type="date" placeholder="data de nascimento" id="aniversario" class="form-control" name="aniversario"
                                            required autofocus>
                                        @if ($errors->has('aniversario'))
                                        <span class="text-danger">{{ $errors->first('aniversario') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Genero" id="genero" class="form-control" name="genero"
                                            required autofocus>
                                        @if ($errors->has('genero'))
                                        <span class="text-danger">{{ $errors->first('genero') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="idioma preferido" id="idioma" class="form-control"
                                            name="idioma" required autofocus>
                                        @if ($errors->has('idioma'))
                                        <span class="text-danger">{{ $errors->first('idioma') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="moradas" id="morada" class="form-control"
                                            name="morada" required autofocus>
                                        @if ($errors->has('morada'))
                                        <span class="text-danger">{{ $errors->first('morada') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Pin de Acesso" id="password" class="form-control"
                                            name="password" required autofocus>
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Numero de telefone" id="telefone" class="form-control"
                                            name="telefone" required autofocus>
                                        @if ($errors->has('telefone'))
                                        <span class="text-danger">{{ $errors->first('telefone') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Preferencia de Alimentacao" id="comida" class="form-control"
                                            name="comida" required autofocus>
                                        @if ($errors->has('comida'))
                                        <span class="text-danger">{{ $errors->first('comida') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Preferencia de Lugar" id="lugar" class="form-control"
                                            name="lugar" required autofocus>
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
                                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection