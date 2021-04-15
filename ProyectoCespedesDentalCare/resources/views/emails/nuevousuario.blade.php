<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body>
    <h1>Registro de usuario</h1>
    <br />
    <p>Un saludo {{ $usuario }} te enviamos este correo para informarte que se te ha registrado como usuario en el sistema Cespedes Dental Care,
        aqui te adjuntamos las credenciasles para tu acceso al sistema</p>
    <br />
    <h3>Credenciales de inicio de sesión</h3>
    <p>Usuario: {{$usuario}}</p>
    <p>Email: {{$email}}</p>
    <p>Contraseña: {{$password}}</p>
    <br />
</body>

</html>
