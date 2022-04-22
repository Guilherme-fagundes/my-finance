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
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1 class="tituloMinhasCarteiras mb-0"><i class="fa-solid fa-book-open"></i> Todas as categorias</h1>
                    <a href="#" class="btn btn-success btn-sm j-addNewCategory"><i class="fa-solid fa-circle-plus"></i> Adicionar nova categoria</a>
                </div>
            </div>




            <!-- Modal criar nova carteira -->
            <div class="modal fade" id="criarNovaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="exampleModalLongTitle">Criar nova categoria</h1>

                        </div>
                        <div class="modal-body">
                            <div class="j-alert" role="alert"></div>
                            <form method="post" action="" class="j-formCreateNewCategory">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label"><i class="fa-solid fa-book-open"></i> Informe o nome da categoria</label>
                                    <input class="form-control" type="text" name="nome" placeholder="Nome da categoria">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><i class="fa-solid fa-filter"></i> Informe o tipo de lançamento é esta categoria</label>
                                    <select name="tipo" class="form-select">
                                        <option value="1">Despesa</option>
                                        <option value="2">Receita</option>
                                    </select>

                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success btn-sm float-end"><i class="fa-solid fa-plus"></i> Cadastrar categoria</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


            <script>
                $(function () {

                    $(".j-addNewCategory").click(function () {
                        $('#criarNovaCategoria').modal('show');

                        if ($('.j-alert').html() != ''){
                            $(".j-alert").html('');
                        }

                    })

                    $('.j-formCreateNewCategory').submit(function (e) {
                        e.preventDefault();

                        var form = $(this);
                        var data = $(this).serialize();

                        $.ajax({
                            url: "{{ route('categorias.nova.post') }}",
                            type: 'POST',
                            data: data,
                            dataType: 'json',
                            success: function (data) {

                                console.log(data);

                                if (data.error == true){

                                    $(".j-alert").html("");
                                    $('.j-alert').fadeIn(800, function () {
                                        $(this).html("<div class=\"alert alert-warning\"><i class=\"fa-solid fa-circle-exclamation\"></i> " + data.message + "</div>")
                                            .addClass('mb-0 mt-3');

                                    });

                                }else{
                                    $("#criarNovaCategoria").modal('hide');
                                    form.find("input[name=nome]").val("");

                                    window.location.href="{{ route('categorias.index') }}";

                                }

                            }
                        })

                    });

                    $('.walletDelet').click(function (e) {
                        e.preventDefault();

                        var data = $(this).data();
                        var walletId = $("#wallet-"+data.carteira_id);

                        walletId.fadeOut(500);
                        $.ajax({
                            url: data.action,
                            type: "GET",
                            data: data,
                            dataType: 'json',
                            success: function (response) {
                                if (response.error == false){
                                    walletId.remove();
                                }

                            }

                        })
                    });

                })
            </script>

    </section>
@endsection
