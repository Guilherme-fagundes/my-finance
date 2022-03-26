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
                    <h1 class="tituloMeuPerfil mb-0"><i class="fas fa-user"></i> Meu perfil</h1>

                </div>

            </div>
            <div class="j-alertSaveData"></div>

            <div class="row mt-3 mb-0">
                <div class="col-12 col-md-12 titleMeusDados">
                    <h3 class="pb-0 mt-3 mb-4">Meus dados</h3>
                    <form class="j-alteraFoto" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (!empty($user->foto))
                            <img src="{{ asset('storage/conta/usuario/'.session()->get('userId').'/'. $user->foto) }}" class="rounded-circle" width="100" height="100">
                        @else
                            <img src="{{ asset('storage/default_empty.jpg') }}" class="rounded-circle" width="100" height="100">
                        @endif
                        <input type="file" name="foto" id="userAlterFoto" class="d-none">
                        <p class="mt-4"><label for="userAlterFoto" class="btn btn-link jBtnSelectUserPhoto">Selecione sua foto de perfil</label></p>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-arrow-up"></i> Enviar nova foto</button>
                    </form>
                </div>

            </div>

            <div class="row">
                <div class="col-12 ">
                    <form method="post" action="" class="j-formSalvarDados" enctype="multipart/form-data">

                        @csrf
                        <div class="row py-5 meusDados">

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
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-right"></i> Atualizar meus dados</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

            <div class="row">
                <div class="col-12 titleMeusDados" id="perfilEndereco">
                    <h3 class="pb-0 mb-0 mt-3 mb-4">Meu endereço</h3>
                    <form method="post" action="" class="j-formSalvarDados" enctype="multipart/form-data">

                        @csrf
                        <div class="row py-2 meusDados">

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Cep</label>
                                    <input class="form-control" type="text" name="cep" placeholder="Informe seu cep" id="cep">

                                </div>

                            </div>
                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Estado</label>
                                    <input class="form-control" type="text" readonly name="uf" id="uf">

                                </div>

                            </div>
                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Cidade</label>
                                    <input class="form-control" type="text" readonly name="localidade" id="localidade">

                                </div>

                            </div>
                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Bairro</label>
                                    <input class="form-control" name="bairro" readonly id="bairro">

                                </div>

                            </div>
                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Logradrouro</label>
                                    <input class="form-control" name="logradouro" readonly id="logradouro">

                                </div>

                            </div>
                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Complemento</label>
                                    <input class="form-control" name="complemenbto" readonly id="complemento">

                                </div>

                            </div>
                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Numero</label>
                                    <input class="form-control" name="numero" id="numero">

                                </div>

                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-right"></i> Atualizar meus dados</button>
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

                        if (data.error === true){

                            $('.j-alertSaveData').html("<div class=\"alert alert-danger\"><i class=\"fa-solid fa-circle-exclamation\"></i> "+data.errors.foto[0]+"</div>")
                                .addClass('mb-0 mt-3');
                        }else {
                            $('.j-alertSaveData').html("<div class=\"alert alert-success\"><i class=\"fa-solid fa-circle-check\"></i> "+data.message+"</div>")
                                .addClass('mb-0 mt-3');
                            window.location.href="{{ route('conta.perfil') }}";
                        }

                    },
                    error: function (error) {
                        console.log(error);

                    }
                });





            });
            $("#cep").mask("00000-000");
            $('#cep').keyup(function (e) {
                var cep = $(this).val();
                var cepArr = cep.split('-');
                var cepUnion = cepArr.join("");

               if (cepUnion.length == 8){
                   $.getJSON("https://viacep.com.br/ws/"+cepUnion+"/json/", function (response) {
                       console.log(response)
                       $("#uf").val(response.uf);
                       $("#localidade").val(response.localidade);
                       $("#bairro").val(response.bairro);
                       $("#logradouro").val(response.logradouro);
                       $("#complemento").val(response.complemento);
                   });
               }
            })

        })
    </script>

@endsection

