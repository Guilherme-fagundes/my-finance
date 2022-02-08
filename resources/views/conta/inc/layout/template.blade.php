<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url(mix('conta/css/bootstrap/bootstrap.css')) }}">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ url(mix('conta/css/styles.css')) }}">

    <title>{{ $title }}</title>
</head>
<body>

{{--<header class="contaHeader">--}}
{{--    <div class="contaHeaderContent">--}}

{{--    </div>--}}
{{--</header>--}}

<section class="sessionMain container-fluid">
    <div class="sessionMainContent">
        <div class="row">

            <div class="col-2 leftSiderBar position-fixed vh-100 px-0 overflow-auto">
                <article class="articleDashboard">
                    <div class="articleDashboardHeader text-center">
                        <img src="{{ asset('storage/conta/usuario/1/user_id_1.jpg') }}" width="80" height="80" class="rounded-circle">
                        <p class="userName mt-3 mb-0 text-white"><small>Guilherme K Fagundes</small></p>
                        <p class="userE-mail mt-1 text-white"><small>guilhermekfagundes259@gmail.com</small></p>
                    </div>
                    <div class="articleDashboardBody">
                        <div class="leftMenu">
                            <a href="#">
                                <span class="icon"><i class="fas fa-home"></i></span>
                                <span class="text">Home</span>
                            </a>
                            <a href="#">
                                <span class="icon"><i class="fas fa-user"></i></span>
                                <span class="text">Perfil</span>
                            </a>
                            <div class="dropdown show">
                                <a href="#" class="dropdown-toggle" role="link" id="dropdownMenuLink" data-toggle="dropdown">
                                    <span class="icon"><i class="fas fa-cog"></i></span>
                                    <span class="text">configurações</span>

                                </a>
                                <div class="dashDropDown subMenu dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Configurar minha conta</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-10 offset-2 px-0" id="">

                @yield('main-header')
                @yield('main')
            </div>
        </div>
    </div>

</section>

</body>
</html>
