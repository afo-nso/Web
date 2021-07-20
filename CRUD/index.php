<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
<script src="Scripts/script.js"></script>
<script></script>
</head>
<body>
   <?php
        if(!isset($_SESSION['login'])){//verifica se usuário tem sessão ativa
            include('login.php');
        }else{
            include('home.php');
        }
   ?>
    
</body>
</html>




