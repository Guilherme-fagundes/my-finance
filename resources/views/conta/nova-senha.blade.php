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
            <p>Crie sua nova senha</p>

            <form method="post" action="" class="j-newPassForm">
                @csrf
                <div class="j-alert" role="alert"></div>

                <div class="field mb-3">
                    <label class="form-label">Senha</label>
                    <input class="form-control" type="password" name="pass">

                </div>
                <div class="field mb-3">
                    <label class="form-label">Confirmar senha</label>
                    <input class="form-control" type="password" name="Cpass">

                </div>
                <input class="form-control" type="hidden" name="email" value="{{ $email }}">
                <input class="form-control" type="hidden" name="id" value="{{ $id }}">

                <div class="field mb-3">

                    <div class="d-grid gap-2">
                        <input class="btn btn-success btn-sm" type="submit" name="sendRecoverPass" value="Recuperar senha"/>

                    </div>

                </div>


            </form>

        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(".j-newPassForm").submit(function (e) {
        e.preventDefault();

        var data = $(this).serialize();

        $.ajax({
            url: "{{ route('user.newPass.post') }}",
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function (response) {

                if (response.error == true){
                    $('.j-alert').removeClass('alert-primary');
                    $('.j-alert').addClass('alert alert-warning').html(response.message);
                }else{
                    $('.j-alert').removeClass('alert-warning');
                    $('.j-alert').addClass('alert alert-primary').html(response.message);
                }
            }
        });

    });

</script>
</body>
</html>

