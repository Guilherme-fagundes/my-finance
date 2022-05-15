<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url(mix('conta/css/bootstrap/bootstrap.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('conta/css/styles.css')) }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>{{ $title }}</title>
</head>
<body>

<div class="sessLogin">
    <div class="loginBox">
        <div class="loginBoxHeader">
            <h1>My Finance</h1>

        </div>
        <div class="loginBoxBody">
            <p class="titleRecover">Esqueci minha senha</p>
            <p class="subTitleRecover">Para recuperar sua senha informe seu e-mail cadastrado</p>

            <div class="j-alert" role="alert"></div>
            <form method="post" action="" class="j-formRecovePass">
                @csrf
                <div class="field mb-3">
                    <label class="form-label">E-mail</label>
                    <input class="form-control" type="text" name="email">
                </div>
                <div class="field field-voltar-para-login mb-3 d-flex justify-content-end">

                    <a class="voltarParaLogin" href="{{ route('user.login') }}" title="Voltar para o login">Voltar para o login</a>

                </div>
                <div class="field mb-3">

                    <div class="d-grid gap-2">
                        <input class="btn btn-primary" type="submit" name="sendRecover" value="Recuperar minha senha"/>

                    </div>

                </div>


            </form>

        </div>

    </div>
</div>

<script>
    $(function () {
       $(".j-formRecovePass").submit(function (event) {
           event.preventDefault();

           var data = $(this).serialize();
           $(".j-alert").fadeOut(500);

           $.ajax({
               url: "{{ route('user.recoverpass.post') }}",
               dataType: 'json',
               type: 'post',
               data: data,
               success: function (response) {
                   if (response.error == true){
                       $('.j-alert').removeClass('alert-primary');
                       $('.j-alert').addClass('alert alert-warning').html(response.message);
                       $(".j-alert").fadeIn(500);
                   }else{
                       $('.j-alert').removeClass('alert-warning');
                       $('.j-alert').addClass('alert alert-primary').html(response.message);
                       $(".j-alert").fadeIn(500);
                   }
               }
           });

       })

    })
</script>
</body>
</html>
