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
    <h3>Credenciales de inicio de sesión</h3>
    <p>Usuario: {{$usuario}}</p>
    <p>Email: {{$email}}</p>
    <p>Contraseña: {{$password}}</p>
    <br />
    <b>Por favor, cuando inicies sesión cambia la contraseña por una nueva</b>

</body>

</html>
