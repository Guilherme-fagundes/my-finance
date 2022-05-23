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
                    <p class="tituloAssinaturaContent">Assine o plano <strong>PREMIUM</strong> para ter mais recursos e ter controle total sobre seus gastos e ganhos.</p>
                </div>

            </div>

            <div class="row py-2 mt-3 rowAssinaturaPlanos">
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
            </div>

        </div>

    </section>

@endsection

