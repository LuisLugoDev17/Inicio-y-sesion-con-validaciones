<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        
        <form action="" method="post">
            <h1>Inicio de sesion</h1>
            <?php include('validaciones/logVal.php'); ?><br>
            <label for="">Usuario:</label><br>
            <input type="text" name="username"><br>

            <label for="">Contraseña:</label><br>
            <input type="password" name="password"><br><br>

            <button name="submit" type="submit">iniciar sesion</button>
            <br>
            

        </form>
    </div>
</body>
</html>