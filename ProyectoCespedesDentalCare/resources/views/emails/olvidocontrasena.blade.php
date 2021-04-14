<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Recuperacion de datos de inicio de sesión</h1>
    <br />
    <p>Un saludo {{ $usuario }} te enviamos este correo por la solicitud de olvido su contrasela,
        aqui te adjuntamos las credenciasles para tu acceso al sistema</p>
    <br />
    <table class="table table-hover">
        <th scope="row">Datos de inicio de sesión</th>
        <tr>
            <th>Usuario</th>
            <td>{{ $usuario }}</td>
        </tr>
        <tr>
            <th scope="row">Correo electronico</th>
            <td>{{ $email }}</td>
        </tr>
        <tr>
            <th scope="row">Contraseña</th>
            <td>{{ $password }}</td>
        </tr>
    </table>
    <p>Por favor, cuando inicies sesión cambia la contraseña por una nueva</p>
</body>

</html>
