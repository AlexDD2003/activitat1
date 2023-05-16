<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    <title>Detalles del Coche</title>
</head>

<body>
    @include('layouts.navigation')

    <div class="container">
        <div class="car-details">
            <h1>Detalles del Coche</h1>

            <div class="car-info">
                <h2>{{ $coche['marca'] }}</h2>
                <p>{{ $coche['modelo'] }}</p>
                <p>{{ $coche['color'] }}</p>
                <p>{{ $coche['precio'] }}</p>

                <a class="btbuy" href="{{ route('cart.add', ['coche' => $coche['id']]) }}">Comprar</a>



            </div>
        </div>
    </div>
</body>

</html>
