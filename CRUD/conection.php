<?php   //arquivo de conexão
$servidor = "localhost";
$dbname ="cadastro";
$usuario ="root";
$senha ="";

    try{
        $pdo = new PDO("mysql:host=".$servidor."; dbname=".$dbname, $usuario, $senha);
        } catch(PDOException $e){
            $msg = $e->getMessage();
        }
   
?>