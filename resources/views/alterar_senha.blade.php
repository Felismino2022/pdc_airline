
<link href="{{ asset('/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">

<div class="container">
    <div class="col-4 offset-4 my-5">
        <div class="card" >
        <div class="card-body">
            <h5 class="card-title">Recuperar Palavra Passe</h5>
            <p class="card-text">Digite a nova palavra passe</p>
            <h5 class="text-center">e</h5>

            <form action="/alterar_senha" method="post">
            @csrf
                <div>
                    <label for="password"><strong> Nova Password*</strong></label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>

                <input type="text" name="email" id="email" value="{{$email}}"  hidden>
                <div class="py-3" style="text-align: right;">
                    <button type="submit" class="btn btn-dark">Alterar Senha</button>
                </div>
                
            </form>
        </div>
        </div>
    </div>
</div>