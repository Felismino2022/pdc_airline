@extends('layouts.cliente')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Preencha os Dados da Compra</h3>
                    <div class="card-body">
                        <form action="{{ route('comprar.store',$bi_id)}}" method="POST" class="scrollable">
                            @csrf
                            <h6 class="card-header text-center">Dados do Cliente</h6>
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
                              
                              
                            </div>

                            <div class="row">
                               

                                
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
                                        <input type="text" placeholder="Numero de telefone" id="telefone" class="form-control"
                                            name="telefone" required autofocus>
                                        @if ($errors->has('telefone'))
                                        <span class="text-danger">{{ $errors->first('telefone') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <h6 class="card-header text-center">Dados dos Passageiros</h6>


                            <div class="row">

                                @for ($i=1;$i < $qtd_a; $i++)

                                <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Nome" id="name" class="form-control" name={{$i}}
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

                                @endfor
                              

                            </div>
                           

                           
                            
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">Confirmar os dados dos passageiros</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        

        </div>
    </div>
</main>
@endsection