@extends('conta.inc.layout.template', ["user" => $user])
@extends('conta.inc.layout.main-header')

@section('main')
    <section classs="sessAlert">
        <div class="container">
            <div class="row alertErrorBox">

                @if($errors->all())
                    @foreach($errors->all() as $msg)
                        <div class="alert alert-danger j-alert" role="alert"><i
                                class="fas fa-info-circle"></i> {{ $msg }}</div>
                    @endforeach
                @endif

            </div>

        </div>
    </section>

    <section class="sessWallet">
        <div class="container">
            <div class="row py-2 rowTitleWallet">
                <div class="col-12 col-md-6">
                    <h1 class="tituloMinhasCarteira mb-0"><i class="fa-solid fa-wallet"></i> Carteira {{ strtolower($wallet->nome) }}</h1>
                </div>
                <div class="col-12 col-md-6 walletHeader">
                    <a href="#" class="btn btn-danger btn-sm" id="btn-nova-despesa"><i class="fa-solid fa-circle-plus"></i> Lançar nova despesa</a>
                    <a href="#" class="btn btn-success btn-sm" id="btn-nova-renda"><i class="fa-solid fa-circle-plus"></i> Lançar nova renda</a>
                </div>
            </div>

    </section>
@endsection
