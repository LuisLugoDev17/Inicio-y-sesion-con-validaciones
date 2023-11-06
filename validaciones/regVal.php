<?php

include('validaciones/connection.php');

// ERROR MESSAGES
$idCardErr = $nameErr = $lastNameErr = $birthdateErr = $genderErr = $usernameErr = $passwordErr = $password1Err = "";

// VALIDATIONS INPUTS
if($_SERVER["REQUEST_METHOD"] === "POST"){

    // ID VALIDATION
    if(empty($_POST['id_card'])){
        $idCardErr = '• Debes introducir tu cedula.';
    } else {
        $idCard = $_POST['id_card'];
        $idCard_validation = mysqli_query($conn, "SELECT * FROM user WHERE id_card = '$idCard'");

        if(mysqli_num_rows($idCard_validation) > 0){
            $idCardErr = '• Esta cedula ya esta registrada';
        }else {
            if(strlen($idCard) > 8 || strlen($idCard) < 7){
                $idCardErr = '• la cedula no debe tener mas de 8 digitos ni menos de 7';
            } else if(preg_match('/^[0-9]+$/', $idCard)) {
                $idCard = mysqli_real_escape_string($conn, $idCard);
            } else {
                $idCardErr = '• La cedula solo debe tener numeros'; 
            }
        }
    }

    // NAME VALIDATION
    if(empty($_POST['name'])){
        $nameErr = "• Tienes que ingresar tu nombre";
    } else {
        $name = $_POST['name'];
        if(preg_match('/^[a-zA-Z]+$/', $name)){
            $name = mysqli_real_escape_string($conn, $name);
        } else {
            $nameErr = '• El nombre no debe tener numeros ni espacios en blanco.';
        }
    }

    // LASTNAME VALIDATION
    if(empty($_POST['last_name'])){
        $lastNameErr = "• Tienes que ingresar tu apellido";
    } else {
        $lastName = $_POST['last_name'];
        if(preg_match('/^[a-zA-Z]+$/', $lastName)){
            $lastName = mysqli_real_escape_string($conn, $lastName);
        } else {
            $lastNameErr = '• el apellido no debe tener numeros ni espacios en blanco.';
        }
    }

    // USERNAME VALIDATION
    if (empty($_POST['username'])){
        $usernameErr = '• Debes ingresar tu usuario';
    }else{
        $username = $_POST['username'];
        $user = "SELECT COUNT(*) FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $user);

        if ($result) {
            $fila = mysqli_fetch_assoc($result);
                if ($fila['COUNT(*)'] > 0) {
                    $usernameErr = '• Este usuario ya existe.';
                }
        }
        if(strlen($_POST['username']) > 20){
            $usernameErr = '• Error: Debe tener menos de 20 caracteres';
        }else if (!$user) { 
            $usernameErr = '• Error: Este usuario ya existe';
        }else {
            $username = mysqli_real_escape_string($conn, $username);
        }
    }

    // PASSWORDS VALIDATION
    if (empty($_POST['password'])){
        $passwordErr = '• Error: Debes introducir la contraseña.';
    } else {
        $password = $_POST['password'];
        if(strlen($password) < 6){
            $passwordErr = '• Error: La contraseña tiene que tener mas de 7 caracteres';
        } else {
            $password = mysqli_real_escape_string($conn, $password);
        } 
    }

    if(empty($_POST['password1'])){
        $password1Err = '• La contraseña tiene que ser verificada';
    } else {
        $password1 = $_POST['password1'];
        if($password1 != $password){
            $password1Err = '• Las contraseñas tiene que coincidir';
        } else if($password1 === $password) {
            $password1 = mysqli_real_escape_string($conn, $password1);
        }
    }
    
    if(empty($idCardErr) && empty($nameErr) && empty($lastNameErr) && empty($genderErr) && empty($usernameErr) && empty($passwordErr) && empty($password1Err)){

        $sql = "INSERT INTO user (id_card, name, last_name, username, password) values ('$idCard','$name','$lastName','$username','$password')";

        $resulta = $conn -> query($sql);

        if($resulta){
            echo '
            <script>
                alert("Registrado exitosamente");
                window.location = "login.php"
            </script>';
            // header("location: index.php");
            exit();
        }else{
            echo "hubo un problema al registarte. Intentalo de nuevo" . mysqli_error ($conn);
        }
    }
}





?>