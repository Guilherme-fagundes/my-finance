<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <title>Recuperação de senha</title>
</head>
<body>
<p>Olá {{ $user->nome }} {{ $user->sobrenome }} você solicitou a recuperação de sua senha,
para fazer isso clique no link abaxo.</p>

<p><a href="{{ route('user.newPass', ['email' => base64_encode($user->email), 'id' => base64_encode($user->id)]) }}">Recuperar minha senha</a></p>

<p><small><b>Não responda este e-mail</b></small></p>

</body>
</html>
