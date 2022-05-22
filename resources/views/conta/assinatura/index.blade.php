@extends('conta.inc.layout.template', ["user" => $user])
@extends('conta.inc.layout.main-header')


@section('main')

    <section class="sessAlert">
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

    <section class="sessAssinatura">
        <div class="container">

            <div class="j-alertSaveData"></div>

            <div class="row mt-3 mb-0">
                <div class="col-12 col-md-12 titleMeusDados">
                    <h3 class="pb-0 mt-3 mb-4">Meus dados</h3>

                </div>

            </div>

        </div>

    </section>

@endsection

