<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://plentz.github.io/jquery-maskmoney/javascripts/jquery.maskMoney.min.js"></script>
    <link rel="stylesheet" href="{{ url(mix('conta/css/bootstrap/bootstrap.css')) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="{{ url(mix('conta/css/styles.css')) }}">

    <title>{{ $title }}</title>
</head>
<body>

<section class="sessionMain container-fluid">
    <div class="sessionMainContent">
        <div class="row">

            <div class="col-2 leftSiderBar position-fixed vh-100 px-0 overflow-auto">
                <article class="articleDashboard">
                    <div class="articleDashboardHeader text-center">
                        @if (!empty($user->foto))
                            <img src="{{ asset('storage/conta/usuario/'.session()->get('userId').'/'. $user->foto) }}" class="rounded-circle" width="100" height="100">
                        @else
                            <img src="{{ asset('storage/default_empty.jpg') }}" class="rounded-circle" width="100" height="100">
                        @endif
                        <p class="userName mt-3 mb-0 text-white"><small>{{ $user->nome ?? '' }} {{ $user->sobrenome ?? '' }}</small></p>
                        <p class="userE-mail mt-1 text-white"><small>{{ $user->email }}</small></p>
                        <p class="mt-1 badge bg-secondary"><span>{{ strtoupper($user->tipo_conta) }}</span></p>
                    </div>
                    <div class="articleDashboardBody">
                        <ul class="leftMenu mx-0 px-0">
                            <li>
                                <a href="{{ route('conta.home') }}" title="Dashboard">
                                    <span class="icon"><i class="fas fa-home"></i></span>
                                    <span class="text">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('conta.perfil') }}" title="Perfil">
                                    <span class="icon"><i class="fas fa-user"></i></span>
                                    <span class="text">Perfil</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('categorias.index') }}" title="Todas as categorias">
                                    <span class="icon"><i class="fa-solid fa-book-open"></i></span>
                                    <span class="text">Categorias</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('carteiras.listar') }}" title="Todas as carteiras">
                                    <span class="icon"><i class="fas fa-wallet"></i></span>
                                    <span class="text">Carteiras</span>
                                </a>
                            </li>
                        </ul>
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
