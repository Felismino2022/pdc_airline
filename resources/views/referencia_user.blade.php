@extends('layouts.cliente')
@section('titulo', 'Mexer')
@section('content')
 
<br><br><br><br><br><br>

<div class="container text-dark">
    <div class="row">
        <div class="col-2 offset-2">
        <ion-icon name="alert-circle-outline"></ion-icon>

        </div>
        <div class="col-5">
            <p>Vá ao caixa electronico dentro de 24 horas do horario da compra e selecione:</p>
            <div>1-Pagamentos</div>
            <div>2-Empresas Aerea</div>
            <div>3-PDCAirline</div>
            <div>
                <p>Introduza a referencia  <strong id="refereUser">{{$ref_gerada}}</strong>   e o montante  <strong id="refereUser">{{$precototal}} kz</strong></p>
            </div>
            <div>
                <p>A PDCAirline agradece a sua perferencia e deseja-lhe uma boa viajem</p>
            </div>
        </div>
    </div>
    
   <div>
        <button id="gerpdf" class="btn btn-primary"><a href="gerarpdf/{{$id_tarifa}}">Gerar Pdf da compra</a></button> 

        <button id="gerpdf" class="btn btn-primary"><a href="visualizarpdf/{{$id_tarifa}}" target="_blank">Visualizar Pdf</a></button> 
    </div>
</div>




@endsection