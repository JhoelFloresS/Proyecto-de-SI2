<!doctype html>
<html lang="en">

<head>
    <title>Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <h5 class=" font-weight-bold text-center">Bitacoras</h5>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Acción</th>
                    <th scope="col">Fecha Cliente</th>
                    <th scope="col">Fecha Servidor</th>
                    <th scope="col">Ip maquina</th>
                    <th scope="col">Usuario</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bitacoras as $bitacora)
                <tr>
                    <th > {{ $bitacora->id }} </th>
                    <td class="col-4"> {{ $bitacora->accion }} </td>
                    <td> {{ $bitacora->fecha }} </td>
                    <td> {{ $bitacora->fecha_server }} </td>
                    <td> {{ $bitacora->ip_maquina}} </td>
                    <td> {{ $bitacora->user->name }} </td>
                </tr>
                @endforeach
 
            </tbody>
        </table>
    </div>
</body>

</html>
