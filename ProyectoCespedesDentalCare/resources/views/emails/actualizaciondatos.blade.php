<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Actualizacion de datos</h1>
    <br />
    <p>Un saludo {{ $usuario }} te enviamos este correo para informarte que se han actualizado tus datos de
        usuario,
        aqui te adjuntamos las credenciasles para tu acceso al sistema</p>
    <br />
    <table class="default">
        <tr>
            <th scope="row">Datos de inicio de sesión</th>
        </tr>
        <tr>
            <th>Usuario</th>
            <td>{{ $usuario }}</td>
        </tr>
        <tr>
            <th>Correo electronico</th>
            <td>{{ $email }}</td>
        </tr>
        <tr>
            <th>Contraseña</th>
            <td>{{ $password }}</td>
        </tr>
        <p>Por favor, cuando inicies sesión cambia la contraseña por una nueva</p>
    </table>
</body>

</html>
