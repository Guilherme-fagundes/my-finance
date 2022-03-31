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

    <section class="sessWalleties">
        <div class="container">
            <div class="row py-2 rowTitleWalleties">
                <div class="col-12">
                    <h1 class="tituloMinhasCarteiras mb-0"><i class="fa-solid fa-wallet"></i> Todas as carteiras</h1>
                </div>
            </div>

            <div class="row my-5 contentListWalleties">
                <div class="col-12 col-sm-4 mb-4">

                    <div class="card cardNewWallet">
                        <div class="card-body">
                            <h2 class="card-title text-center"><i class="fa-solid fa-wallet"></i></h2>
                            <p class="card-text my-5 text-center">Para criar uma nova carteira clique aqui.</p>
                            <p class="text-center addNewWallet" data-toggle="modal" data-target="#criarNovaCarteira"><span><i class="fa-solid fa-circle-plus"></i> Adicionar nova carteira</span></p>
                        </div>
                    </div>

                </div>



            </div>



            <!-- Modal criar nova carteira -->
            <div class="modal fade" id="criarNovaCarteira" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="exampleModalLongTitle">Criar nova carteira</h1>

                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label"><i class="fa-solid fa-wallet"></i> Descrição</label>
                                    <input class="form-control" type="text" name="descricao" placeholder="Descrição ou nome da carteira">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><i class="fa-solid fa-paintbrush"></i> Selecione a cor para a carteira</label><br>
                                    <input class="form-control-color" value="#0078FF" type="color" name="cor_carteira">

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

    </section>
@endsection
