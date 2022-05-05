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

    <section class="sessCategories">
        <div class="container">
            <div class="row py-2 rowTitleCategories">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1 class="tituloMinhasCategorias mb-0"><i class="fa-solid fa-money-bill"></i> Editando lançamento</h1>
                </div>
            </div>

    </section>
@endsection

