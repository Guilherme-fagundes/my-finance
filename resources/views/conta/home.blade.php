@extends('conta.inc.layout.template')
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

    <section class="sessHome">
        <div class="container">
            <div class="row py-2 rowTitleHome">
                <div class="col-12">
                    <h1 class="tituloPaginaHome"><i class="fas fa-home"></i> Home</h1>

                </div>

            </div>

            <div class="row py-2 mt-3 rowHomeContent">
                <div class="col-12">

                    <div class="estatisticas">
                        <div class="estatisticasCategorias estatisticasBox rounded">
                            total de categorias
                        </div>
                        <div class="estatisticasLancamentos estatisticasBox rounded">
                            total de lancamentos

                        </div>
                        <div class="estatisticasSaldo estatisticasBox rounded">
                            saldo

                        </div>



                    </div>

                </div>

            </div>

        </div>
    </section>

@endsection

