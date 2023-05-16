<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Listado de Coches</title>
</head>

<body>
    @include('layouts.navigation')
    <h1>Listado de Coches</h1>

    @foreach($coches as $coche)
    <div class="coche">
        <h2>{{ $coche['marca'] }}</h2>
        <p>{{ $coche['modelo'] }}</p>
        <a href="{{ route('coches.show', $coche['id']) }}" class="details-btn">Ver detalles</a>
    </div>
    @endforeach
</body>

</html>