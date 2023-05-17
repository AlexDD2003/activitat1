<head>
<link rel="stylesheet" href="{{ asset('css/nav.css') }}">
</head>
<nav class="bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div id="caja" class="hidden md:block">
                    <a href="{{ route('coches.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Inicio</a>
                    <a href="{{ route('cart.show') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Carrito</a>
                    <a href="{{ route('pedidos.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Mis Pedidos</a>
                    <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
</form>
                </div>
            </div>
        </div>
    </div>
</nav>
