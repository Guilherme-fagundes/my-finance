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
@endsection
