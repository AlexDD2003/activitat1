<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <title>Carrito de compras</title>
</head>

<body>
    @include('layouts.navigation')

    <div class="cart">
        <h1>Carrito de compras</h1>

        @if (empty($coches))
        <p>No hay elementos en el carrito.</p>
        @else
        @foreach ($coches as $coche)
        <div class="cart-item">
            <p class="cart-item-title">Marca:{{ $coche->marca }}</p>
            <p class="cart-item-title">Modelo:{{ $coche->modelo }}</p>
            <p class="cart-item-title">Color:{{ $coche->color }}</p>
            <p class="cart-item-title">Precio:{{ $coche->precio }}€</p>
            <form action="{{ route('cart.remove', ['coche' => $coche->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </div>
        @endforeach
        <form action="{{ route('cart.clean') }}" method="POST">
            @csrf
            <div class="cart-total">
                <p>Total: {{ $cartTotal }}€</p>
                <button id="btcomprar" type="submit">Comprar</button>
            </div>
        </form>

    </div>
    <script>
        document.getElementById('btcomprar').addEventListener('click', function() {
            alert('Compra realizada correctamente');
        });
    </script>
    @endif
</body>

</html>