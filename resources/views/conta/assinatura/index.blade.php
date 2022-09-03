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

            <div class="row py-2 rowAssinaturaTitulo">
                <div class="col-12">
                    <h1 class="tituloAssinatura mb-0"><i class="fa-solid fa-money-check-dollar"></i> Assinatura</h1>
                    @if($user->tipo_conta == 'free')
                        <p class="tituloAssinaturaContent">Assine um plano para ter mais recursos e ter controle total sobre seus gastos e ganhos.</p>
                    @else
                        <p class="tituloAssinaturaContent">Tudo certo {{ $user->nome }}! Aproveite o máximo e comece a gerenciar seus gastos e lucros com facilidade!</p>

                    @endif
                </div>

            </div>

            <div class="row py-2 mt-3 rowAssinaturaPlanos">
                @if($user->tipo_conta == 'free')
                    <div class="col-12 col-sm-6 col-md-6">

                        <div class="card">
                            <div class="card-body">
                              <h1 class="card-title tituloPlano">Plano Pro</h1>
                              <p class="card-subtitle valorPlano mb-2">R$ 19,90</p>
                              <ul class="beneficiosPlano">
                                <li>Categorias ilimitadas</li>
                                <li>3 Carteiras</li>
                                <li>Lançamentos ilmitados</li>
                                <li>Gestão completa de categorias, carteiras e lançamentos</li>
                              </ul>
                              <a href="#" class="btn-assinar">Quero assinar</a>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-sm-6 col-md-6">

                        <div class="card">
                            <div class="card-body">
                              <h1 class="card-title tituloPlano">Plano Premium</h1>
                              <p class="card-subtitle valorPlano mb-2">R$ 29,90</p>
                              <ul class="beneficiosPlano">
                                <li>Categorias ilimitadas</li>
                                <li>Carteiras ilimitadas</li>
                                <li>Lançamentos ilmitados</li>
                                <li>Gestão completa de categorias, carteiras e lançamentos</li>
                              </ul>
                              <a href="#" class="btn-assinar">Quero assinar</a>
                            </div>
                        </div>

                    </div>
                @else

                   <div class="col-12 bg-white py-3">

                   </div>
                @endif
            </div>

        </div>

    </section>

@endsection

