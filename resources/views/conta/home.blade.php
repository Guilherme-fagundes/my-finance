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
                            @php
                                $totalCategories = count($categories);
                            @endphp
                            <span class="descriptionTitle">Total de categorias</span>
                            <span class="descriptionValue">{{ $totalCategories }}</span>

                        </div>
                        <div class="estatisticasLancamentos estatisticasBox rounded">
                            <span class="descriptionTitle">Total de lançamentos</span>
                            <span class="descriptionValue">{{ count($lancamentos) }}</span>

                        </div>
                        <div class="estatisticasSaldo estatisticasBox rounded">

                            <span class="descriptionTitle">Saldo geral</span>
                            <span class="descriptionValue">R$ {{ number_format($saldoGeral, 2, ',', '.') }}</span>
                        </div>



                    </div>

                </div>

            </div>

        </div>
    </section>

@endsection

