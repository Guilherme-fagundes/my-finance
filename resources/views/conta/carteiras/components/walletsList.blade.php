<div class="col-12 col-md-4 mb-4 walletBox" style="display: none" id="wallet-{{ $wallet->id }}">

    <div class="card cardWallet w-100" style="background-color: {{ $wallet->cor }}; color: #f1f1f1;">
        <div class="card-body">
            <h2 class="card-title mb-5 text-center"><i class="fa-solid fa-wallet"></i> {{ $wallet->nome }}</h2>
            <p class="card-text text-center"><span>Despesas: R$ 2.500,00</span></p>
            <p class="card-text my-2 text-center"><span>Receitas: R$ 10.000,00</span></p>
            <div class="walletActions">
                <p>
                    <a href="#" title="Abrir carteira" class="walletView"><i class="fa-solid fa-eye"></i></a>
                    <a href="#" title="Editar carteira" class="walletEdit"><i class="fa-solid fa-pen"></i></a>
                    <a href="#" data-carteira_id="{{ $wallet->id }}" data-action="{{ route('carteiras.excluir.post') }}" title="Excluir carteira" class="walletTrash walletDelet"><i class="fa-solid fa-circle-xmark"></i></a>
                </p>
            </div>
        </div>

    </div>

</div>

<script>
    $('.walletDelet').click(function (e) {
        e.preventDefault();

        var data = $(this).data();
        $("#wallet-"+data.carteira_id).fadeOut();

        $.ajax({
            url: data.action,
            type: "GET",
            data: data,
            dataType: 'json',
            success: function (response) {
                console.log(response)

            }

        })
    });
</script>
