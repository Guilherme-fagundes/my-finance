<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url(mix('conta/css/bootstrap/bootstrap.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('conta/css/styles.css')) }}">

    <title>{{ $title }}</title>
</head>
<body>

    <div class="sessLogin">
        <div class="loginBox">
            <div class="loginBoxHeader">
                <h1>My Finance</h1>

            </div>
            <div class="loginBoxBody">
                <p>Entrar na minha conta</p>

                @if($errors->all())
                    <div class="alert alert-info" role="alert">
                        {{ $errors->all()[0] }}
                    </div>
                @endif

                <form method="post" action="" class="j-loginForm">
                    @csrf
                    <div class="j-alert" role="alert"></div>
                    <div class="field mb-3">
                        <label class="form-label">E-mail</label>
                        <input class="form-control" type="text" name="email">
                    </div>
                    <div class="field mb-3">
                        <label class="form-label">Senha</label>
                        <input class="form-control" type="password" name="pass">

                    </div>
                    <div class="field field-esqueciSenha mb-3 d-flex justify-content-end">

                        <a class="esqueciSenha" href="{{ route('user.recoverpass') }}" title="Recuperar senha">Esqueci minha senha</a>

                    </div>
                    <div class="field mb-3">

                        <div class="d-grid gap-2">
                            <input class="btn btn-primary" type="submit" name="sendLogin" value="Fazer login"/>

                        </div>

                    </div>

                    <div class="field field-create-acount">

                        <span>Não tem uma conta? <a class="criarConta" href="{{ route('user.createNewAcount') }}" title="Criar conta">Criar minha conta agora</a></span>

                    </div>

                </form>

            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $('.j-loginForm').submit(function (e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $('.j-alert').fadeOut(500);

            $.ajax({
                url: 'login/post',
                type: 'POST',
                dataType: 'json',
                data: formData,
                success: function (response) {

                    if (response.error == true){
                        $('.j-alert').addClass('alert alert-warning').html(response.message);
                        $('.j-alert').fadeIn(500);
                    }else{
                        $('.j-alert').addClass('alert alert-primary').html(response.message);
                        $('.j-alert').fadeIn(500);
                        window.location.href="{{ route('conta.home') }}"
                    }

                }
            });

        });

    </script>
</body>
</html>
