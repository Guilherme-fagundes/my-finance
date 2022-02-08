@extends('conta.inc.layout.template')
@extends('conta.inc.layout.main-header')


@section('main')

    <section class="sessionHome">
        <div class="container">
            <div class="row py-2 statisticas">

                <div class="despesas py-4 rounded-3 ">
                    Despesas
                </div>
                <div class="receitas py-4 rounded-3" style="background-color: #198754">
                    Receitas
                </div>
                <div class="saldo py-4 bg-primary rounded-3">
                    Saldo
                </div>

            </div>

        </div>

    </section>

@endsection

