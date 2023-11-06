<!DOCTYPE html>
<?php 
error_reporting(0);
include('validaciones/regVal.php')
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registration.css">
    <title>Registro</title>
</head>
<body>
    <div class="container">
        

        <form action="#" method="post">
            <h1>Registro de usuario</h1><br>

            <label for="">Cedula de identidad:</label><br>
            <input type="text" name="id_card"  value="<?php echo isset($idCard) ? $idCard : ''; ?>" > <span class="error"><?php echo $idCardErr ?></span><br>

            <label for="">Nombre:</label><br>
            <input type="text" name="name"  value="<?php echo isset($name) ? $name : ''; ?>" > <span class="error"><?php echo $nameErr ?></span><br>
            
            <label for="">Apellido:</label><br>
            <input type="text" name="last_name"  value="<?php echo isset($lastName) ? $lastName : ''; ?>"><span class="error"><?php echo $lastNameErr ?></span><br>

            <label for="">Usuario:</label><br>
            <input type="text" name="username"  value="<?php echo isset($username) ? $username : ''; ?>" > <span class="error"><?php echo $usernameErr ?></span><br>

            <label for="">Contraseña:</label><br>
            <input type="password" name="password"  value="<?php echo isset($password) ? $password : ''; ?>" > <span class="error"><?php echo $passwordErr ?></span> <br>

            <label for="">Verificar contraseña:</label><br>
            <input type="password" name="password1"  value="<?php echo isset($password1) ? $password1 : ''; ?>" > <span class="error"><?php echo $password1Err ?></span> <br>
            <br>
            <button name="submit" type="submit">Enviar</button>
            <br>

        </form>
    </div>
</body>
</html>