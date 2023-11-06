<?php

error_reporting(0);
include('validaciones/connection.php');

// SESSION START
session_start();

// VALIDATION INPUTS
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(empty($_POST['username']) && empty($_POST['password'])) {
        echo 'Debes introducir tus datos.';
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // QUERY TO VERIFY THE EXISTENCE OF THE USER
        $sql = "SELECT * FROM user WHERE username=? AND password=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($stmt && mysqli_num_rows($result) > 0) {
            // GET USER DATA AND SET SESSION VARIABLES
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $row['id'];
            $_SESSION['id_card'] = $row['id_card'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['username'] = $username;
            $_SESSION['registration_date'] = $row['registration_date'];

            // REDIRECT THE USER TO ANOTHER PAGE
            header('location: profile.php');
            exit();
        } else {
            echo 'Error: Nombre de usuario o contraseña incorrectos.';
        }
    }
}
mysqli_close($conn);
?>