@section('main-header')

    <header class="main-header">
        <div class="container">
            <div class="row py-3">

                <div class="main-header-content">
                    <div class="header-action">
                        <a href="{{ route('conta.logount') }}" class="nav-item logout">
                            <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                            <span class="text"> sair</span>
                        </a>

                    </div>
                </div>
            </div>

        </div>

    </header>

    @if($user->tipo_conta == 'free')
        <section class="sessMessageUpdate">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="messageUpdate"><i class="fa-solid fa-circle-exclamation"></i> Você está utilizando a
                            conta gratuíta, atualize para uma conta premium. <a href="{{ route('assinatura.index') }}" class="btn-update">Atualizar</a></p>
                    </div>

                </div>

            </div>

        </section>
    @endif

@endsection
