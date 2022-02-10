@extends('conta.inc.layout.template')
@extends('conta.inc.layout.main-header')


@section('main')

    <section class="sessionHome">
        <div class="container">
            <div class="row py-2 statisticas">

                <div class="despesas pt-3 rounded-3 ">
                    <p class="title">Despesas</p>
                    <p class="valor">
                        <span class="icon">R$</span>
                        <span class="text">950,00</span>
                    </p>
                </div>
                <div class="receitas pt-3 rounded-3" style="background-color: #198754">
                    <p class="title">Receitas</p>
                    <p class="valor">
                        <span class="icon">R$</span>
                        <span class="text">3.520,00</span>
                    </p>
                </div>
                <div class="saldo pt-3 bg-primary rounded-3">
                    <p class="title">Saldo</p>
                    <p class="valor">
                        <span class="icon">R$</span>
                        <span class="text">20.880,00</span>
                    </p>
                </div>

            </div>

        </div>

    </section>

@endsection

