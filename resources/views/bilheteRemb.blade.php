@extends('layouts.cliente')
@section('titulo', 'SELECIONAR LUGAR')
@section('content')

<br><br><br><br>
<main class="signup-form">
    <div class="cotainer">   
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Reembolso</h3>
                    <div class="card-body">
                        <form action="{{ route('reembolsar_create') }}" method="POST" >
                            @csrf
                            <h6 class="card-header text-center">Descrição do Reembolso</h6>
                            

                            <div class="row">
                                
                            <input type="hidden" name="bi_id" value="{{$bi_id}}">

                                <div class="col">
                                    <div class="form-group mb-3">
                                        <textarea placeholder="Escreva os Seu motivo do reembolso" id="descricao" class="form-control"
                                            name="descricao" required autofocus>
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