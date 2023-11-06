<!DOCTYPE html>
<?php 
// SESSION START
error_reporting(0);
session_start();

$id = $_SESSION['id'];
$idCard = $_SESSION['id_card'];
$name = $_SESSION['name'];
$lastName = $_SESSION['last_name'];
$user = $_SESSION['username'];
$registrationDate = $_SESSION['registration_date'];
if($user == null || $user == ''){
    echo '<b>Tienes que <a href="index.php">iniciar sesion.</a></b>';
    die();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="container">
            <h1>Bienvenido, <?php echo $name . ' ' . $lastName; ?></h1>
            <table>
                <tr>
                    <th>Datos</th>
                    <th>usuarios</th>
                </tr>
                <tr>
                    <td>id:</td>
                    <td><?php echo $id ?></td>
                </tr>
                <tr>
                    <td>Cedula:</td>
                    <td><?php echo $idCard ?></td>
                </tr>
                <tr>
                    <td>Usuario:</td>
                    <td><?php echo $user ?></td>
                </tr>
                <tr>
                    <td>Fecha de registro:</td>
                    <td><?php echo $registrationDate ?></td>
                </tr>
            </table>
            <a href="close.php"><button>Cerrar session</button></a>
        </div>
    </main>
</body>
</html>