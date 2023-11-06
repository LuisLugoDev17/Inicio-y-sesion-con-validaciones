<?php

$conn = new mysqli ('localhost', 'root', '', 'system');

if($conn){
    ?><script>console.log('Conectado');</script><?php
}else{
    ?><script>console.log('No Conectado');</script><?php
}

?>