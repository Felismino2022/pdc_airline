@extends('layouts.membro')
@section('titulo','Dashboard')
@section('content')

@if(session('msg'))
					<div class="alert alert-success " role="alert">
						{{session('msg')}}
					</div>
                @endif

<div class="cotainer">

        <div class="row justify-content-center">
            <div class="col-md-10">
            <h2 class="text-primary">Estatuto</h2>
                <div class="card bg-secondary">
                    
                    <div class="card-body">
                        <p class="text-white"><strong>Total de milhas: {{$membro->miles}}</strong></p>
                    </div>
                </div>
            </div>
        </div>
</div>



</div>


@endsection