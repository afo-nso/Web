<link rel="stylesheet" type="text/css" href="estilo.css">
<div id="container">
<?php
require_once 'conection.php';
if(isset($_GET["id"]))  //verifica se está recebendo id pela URL, se sim, direciona para a tela decadastro
{
    $id_usuario = $_GET["id"];
    $nome_user =addslashes($_POST['cad_nome']);
    $login_user=addslashes($_POST['cad_login']);
    $senha_user=addslashes($_POST['cad_senha']);
    $status_user=addslashes($_POST['status']);

    $sql = $pdo->prepare("SELECT id FROM usuarios WHERE _login= :e");
    $sql->bindValue(":e",$login_user);
    $sql->execute();
    if($sql->rowCount()> 0)
    {
        echo'Login já cadastrado ';
    }else
    {
        $sql = $pdo->prepare("UPDATE usuarios SET nome = '$nome_user', _login = '$login_user', _status= '$status_user', senha ='$senha_user' Where  id=$id_usuario");
        $sql->execute();
        echo'Alterado com sucesso. ';
    }  
}else
{
    if(isset($_POST['cad_nome']))
    {
        $nome =addslashes($_POST['cad_nome']);
        $login=addslashes($_POST['cad_login']);
        $senha=addslashes($_POST['cad_senha']);
        $status=addslashes($_POST['status']);
        
        if (!empty($nome) && !empty($login) &&!empty($senha) &&!empty($status) )
        {
            $sql = $pdo->prepare("SELECT id FROM usuarios WHERE _login= :e");
            $sql->bindValue(":e",$login);
            $sql->execute();
            if($sql->rowCount()> 0)
            {
                echo'Login já cadastrado ';
            }else{
                $sql= $pdo->prepare("INSERT INTO usuarios (nome, _login, senha,_status) VALUES (:n,:l,:s,:st)");
                $sql->bindValue(":n",$nome);
                $sql->bindValue(":l",$login);
                $sql->bindValue(":s",$senha);
                $sql->bindValue(":st",$status);
                $sql->execute();
                echo'Cadastrado com sucesso. ';
            }
        }
    }
    if(isset($_POST['login']))
    {
        $login =addslashes($_POST['login']);
        $senha=addslashes($_POST['senha']);
        if (!empty($login)  && !empty($senha) ) 
        {
            session_start();
            $sql = $pdo->prepare("SELECT id FROM usuarios WHERE _login =:l AND senha=:s AND _status='Ativo'");
            $sql->bindValue(":l",$login);
            $sql->bindValue(":s",$senha);
            $sql->execute();
            if($sql->rowCount()> 0)
            {
                $dado = $sql->fetch();
                session_start();
                $_SESSION['id'] = $dado['id'];
                $_SESSION['login'] = $login;
                $_SESSION['senha'] = $senha;
                header("location: home.php");
            }else 
            {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                echo'Login ou Senha inválidos ';
            }
        }
    }
}  
?>
<a id="voltar"href="home.php">Voltar</a></div>