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
                            <span class="descriptionTitle">Total de categorias</span>
                            <span class="descriptionValue">{{ count($categories) ?? '0' }}</span>

                        </div>
                        <div class="estatisticasLancamentos estatisticasBox rounded">
                            <span class="descriptionTitle">Total de lançamentos</span>
                            <span class="descriptionValue">{{ count($lancamentos) ?? '0' }}</span>

                        </div>
                        <div class="estatisticasSaldo estatisticasBox rounded">

                            <span class="descriptionTitle">Saldo geral</span>
                            <span
                                class="descriptionValue">R$ {{ number_format($saldoGeral, 2, ',', '.') ?? '0,00' }}</span>
                        </div>


                    </div>

                </div>

            </div>

            <div class="row mt-3 rowUltimosLancamentosTitle">
                <div class="col-12">
                    <h4 class="ultimosLancamentosTitle mt-2">Ultimos lançamentos</h4>

                </div>

            </div>

            <div class="row py-2 mt-3 rowUltimosLancamentosContent">
                <div class="col-12">
                   @if(count($ultimosLancamenrtos) == 0)

                        <div class="alert alert-warning"><i class="fa-solid fa-circle-exclamation"></i> Não existem lançamentos no momento</div>

                    @else

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Descrição</th>
                                <th scope="col">Carteira</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Tipo de lançamento</th>
                                <th scope="col">Data</th>
                                <th scope="col">Valor</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ultimosLancamenrtos as $lancamento)
                                <tr>
                                    <td scope="row">{{ $lancamento->descricao }}</td>
                                    <td scope="row">{{ $lancamento->wallet_name }}</td>
                                    <td scope="row">{{ $lancamento->category_name }}</td>
                                    <td><span class="badge {{ ($lancamento->tipo_lancamento == 'Receita' ? 'bg-primary' : 'bg-danger') }}">{{ $lancamento->tipo_lancamento }}</span></td>
                                    <td scope="row">{{ date('d/m/Y', strtotime($lancamento->data)) }}</td>
                                    <td>{{ number_format($lancamento->valor, 2, ',', '.') }}</td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    @endif
                </div>
            </div>

        </div>
    </section>

@endsection

