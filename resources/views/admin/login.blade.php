<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
</head>
<body>

    <section class="sessLogin mx-auto bg-blue-600 h-full w-full flex justify-center items-center fixed">
        <div class="loginBox w-5/12 md:w-1/2 mx-auto bg-white py-4 px-4 rounded-xl">
            <div class="loginBoxHeader my-2 w-full sm:w-full mx-auto">
                <h1 class="text-center text-blue-600 italic uppercase font-bold text-2xl">Painel Administrativo</h1>
            </div>

            <div class="loginBoxBody my-4">
                <form method="POST" class="mx-3">
                    <div class="mb-4">
                        <label class="block text-slate-500">E-mail</label>
                        <input type="text" class="w-full py-2 px-3 border-b border-blue-600 focus:outline-none"/>

                    </div>

                    <div class="mb-4">
                        <label class="block text-slate-500">Senha</label>
                        <input type="password" class="w-full py-2 px-3 border-b border-blue-600 focus:outline-none"/>

                    </div>

                    <div class="mb-4 flex justify-end">
                        <a href="#" class=" text-blue-600 hover:underline">Esqueci a senha</a>
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="bg-blue-600 text-white hover:bg-blue-800 py-1 px-5 rounded-sm">Entrar</button>

                    </div>



                </form>

            </div>

        </div>

    </section>

</body>
</html>
