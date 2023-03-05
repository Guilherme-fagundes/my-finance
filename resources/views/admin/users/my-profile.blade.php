@extends('admin.inc.template')

@section('main')
    <section class="sessUsers my-4">
        <div class="usersContent bg-white">

            <div class="my-profile-header border-b-2 border-blue-500">
                <h1 class="text-blue-500 text-3xl font-normal">Meu perfil</h1>

            </div>

            <div class="my-profile-content w-full mx-auto my-4">

                <form class="form-my-Profile w-full">

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

            </div>

        </div>

    </section>

@endsection
