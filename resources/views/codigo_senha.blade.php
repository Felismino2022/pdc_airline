<link href="{{ asset('/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">


<div class="container">
    <div class="col-4 offset-4 my-5">
        <div class="card" >
        <div class="card-body">
            <h5 class="card-title">Recuperar Palavra Passe</h5>
            <p class="card-text">Digite o codigo de recuperação enviado por email</p>
            <h5 class="text-center">e</h5>

            <form action="/codigo_recuperacao" method="post">
            @csrf
                <div>
                    <label for="codigo"><strong> Codigo de recuperação*</strong></label>
                    <input type="text" name="codigo" id="codigo" class="form-control">
                </div>

                <div class="py-3" style="text-align: right;">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div>
                
            </form>
        </div>
        </div>
    </div>
</div>