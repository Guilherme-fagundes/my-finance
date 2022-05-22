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

    <section class="sessCategories">
        <div class="container">
            <div class="row py-2 rowTitleCategories">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1 class="tituloMinhasCategorias mb-0"><i class="fa-solid fa-book-open"></i> Todas as categorias
                    </h1>
                    <a href="#" class="btn btn-success btn-sm j-addNewCategory">
                        <span class="icon"><i class="fa-solid fa-circle-plus"></i></span>
                        <span class="text">Adicionar nova categoria</span>
                    </a>
                </div>
            </div>

            <div class="row py-2 rowContentCategory">
                <div class="col-12">

                    @if(count($categories) == 0)
                        <div class="alert alert-warning"><i class="fa-solid fa-circle-exclamation"></i> Não existem categorias cadastradas</div>
                    @else
                        <table class="table table-striped tableCategories">
                            <thead>
                            <tr>
                                <th scope="col">Categoria</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Cadastrada em</th>
                                <th scope="col">Ultima atualização</th>
                                <th scope="col">-</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->nome }}</td>
                                    <td><span class="badge {{ ($category->tipo == 2 ? 'bg-primary' : 'bg-danger') }}">{{ ($category->tipo == 2 ? 'Receita' : 'Despesa') }}</span></td>
                                    <td>{{ date("d/m/Y H:i:s", strtotime($category->created_at)) }}</td>
                                    <td>{{ ($category->updated_at == null ? 'Não atualizada' : date('d/m/Y H:i:s', strtotime($category->updated_at))) }}</td>
                                    <td class="categoryActions">
                                        <a href="#" data-edit_category_id="{{ $category->id }}"
                                           class="actionEdit j-catEdit"><i class="fa-solid fa-pencil"></i></a>
                                        <a href="#" data-delete_category_id="{{ $category->id }}"
                                           class="actionDelete j-catDelete"><i class="fa-solid fa-circle-xmark"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    @endif

                </div>

            </div>


            <!-- Modal criar nova categoria -->
            <div class="modal fade" id="criarNovaCategoria" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                    <label class="form-label"><i class="fa-solid fa-book-open"></i> Informe o nome da
                                        categoria</label>
                                    <input class="form-control" type="text" name="nome" placeholder="Nome da categoria">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><i class="fa-solid fa-filter"></i> Informe o tipo de
                                        lançamento é esta categoria</label>
                                    <select name="tipo" class="form-select">
                                        <option value="1">Despesa</option>
                                        <option value="2">Receita</option>
                                    </select>

                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success btn-sm float-end"><i
                                            class="fa-solid fa-plus"></i> Cadastrar categoria
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal editar categoria -->
            <div class="modal fade" id="editarCategoria" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="exampleModalLongTitle">Editar categoria</h1>

                        </div>
                        <div class="modal-body">
                            <div class="j-alert" role="alert"></div>
                            <form method="post" action="" class="j-formEditCategory">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label"><i class="fa-solid fa-book-open"></i> Informe o nome da
                                        categoria</label>
                                    <input class="form-control" type="text" name="nome" id="categoriaNome"
                                           placeholder="Nome da categoria">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><i class="fa-solid fa-filter"></i> Informe o tipo de
                                        lançamento é esta categoria</label>
                                    <select name="tipo" class="form-select" id="categoriaTipo">
                                        <option value="1">Despesa</option>
                                        <option value="2">Receita</option>
                                    </select>

                                </div>

                                <input type="hidden" name="id" id="catId">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-sm float-end"><i
                                            class="fa-solid fa-pencil"></i> Editar categoria
                                    </button>
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

                        if ($('.j-alert').html() != '') {
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

                                if (data.error == true) {

                                    $(".j-alert").html("");
                                    $('.j-alert').fadeIn(800, function () {
                                        $(this).html("<div class=\"alert alert-warning\"><i class=\"fa-solid fa-circle-exclamation\"></i> " + data.message + "</div>")
                                            .addClass('mb-0 mt-3');

                                    });

                                } else {
                                    $("#criarNovaCategoria").modal('hide');
                                    form.find("input[name=nome]").val("");

                                    window.location.href = "{{ route('categorias.index') }}";

                                }

                            }
                        })

                    });

                    //Edita categoria
                    $(".j-catEdit").click(function (e) {
                        e.preventDefault();

                        if ($('.j-alert').html() != ''){
                            $(".j-alert").html('');
                        }

                        var data = $(this).data();
                        var dataForm = $(this).serialize();


                        $('#editarCategoria').modal('show');

                        $.ajax({
                            url: "{{ route('categorias.edit') }}",
                            type: 'GET',
                            data: data,
                            dataType: 'JSON',
                            success: function (response) {

                                $('#categoriaNome').val(response.result.nome);
                                $('#categoriaTipo').val(response.result.tipo);
                                $('#catId').val(response.result.id);

                            }
                        });

                        $(".j-formEditCategory").submit(function (e) {
                            e.preventDefault();

                            var dataForm = $(this).serialize();

                            $.ajax({
                                url: "{{ route('categorias.edit.post') }}",
                                type: 'POST',
                                dataType: 'json',
                                data: dataForm,
                                success: function (response) {
                                    if (response.error == true){

                                        $(".j-alert").html("");
                                        $('.j-alert').fadeIn(800, function () {
                                            $(this).html("<div class=\"alert alert-warning\"><i class=\"fa-solid fa-circle-exclamation\"></i> " + response.message + "</div>")
                                                .addClass('mb-0 mt-3');

                                        });

                                    }else{

                                        $('.j-alert').html("<div class=\"alert alert-success\"><i class=\"fa-solid fa-circle-check\"></i> " + response.message + "</div>");
                                        $("#editarCategoria").modal('hide');
                                        location.href="{{ route('categorias.index') }}";
                                    }

                                }
                            });

                        });

                    });

                    //Exclui categoria
                    $(".j-catDelete").click(function (e) {
                        e.preventDefault();

                        var data = $(this).data();
                        var delAction = window.confirm('Esta ação não poderá ser desfeita! Todos os dados vinculádos a esta categoria serão eliminados. Você deseja realmente deletar esta categoria?');
                        if (delAction) {

                            $.ajax({
                                url: "{{ route('categorias.delete') }}",
                                type: 'GET',
                                data: data,
                                dataType: 'json',
                                success: function (response) {
                                    if (response.error == false) {
                                        window.location.href = "{{ route('categorias.index') }}";

                                    }

                                }
                            });

                        }

                    });


                })
            </script>

    </section>
@endsection
