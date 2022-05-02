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
                    <h1 class="tituloMinhaCarteira mb-0"><i class="fa-solid fa-wallet"></i>
                        Carteira {{ strtolower($wallet->nome) }}</h1>
                </div>

                <div class="col-12 col-md-6 walletHeader">
                    <a href="#" class="btn btn-danger btn-sm btn-nova-despesa"><i class="fa-solid fa-circle-plus"></i>
                        Lançar nova despesa</a>
                    <a href="#" class="btn btn-success btn-sm btn-nova-renda"><i class="fa-solid fa-circle-plus"></i>
                        Lançar nova renda</a>
                </div>
                <div class="col-12">
                    <p class="descricaoMinhaCarteira"><span>Aqui você pode visualizar e gerenciar seus lançamentos</span></p>

                </div>
            </div>

            <div class="row mt-3 py-2">
                <div class="col-12">

                    @if(count($lancamentos) == 0)

                        <div class="alert alert-warning"><i class="fa-solid fa-circle-exclamation"></i>
                            Não existem lançamentos cadastrados no momento
                        </div>
                    @else
                        <table class="table table-striped tabelaRelatorios">
                            <thead>
                            <tr>

                                <th scope="col">Descriçao</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Data</th>
                                <th scope="col">Tipo de lançamento</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">-</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lancamentos as $lancamento)
                                <tr>
                                    <td scope="row">{{ $lancamento->descricao }}</td>
                                    <td>{{ number_format($lancamento->valor, 2, ',', '.') }}</td>
                                    <td>{{ date("d/m/Y", strtotime($lancamento->data)) }}</td>
                                    <td>{{ $lancamento->tipo_lancamento }}</td>
                                    <td>{{ $lancamento->nome }}</td>
                                    <td class="launchAction">
                                        <a href="#" title="Visão geral do lançamento" class="actionView launchView j-launchView"><i
                                                class="fa-solid fa-eye"></i></a>
                                        <a href="#" class="actionEdit launchDelete j-editLaunch"><i
                                                class="fa-solid fa-pen"></i></a>
                                        <a href="#" data-launch_id="{{ $lancamento->id }}"
                                           data-action="{{ route('lancamento.delete') }}"
                                           class="actionDelete launchDelete j-deletLaunch"><i
                                                class="fa-solid fa-circle-xmark"></i></a>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>

                        </table>
                    @endif

                    {{ $lancamentos->links() }}
{{--                        @if(count($lancamentos) > 5)--}}
{{--                            @dd($lancamentos)--}}
{{--                        @endif--}}

                </div>

            </div>

            <!-- Modal criar nova despesa -->
            <div class="modal fade" id="criarNovaDespesa" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="exampleModalLongTitle">Nova Despesa</h1>

                        </div>
                        <div class="modal-body">
                            <div class="j-alert" role="alert"></div>
                            <form method="post" action="" class="j-formCriarNovaDespesa">
                                @csrf
                                <input type="hidden" name="wallet_id" value="{{ $wallet->id }}">
                                <div class="mb-3">
                                    <label class="form-label"><i class="fa-solid fa-book"></i> Descrição</label>
                                    <input class="form-control" type="text" name="descricao" placeholder="Descrição">

                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"><i class="fa-solid fa-hand-holding-dollar"></i>
                                                Valor</label>
                                            <input type="text" name="valor" class="form-control" id="despesa-valor"
                                                   placeholder="0,00">
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
                                            <label class="form-label"><i class="fa-solid fa-filter"></i>
                                                Categoria</label>
                                            <select name="categoria" class="form-select">
                                                <option>Selecione uma categoria</option>
                                                @foreach($despesas as $categoryDespesa)
                                                    <option
                                                        value="{{ $categoryDespesa->id }}">{{ ucfirst($categoryDespesa->nome) }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                    </div>

                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success btn-sm float-end"><i
                                            class="fa-solid fa-plus"></i> Cadastrar despesa
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal criar nova receita -->
            <div class="modal fade" id="criarNovaReceita" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="exampleModalLongTitle">Nova receita</h1>

                        </div>
                        <div class="modal-body">
                            <div class="j-alert" role="alert"></div>
                            <form method="post" action="" class="j-formCriarNovaReceita">
                                @csrf
                                <input type="hidden" name="wallet_id" value="{{ $wallet->id }}">
                                <div class="mb-3">
                                    <label class="form-label"><i class="fa-solid fa-book"></i> Descrição</label>
                                    <input class="form-control" type="text" name="descricao" placeholder="Descrição">

                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"><i class="fa-solid fa-hand-holding-dollar"></i>
                                                Valor</label>
                                            <input type="text" name="valor" class="form-control" id="receita-valor"
                                                   placeholder="0,00">
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
                                            <label class="form-label"><i class="fa-solid fa-filter"></i>
                                                Categoria</label>
                                            <select name="categoria" class="form-select">
                                                <option>Selecione uma categoria</option>
                                                @foreach($receitas as $categoryReceitas)
                                                    <option
                                                        value="{{ $categoryReceitas->id }}">{{ ucfirst($categoryReceitas->nome) }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                    </div>

                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success btn-sm float-end"><i
                                            class="fa-solid fa-plus"></i> Cadastrar receita
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal visualizar lançamento -->
            <div class="modal fade" id="visaoGeralLancamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="exampleModalLongTitle">Visualização geral do lançamento</h1>

                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(function () {

                    $("#despesa-valor").maskMoney({
                        allowNegative: true,
                        thousands: '.',
                        decimal: ','
                    });
                    $("#receita-valor").maskMoney({
                        allowNegative: true,
                        thousands: '.',
                        decimal: ','
                    });

                    $(".btn-nova-despesa").click(function (e) {
                        e.preventDefault();

                        $('#criarNovaDespesa').modal('show');
                    });

                    $(".btn-nova-renda").click(function (e) {
                        e.preventDefault();

                        if ($('.j-alert').html() != '') {
                            $(".j-alert").html('');
                        }
                        $('#criarNovaReceita').modal('show');

                    });

                    //Cadastra nova receita
                    $(".j-formCriarNovaReceita").submit(function (e) {
                        e.preventDefault();

                        var formData = $(this).serialize();
                        var form = $(this);

                        $.ajax({
                            url: "{{ route('lancamento.novo.post') }}",
                            type: 'POST',
                            data: formData,
                            dataType: 'json',
                            success: function (response) {

                                if (response.error == true) {

                                    $(".j-alert").html("");
                                    $('.j-alert').fadeIn(800, function () {
                                        $(this).html("<div class=\"alert alert-warning\"><i class=\"fa-solid fa-circle-exclamation\"></i> " + response.message + "</div>")
                                            .addClass('mb-0 mt-3');

                                    });

                                } else {
                                    $("#criarNovaReceita").modal('hide');
                                    location.reload();
                                }

                            }
                        });

                    });

                    //Deleta um lançamento
                    $(".j-deletLaunch").click(function (e) {
                        e.preventDefault();

                        var data = $(this).data();

                        $.ajax({
                            url: data.action,
                            type: 'GET',
                            data: data,
                            dataType: 'json',
                            success: function (response) {
                                if (response.error == true) {
                                    alert(response.message);

                                } else {
                                    alert(response.message);
                                    location.reload();
                                }


                            }
                        });

                    });

                    //Visão geral do lançamento
                    $(".j-launchView").click(function (e) {
                        e.preventDefault();

                        $("#visaoGeralLancamento").modal('show');

                    });

                })
            </script>

    </section>
@endsection
