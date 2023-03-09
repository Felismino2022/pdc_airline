@extends('layouts.cliente')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Bilhete de Viagem</h3>
                    <div class="card-body">
                        <form action="{{ route('register.user') }}" method="GET" class="scrollable">
                            @csrf
                          
                           

                           <div class="row">
                            <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">imprimir</button>

                            </div>

                            <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Salvar pdf</button>

                            </div>

                           </div>

                            
                          
                        </form>
                    </div>
                </div>
            </div>



        

        </div>
    </div>
</main>
@endsection