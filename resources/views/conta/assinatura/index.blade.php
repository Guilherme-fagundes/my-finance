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
                        <p class="tituloAssinaturaContent">Assine o plano <strong>PREMIUM</strong> para ter mais recursos e ter controle total sobre seus gastos e ganhos.</p>
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
                                <h5 class="card-title tituloPlano">Premium</h5>
                                <h1 class="card-subtitle  mb-2 mt-4 text-black text-center"><span class="moeda">R$</span><span class="valorPlano">39,90</span><span class="porMes"> /mês</span></h1>
                                <ul class="beneficiosPlano">
                                    <li><i class="fa-solid fa-circle-check"></i> Carteitas ilimitadas</li>
                                    <li><i class="fa-solid fa-circle-check"></i> Categorias ilimitadas</li>
                                    <li><i class="fa-solid fa-circle-check"></i> Lançamentos ilimitados</li>
                                </ul>
                                <div class="d-grid gap-2">
                                    <a href="{{ route('assinatura.assinar') }}" class="btn btn-assinar">Assinar</a>
                                </div>
                            </div>
                        </div>

                    </div>
                @else

                   <div class="col-12 bg-white py-3">
                       <h5 class="text-center tituloBoasVindasPlanoPremium mb-3">Olá {{ $user->nome }} {{ $user->sobrenome }}, seja bem vindo ao plano PREMIUM</h5>
                       <p class="assinaturaPremiumDescricao">Este espaço seria onde estariam o relatório de cobranças mensais, porém como é apenas de deonstração, não será implementada a integração com algum Gateway de pagamento.</p>
                       <a href="{{ route('assinatura.cancelar') }}" class="btn btn-cancelarAssionatura">Clique aqui para cancelar assinatura</a>
                   </div>
                @endif
            </div>

        </div>

    </section>

@endsection

