<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

                <form method="post" action="">
                    <div class="field">
                        <label>E-mail</label>
                        <input type="text" name="email">
                    </div>
                    <div class="field">
                        <label>Senha</label>
                        <input type="password" name="pass">

                    </div>
                    <div class="field field-recover">

                        <a class="esqueciSenha" href="#" title="Recuperar senha">Esqueci minha senha</a>

                    </div>
                    <div class="field field-btn-login">

                        <input type="submit" name="entrar" value="Entrar">

                    </div>

                    <div class="field field-create-acount">

                        <span>Não tem uma conta? <a class="criarConta" href="#" title="Criar conta">Criar minha conta agora</a></span>

                    </div>

                </form>

            </div>

        </div>
    </div>
</body>
</html>
