<!DOCTYPE html>
<html>
<head>
    <title>Pedidos</title>
</head>
<body>
    @include('layouts.navigation')
    <h1>Pedidos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Pedido</th>
                <th>Total</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->user->name }}</td>
                    <td>{{ $pedido->order }}</td>
                    <td>{{ $pedido->total }}</td>
                    <td>{{ $pedido->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
