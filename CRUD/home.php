<?php
include_once 'session.php';
require_once 'conection.php';?>
<link rel="stylesheet" type="text/css" href="estilo.css">
<div id="home">
    <div id="pesquisa-div">
        <form action="home.php" method="POST" id="pesquisa">
            Nome:<input type="text" name="pesquisa_nome"><br>
            <div id="status-p">
                Status:<select name="pesquisa_status" id="status">
                    <option >Todos</option>
                    <option>Ativo</option>
                    <option>Inativo</option>
                </select>
            </div>
            <div id="botoes-p">
                <input type="submit" value="Buscar" id="buscar">
                <a href="home.php" id="limpar">Limpar</a>
                <a href="cadastro.php" id="novo">Novo</a>
            </div>
        </form>
    </div>
<?php
    if(isset($_POST['pesquisa_nome'])||isset($_POST['pesquisa_status']))//verificação para a pesquisa 
        {
            $nome =addslashes($_POST['pesquisa_nome']);
            $status=addslashes($_POST['pesquisa_status']);
            if (!empty($nome))//caso nome não esteja vazio pesquisa pelo status e pelo nome
            {
                switch ($status)
                {
                    case 'Ativo':
                        $sql = $pdo->prepare("SELECT * FROM usuarios where nome like '%$nome%' and _status='Ativo'");
                        break;
                    case 'Inativo':
                            $sql = $pdo->prepare("SELECT * FROM usuarios where nome like '%$nome%' and _status='Inativo'");
                            break;
                    case 'Todos':
                                $sql = $pdo->prepare("SELECT * FROM usuarios where nome like '%$nome%'");
                                break;
                }
            }
                else if (empty($nome)) { // se nome estiver vazio pesquisa apena pelo status
                    switch ($status)     
                    {
                    case 'Ativo':
                        $sql = $pdo->prepare("SELECT * FROM usuarios where  _status='$status'");
                        break;
                        case 'Inativo':
                            $sql = $pdo->prepare("SELECT * FROM usuarios where  _status='$status'");
                            break;
                    case 'Todos':
                                $sql = $pdo->prepare("SELECT * FROM usuarios");
                                break;
                    }
            
            }
        }
    if(!isset($_POST['pesquisa_nome'])){    
    $sql = $pdo->prepare("SELECT * FROM usuarios");//caso carrega todos os registros do DB por padrão
    }
    $sql->execute();
    $usuarios=$sql->fetchAll();?>

    <table id="table-home">
        <tr id="row">
            <th>Nome</th>
            <th>Login</th>
            <th>Status</th>
            <th colspan="2" id="acoes">Ações</th>
        </tr>

        <tr>
            <?php
    foreach ($usuarios as $key => $value) {?>
            <td><?php echo $value['nome'];?></td>
            <td><?php echo $value['_login'];?></td>
            <td><?php echo $value['_status'];?></td>
            <td>
                <a href="cadastro.php?id=<?php echo $value['id']?>" id="editar">Editar</a>
            </td>
            <td>
                <a
                    href="excluir_usuario.php?id=<?php echo $value['id']?>"
                    id="excluir"
                    onclick="return confirma_exclusao()">Excluir</a>
            </td>
        </tr>

        <?php
    }?>
    </table>
</div>
<script src="Scripts/script.js"></script>