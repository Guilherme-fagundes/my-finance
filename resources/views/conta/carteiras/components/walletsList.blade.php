<div class="col-12 col-md-4 mb-4 walletBox" id="wallet-{{ $wallet->id }}">

    <div class="card cardWallet w-100" style="background-color: {{ $wallet->cor }}; color: #f1f1f1;" id="{{ $wallet->id }}">
        <div class="card-body">
            <h2 class="card-title walletTitle mb-5 text-center"><i class="fa-solid fa-wallet"></i> {{ $wallet->nome }}</h2>
            <p class="card-text text-center despesa"><span>Despesas: R$ 2.500,00</span></p>
            <p class="card-text my-2 text-center receita"><span>Receitas: R$ 10.000,00</span></p>
            <div class="walletActions">
                <p>
                    <a href="#" title="Abrir carteira" class="walletView"><i class="fa-solid fa-eye"></i></a>
                    <a href="#" data-carteira_id="{{ $wallet->id }}" data-action="{{ route('carteiras.editar') }}" title="Editar carteira" class="walletEdit j-editWallet"><i class="fa-solid fa-pen"></i></a>
                    <a href="#" data-carteira_id="{{ $wallet->id }}" data-action="{{ route('carteiras.excluir.post') }}" title="Excluir carteira" class="walletTrash walletDelet"><i class="fa-solid fa-circle-xmark"></i></a>
                </p>
            </div>
        </div>

    </div>

</div>

<!-- Modal editar carteira -->
<div class="modal fade" id="editarCarteira" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLongTitle">Editar carteira</h1>

            </div>
            <div class="modal-body">
                <div class="j-alert" role="alert"></div>
                <form method="post" action="" class="j-formEditWallet">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-solid fa-wallet"></i> Descrição</label>
                        <input class="form-control" type="text" id="walletName" name="descricao" placeholder="Descrição ou nome da carteira">

                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-solid fa-paintbrush"></i> Selecione a cor para a carteira</label><br>
                        <input class="form-control-color" id="walletCollor" value="#0078FF" type="color" name="cor_carteira">

                    </div>
                    <input type="hidden" name="id" value="" id="walletEditId">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm float-end"><i class="fa-solid fa-arrow-rotate-right"></i> Editar carteira</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<script>
   $(function () {
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

       //edita carteira - modal
       $('.j-editWallet').click(function (e) {
           e.preventDefault();

           $('.j-alert').html("");
           var data = $(this).data();
           console.log(data);
           $('#editarCarteira').modal('show');

           $.ajax({
               url: "{{ route('carteiras.editar') }}",
               type: 'GET',
               dataType: 'json',
               data: data,
               success: function (response) {
                   $("#walletName").val(response.result.nome);
                   $("#walletCollor").val(response.result.cor);
                   $("#walletEditId").val(response.result.id);

               }
           });

       });

       $('.j-formEditWallet').submit(function (e) {
           e.preventDefault();

           var dados = $(this).serialize();
           var form = $(this);

           $.ajax({
               url: "{{ route('carteiras.editar.post') }}",
               type: 'POST',
               dataType: 'json',
               data: dados,
               success: function (response) {
                   console.log(response);

                   if (response.error == true){
                       $('.j-alert').html("<div class=\"alert alert-warning\"><i class=\"fa-solid fa-circle-exclamation\"></i> " + response.message + "</div>");
                   }else{
                       $('.j-alert').html("<div class=\"alert alert-success\"><i class=\"fa-solid fa-circle-check\"></i> " + response.message + "</div>");
                       $('#editarCarteira').modal('hide');
                       location.href="{{ route('carteiras.listar') }}";
                   }

               }
           })

       });

   })
</script>
