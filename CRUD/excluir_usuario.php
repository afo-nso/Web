<?php
include_once 'session.php';
require 'conection.php';

$id_usuario = $_GET["id"];//pega id do usuário passado por URL
$sql = $pdo->prepare("UPDATE  usuarios SET _status = 'Inativo' Where id=$id_usuario");
$sql->execute();
header("location:home.php");//Redireciona para a Home novamente

?>