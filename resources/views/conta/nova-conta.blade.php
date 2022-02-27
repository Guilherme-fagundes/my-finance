<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url(mix('conta/css/bootstrap/bootstrap.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('conta/css/styles.css')) }}">

    <title>{{ $title }}</title>
    {!! htmlScriptTagJsApi() !!}
</head>
<body>

<div class="sessNewAcount">
    <div class="newAcountBox">
        <div class="newAcountBoxHeader">
            <h1>My Finance</h1>

        </div>
        <div class="newAcountBoxBody">
            <p>Crie sua conta</p>

            <form method="post" action="{{ route('user.createNewAcount.post') }}" id="createnewUser">
                @csrf
                <div class="field mb-3">
                    <label class="form-label">E-mail</label>
                    <input class="form-control" type="text" name="email">
                </div>

                <div class="field mb-3">
                    <label class="form-label">Confirmar E-mail</label>
                    <input class="form-control" type="text" name="Cemail">
                </div>

                <div class="field mb-3">
                    <label class="form-label">Senha</label>
                    <input class="form-control" type="password" name="pass">

                </div>

                <div class="field mb-3">
                    <label class="form-label">Confirmar senha</label>
                    <input class="form-control" type="password" name="Cpass">

                </div>

                <div class="field mb-3">

                    <div class="d-grid gap-2">
                        <input class="btn btn-primary" type="submit" name="sendCreate" value="Criar minha conta"/>
                        {!! htmlFormSnippet([
                                "theme" => "light",

                                 "tabindex" => "3",
                                 "callback" => "callbackFunction",
                                 "expired-callback" => "expiredCallbackFunction",
                                 "error-callback" => "errorCallbackFunction",
 ]) !!}
                        <p><small>Ao clicar em cadastrar, você automaticamente aceita <a href="#">os termos de uso e de privacidade</a></small></p>


                    </div>

                </div>

                <div class="field field-create-acount">

                    <span>Já tem uma conta? <a class="criarConta" href="{{ route('user.login') }}" title="Voltar para o login">Voltar para o login</a></span>

                </div>

            </form>

        </div>

    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
    // var onloadCallback = function() {
    //     alert("grecaptcha is ready!");
    // };
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    $(function () {
        $('#createnewUser').submit(function (e) {
            e.preventDefault();
            var dados = $(this).serialize();

            $.ajax({
                url: 'criar-minha-conta/post',
                type: 'POST',
                data: dados,
                dataType: 'json',
                success: function (response) {
                    console.log(response)
                }
            });
        })

    })
</script>
</body>
</html>
