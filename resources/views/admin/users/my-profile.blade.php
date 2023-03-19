@extends('admin.inc.template')

@section('main')
    <section class="sessUsers my-4">
        <div class="usersContent bg-white">

            <div class="my-profile-header border-b-2 border-blue-500">
                <h1 class="text-blue-500 text-3xl font-normal">Meu perfil</h1>

            </div>

            <div class="my-profile-content w-full mx-auto my-4">


                <form class="form-my-Profile w-full jMyDatas">
                    <div class="w-full my-2">
                        <h3 class="text-base capitalize">meus dados</h3>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block text-gray-500 capitalize text-sm">Nome</label>
                            <input type="text" name="name" class="w-full block bg-gray-100 text-gray-500 border-blue-700"/>

                        </div>

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block text-gray-500 capitalize text-sm">Sobrenome</label>
                            <input type="text" name="name" class="w-full backdrop:block bg-gray-100 text-gray-500 border-blue-700"/>

                        </div>

                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="w-full block text-gray-500 capitalize text-sm">E-mail</label>
                            <input type="text" name="email" class="w-full backdrop:block bg-gray-100 text-gray-500 border-blue-700"/>

                        </div>


                    </div>

                    <div class="flex flex-wrap mb-6">
                        <button class="px-4 py-3 bg-blue-700 text-sm hover:bg-blue-500 text-white">Salvar meus dados</button>

                    </div>

                </form>


                <form class="form-my-Profile w-full jMyAdress">
                    <div class="w-full my-2">
                        <h3 class="text-base capitalize">Endereço</h3>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block text-gray-500 capitalize text-sm">CEP</label>
                            <input type="text" name="name" class="w-full block bg-gray-100 text-gray-500 border-blue-700"/>

                        </div>

                        <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                            <label class="block text-gray-500 capitalize text-sm">Estado</label>
                            <input type="text" name="name" class="w-full backdrop:block bg-gray-100 text-gray-500 border-blue-700"/>

                        </div>

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block text-gray-500 capitalize text-sm">Cidade</label>
                            <input type="text" name="name" class="w-full backdrop:block bg-gray-100 text-gray-500 border-blue-700"/>

                        </div>

                    </div>



                    <div class="flex flex-wrap -mx-3 mb-6">

                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block text-gray-500 capitalize text-sm">Bairro</label>
                            <input type="text" name="bairro" class="w-full backdrop:block bg-gray-100 text-gray-500 border-blue-700"/>

                        </div>

                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block text-gray-500 capitalize text-sm">Logradouro/Rua</label>
                            <input type="text" name="logradouro" class="w-full block bg-gray-100 text-gray-500 border-blue-700"/>

                        </div>

                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block text-gray-500 capitalize text-sm">Complemento</label>
                            <input type="text" name="complemento" class="w-full backdrop:block bg-gray-100 text-gray-500 border-blue-700"/>

                        </div>

                    </div>



                    <div class="flex flex-wrap mb-6">
                        <button class="px-4 py-3 bg-blue-700 text-sm hover:bg-blue-500 text-white">Salvar endereço</button>

                    </div>

                </form>


                <form class="form-my-Profile w-full jMyPass">
                    <div class="w-full my-2">
                        <h3 class="text-base capitalize">Minha senha</h3>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block text-gray-500 capitalize text-sm">Senha</label>
                            <input type="password" name="pass" class="w-full block bg-gray-100 text-gray-500 border-blue-700"/>

                        </div>

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block text-gray-500 capitalize text-sm">Confirmar senha</label>
                            <input type="password" name="cPass" class="w-full backdrop:block bg-gray-100 text-gray-500 border-blue-700"/>

                        </div>

                    </div>

                    <div class="flex flex-wrap mb-6">
                        <button class="px-4 py-3 bg-blue-700 text-sm hover:bg-blue-500 text-white">Salvar nova senha</button>

                    </div>

                </form>


            </div>

        </div>

    </section>

@endsection
