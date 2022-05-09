@extends('conta.inc.layout.template', ["user" => $user])
@extends('conta.inc.layout.main-header')

@section('main')
    <section classs="sessAlert">
        <div class="container">
            <div class="row alertErrorBox">
                @if($errors->all())

                    @foreach($errors->all() as $msg)
                        <div class="alert alert-danger j-alert" role="alert"> {{ $msg }}</div>
                    @endforeach
                @endif


            </div>

        </div>
    </section>

    <section class="sessLancamento">
        <div class="container">
            <div class="row py-2 rowTitleLaunches">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1 class="tituloMeusLancamentos mb-0"><i class="fa-solid fa-money-bill"></i> Editando lançamento
                    </h1>
                    <a href="{{ route('carteira.abrir', ['id' => $lancamento->wallet_id]) }}" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">

                    <form method="post" action="{{ route('lancamento.edit.post') }}" class="formEditarlancamento">
                        @csrf



                        <input type="hidden" name="id" value="{{ $id }}">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><i class="fa-solid fa-book"></i> Descrição</label>
                                    <input class="form-control" type="text" name="descricao"
                                           value="{{ $lancamento->descricao }}">

                                </div>

                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><i class="fa-solid fa-filter"></i> Categoria</label>
                                    <select name="category_id" class="form-select">
                                        <option disabled="disabled" value="null">Selecione uma categoria</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->nome }}</option>
                                        @endforeach

                                    </select>

                                </div>

                            </div>

                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"><i class="fa-solid fa-filter"></i> Tipo de
                                        lançamento</label>
                                    <select name="tipo_lancamento" class="form-select">
                                        @if($lancamento->tipo_lancamento == 'Despesa')
                                            <option selected="selected" value="Despesa">Despesa</option>
                                            <option value="Receita">Receita</option>
                                        @else
                                            <option selected="selected" value="Receita">Receita</option>
                                            <option value="Despesa">Despesa</option>
                                        @endif
                                    </select>

                                </div>

                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"><i class="fa-solid fa-filter"></i> Data do lançamento /
                                        Vencimento / recebimento</label>
                                    <input class="form-control" type="date" name="data" value="{{ $lancamento->data }}">

                                </div>

                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"><i class="fa-solid fa-hand-holding-dollar"></i> Valor</label>
                                    <input class="form-control" type="text" name="valor" id="lancamento_valor" value="{{ number_format($lancamento->valor, 2, ',', '.') }}">

                                </div>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pencil"></i> Editar lançamento</button>
                    </form>

                </div>

            </div>

    </section>

    <script>
        $(function () {
            $("#lancamento_valor").maskMoney({
                allowNegative: true,
                thousands: '.',
                decimal: ','
            });

        })
    </script>
@endsection

