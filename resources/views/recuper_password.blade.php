
<link href="{{ asset('/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">


<div class="container">
    <div class="col-4 offset-4 my-5">
        <div class="card" >
        <div class="card-body">
            <h5 class="card-title">Recuperar Palavra Passe</h5>
            <p class="card-text">Não se recorda da palavra passe? Podemos ajudar a recuperar, basta indicar o seu número de membro no campo abaixo.</p>
            <h5 class="text-center">Não me recordo da palavra passe</h5>

            <form action="/recuperar" method="post">
            @csrf
                <div>
                    <label for="email"><strong> Digite o seu email*</strong></label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>

                <div class="py-3" style="text-align: right;">
                    <button type="submit" class="btn btn-dark">Recuperar Senha</button>
                </div>
                
            </form>
        </div>
        </div>
    </div>
</div>