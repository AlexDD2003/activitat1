<!DOCTYPE html>
<html>
<head>
    <title>Listado de Coches</title>
</head>
<body>
    <h1>Listado de Coches</h1>
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coches as $coche)
            <tr>
                <td>{{ $coche->marca }}</td>
                <td>{{ $coche->modelo }}</td>
                <td>{{ $coche->color }}</td>
                <td>{{ $coche->precio }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
