<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="{{ url(mix('assets/admin/css/style.css')) }}"/>


</head>
<body>

    <header class="admin-header py-4 bg-blue-500">
        <div class="admin-header-content flex justify-between items-center">
            <h1 class="italic text-2xl">Admin <span class="text-white">My Finance</span></h1>
            <div class="admin-header-menu">
                <a href="#" class="text-xs py-1 px-4 bg-green-500 hover:bg-green-700 text-white">sair</a>

            </div>
        </div>


        <div class="admin-header-nav mt-4">
            <a href="{{ route('admin.index') }}" class="py-2 px-4 bg-white text-blue-500 hover:bg-blue-500 hover:text-white">Dashboard</a>
            <a href="{{ route('admin.user.index') }}" class="py-2 px-4 bg-white text-blue-500 hover:bg-blue-500 hover:text-white">Usuarios</a>
            <a href="#" class="py-2 px-4 bg-white text-blue-500 hover:bg-blue-500 hover:text-white">Meu perfil</a>
            <a href="#" class="py-2 px-4 bg-white text-blue-500 hover:bg-blue-500 hover:text-white">Planos</a>
            <a href="#" class="py-2 px-4 bg-white text-blue-500 hover:bg-blue-500 hover:text-white">Assinaturas</a>
            <a href="#" class="py-2 px-4 bg-white text-blue-500 hover:bg-blue-500 hover:text-white">Configurações</a>

        </div>

    </header>

    @yield('main')


</body>
</html>
