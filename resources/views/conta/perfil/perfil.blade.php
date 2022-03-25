@extends('conta.inc.layout.template', ["user" => $user])
@extends('conta.inc.layout.main-header')


@section('main')

    <section classs="sessAlert">
        <div class="container">
            <div class="row alertErrorBox">

                @if($errors->all())
                    @foreach($errors->all() as $msg)
                        <div class="alert alert-danger j-alert" role="alert"><i class="fas fa-info-circle"></i> {{ $msg }}</div>
                    @endforeach
                @endif

            </div>

        </div>
    </section>

    <section class="sessProfile">
        <div class="container">

            <div class="row py-2 rowTitleProfile">
                <div class="col-12">
                    <h1 class="tituloMeuPerfil mb-0">Meu perfil</h1>

                </div>

            </div>
            <div class="j-alertSaveData"></div>

            <div class="row mt-3 mb-0">
                <div class="col-12 col-md-12 titleMeusDados">
                    <h3 class="pb-0 mt-3 mb-4">Meus dados</h3>
                    <form class="j-alteraFoto" method="post" enctype="multipart/form-data">
                        @csrf
                        <img src="{{ asset('storage/default_empty.jpg') ?? asset('storage/conta/usuario/'.$user->id.'/'.$user->foto) }}" class="rounded-circle" width="100" height="100">
                        <input type="file" name="foto" id="userAlterFoto" class="d-none">
                        <p class="mt-4"><label for="userAlterFoto" class="btn btn-link jBtnSelectUserPhoto">Selecione sua foto de perfil</label></p>
                        <button type="submit">Enviar nova foto</button>
                    </form>
                </div>

            </div>

            <div class="row">
                <div class="col-12 ">
                    <form method="post" action="" class="j-formSalvarDados" enctype="multipart/form-data">

                        @csrf
                        <div class="row py-5 meusDados">

                            <div class="col-12 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Selecione a foto de perfil</label>
                                    <input class="form-control" type="file" name="foto">

                                </div>

                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nome</label>
                                    <input class="form-control" type="text" name="nome" value="{{ $user->nome ?? '' }}">

                                </div>

                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Sobrenome</label>
                                    <input class="form-control" type="text" name="sobrenome" value="{{ $user->sobrenome ?? '' }}">

                                </div>

                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">E-mail</label>
                                    <input class="form-control" name="email" value="{{ $user->email ?? '' }}">

                                </div>

                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Atualizar meus dados</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>


        </div>

    </section>

    <script>

        $(document).ready(function () {
            $('.j-alert').fadeOut(5000, function () {
                $(this.removeClass('alert-danger'));

            });

        });

        $(function () {
            $('.j-formSalvarDados').submit(function (e) {
                e.preventDefault();
                var data = $(this).serialize();

                $.ajax({
                    url: "perfil/post",
                    type: 'post',
                    dataType: "json",
                    data: data,
                    success: function (response) {
                        console.log(response)
                        if (response.error == true){
                            $('.j-alertSaveData').html("<div class=\"alert alert-danger\"><i class=\"fa-solid fa-circle-exclamation\"></i> "+response.message+"</div>")
                            .addClass('mb-0 mt-3');

                        }else{
                            $('.j-alertSaveData').html("<div class=\"alert alert-success\"><i class=\"fa-solid fa-circle-check\"></i> "+response.message+"</div>")
                                .addClass('mb-0 mt-3');
                            window.location.href="{{ route('conta.home') }}";
                        }
                    }
                });
            });

            $('.j-alteraFoto').submit(function (e) {
                e.preventDefault();

                var fileTarget = e.target.files;
                var formData = $(this).serialize();

                $(this).ajaxSubmit({

                    url: 'perfil/altera-foto',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data)

                    },
                    error: function (error) {
                        console.log(error);

                    }
                });





            });

        })
    </script>

@endsection

