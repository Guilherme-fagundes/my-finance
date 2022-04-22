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
                    <h1 class="tituloMinhaCarteira mb-0"><i class="fa-solid fa-wallet"></i> Carteira {{ strtolower($wallet->nome) }}</h1>
                </div>
                <div class="col-12 col-md-6 walletHeader">
                    <a href="#" class="btn btn-danger btn-sm btn-nova-despesa"><i class="fa-solid fa-circle-plus"></i> Lançar nova despesa</a>
                    <a href="#" class="btn btn-success btn-sm btn-nova-renda"><i class="fa-solid fa-circle-plus"></i> Lançar nova renda</a>
                </div>
            </div>




            <!-- Modal criar nova despesa -->
            <div class="modal fade" id="criarNovaDespesa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="exampleModalLongTitle">Nova Despesa</h1>

                        </div>
                        <div class="modal-body">
                            <div class="j-alert" role="alert"></div>
                            <form method="post" action="" class="j-formCreateNewWallet">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label"><i class="fa-solid fa-book"></i> Descrição</label>
                                    <input class="form-control" type="text" name="descricao" placeholder="Descrição">

                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"><i class="fa-solid fa-hand-holding-dollar"></i> Valor</label>
                                            <input type="text" name="valor" class="form-control" id="despesa-valor" placeholder="0,00">
                                        </div>

                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"><i class="fa-solid fa-filter"></i> Data</label>
                                            <input type="date" name="data" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label"><i class="fa-solid fa-filter"></i> Categoria</label>
                                            <select name="categoria" class="form-select">
                                                <option>Selecione uma categoria</option>

                                            </select>
                                        </div>

                                    </div>

                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success btn-sm float-end"><i class="fa-solid fa-plus"></i> Cadastrar despesa</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal criar nova receita -->
            <div class="modal fade" id="criarNovaReceita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="exampleModalLongTitle">Nova receita</h1>

                        </div>
                        <div class="modal-body">
                            <div class="j-alert" role="alert"></div>
                            <form method="post" action="" class="j-formCreateNewWallet">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label"><i class="fa-solid fa-book"></i> Descrição</label>
                                    <input class="form-control" type="text" name="descricao" placeholder="Descrição">

                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"><i class="fa-solid fa-hand-holding-dollar"></i> Valor</label>
                                            <input type="text" name="valor" class="form-control" id="receita-valor" placeholder="0,00">
                                        </div>

                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"><i class="fa-solid fa-filter"></i> Data</label>
                                            <input type="date" name="data" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label"><i class="fa-solid fa-filter"></i> Categoria</label>
                                            <select name="categoria" class="form-select">
                                                <option>Selecione uma categoria</option>

                                            </select>
                                        </div>

                                    </div>

                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success btn-sm float-end"><i class="fa-solid fa-plus"></i> Cadastrar receita</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <script>
                $(function () {

                    $("#despesa-valor").mask('000.000.000.000.000,00', {reverse: true});
                    $("#receita-valor").mask('000.000.000.000.000,00', {reverse: true});

                    $(".btn-nova-despesa").click(function (e) {
                        e.preventDefault();

                        $('#criarNovaDespesa').modal('show');
                    });

                    $(".btn-nova-renda").click(function (e) {
                        e.preventDefault();

                        $('#criarNovaReceita').modal('show');
                    });

                })
            </script>

    </section>
@endsection
