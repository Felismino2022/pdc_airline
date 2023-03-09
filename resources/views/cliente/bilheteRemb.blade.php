@extends('layouts.blank')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row col-6 offset-3">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Reembolso</h3>
                    <div class="card-body">
                        <form action="{{ route('comprar.store',$bi_id)}}" method="POST" class="scrollable">
                            @csrf
                            <h6 class="card-header text-center">Descrição do Reembolso</h6>
                            

                            <div class="row">
                                

                                <div class="col">
                                    <div class="form-group mb-3">
                                        <textarea placeholder="Escreva os Seu motivo do reembolso" id="telefone" class="form-control"
                                            name="telefone" required autofocus>
                                        </textarea>
                                        @if ($errors->has('telefone'))
                                        <span class="text-danger">{{ $errors->first('telefone') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                  
                           

                           
                            
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">Efectuar O Pedido de Reembolso</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        

        </div>
    </div>
</main>
@endsection