<h1>Ative sua conta</h1>

<p>Olá {{ $user->nome }}, para ativar sua conta clique no link abaixo</p>
<p><a href="{{ route('user.confirmAcount', ['email' => $user->email]) }}">Ativar minha conta aqui</a></p>
