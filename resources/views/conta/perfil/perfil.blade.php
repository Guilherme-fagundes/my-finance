@extends('conta.inc.layout.template', ["user" => $user])
@extends('conta.inc.layout.main-header')


@section('main')

    <section classs="sessAlert">
        <div class="container">
            <div class="row alertErrorBox">

                @if($errors->all())
                    @foreach($errors->all() as $msg)
                        <div class="alert alert-danger" role="alert"><i class="fas fa-info-circle"></i> {{ $msg }}</div>
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

           <form method="post" action="">
               <div class="row py-5 meusDados">
                   <div class="col-12 col-md-12 titleMeusDados">
                       <h3 class="pb-0">Meus dados</h3>
                   </div>
                   <div class="col-12 col-md-12">
                       <div class="mb-3">
                           <label class="form-label">Selecione a foto de perfil</label>
                           <input class="form-control" type="file" name="nome">

                       </div>

                   </div>
                   <div class="col-12 col-md-6">
                       <div class="mb-3">
                           <label class="form-label">Nome</label>
                           <input class="form-control" type="text" name="nome">

                       </div>

                   </div>
                   <div class="col-12 col-md-6">
                       <div class="mb-3">
                           <label class="form-label">Sobrenome</label>
                           <input class="form-control" type="text" name="sobrenome">

                       </div>

                   </div>
                   <div class="col-12">
                       <div class="mb-3">
                           <label class="form-label">E-mail</label>
                           <input class="form-control" name="email">

                       </div>

                   </div>
                   <div class="col-12">
                       <button type="submit" class="btn btn-primary">Salvar</button>
                   </div>
               </div>
           </form>
        </div>

    </section>


@endsection

