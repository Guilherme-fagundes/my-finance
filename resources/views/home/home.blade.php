<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ url(mix('home/css/style.css')) }}">
</head>
<body>

<div class="container">
    <div class="content">
        <h1>Trabalho de Conclusão de Tecnologia em Sistemas para Internet</h1>
        <div class="dadosAluno">
            <p><strong>Nome:</strong> Guilherme K Fagundes</p>
            <p><strong>Email:</strong> guilhermekfagundes94@rede.ulbra.br</p>

        </div>

        <div class="dadosAcesso">
            <a href="{{ route('conta.home') }}" class="btn-acessarApp">Para acessar o sistema clique aqui</a>


        </div>

    </div>

</div>

</body>
</html>
