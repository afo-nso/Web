<?php
include_once 'session.php';
require_once 'conection.php';


if(isset($_GET["id"])){
$id_usuario = $_GET["id"];
$sql = $pdo->prepare("SELECT * FROM usuarios Where id=$id_usuario");
$sql->execute();
$usuarios=$sql->fetch(PDO::FETCH_ASSOC);

$nome_user = $usuarios["nome"];
$login_user = $usuarios['_login'];
$status_user = $usuarios['_status'];
$senha_user = $usuarios['senha'];
$str_url="config.php?id=$id_usuario";
}else{
    $str_url='config.php';

}
?>
<link rel="stylesheet" type="text/css" href="estilo.css">
<script src="Scripts/script.js"></script>
<div id="container">
    <form
        name="form_cad"
        action="<?php echo $str_url?>"
        method="POST"
        id="form-cad">
        Nome:<input
            type="text"
            name="cad_nome"
            value="<?php echo isset($nome_user) ? $nome_user : ''?>"><br>
        Login:<input
            type="text"
            name="cad_login"
            value="<?php echo isset($login_user) ? $login_user :''?>"><br>
        Senha:<input
            type="password"
            name="cad_senha"
            value="<?php echo isset($senha_user) ? $senha_user:''?>"><br>
        <input
            type="password"
            name="confirma_senha"
            value="<?php echo isset($senha_user) ? $senha_user:''?>"
            placeholder="Confirmar Senha"
            id="confirma-senha">
        Status:<select name="status">
            <option>Ativo</option>
            <option>Inativo</option>
        </select>
        <input type="submit" value="Salvar" onclick="return validar_form_cad()">

        <?php if(!isset($_GET["id"])){echo '<a href="cadastro.php" id="limpar-cad">Limpar</a>';}?>

        <a href="home.php" id="retornar">Retornar</a>

    </form>
</div>