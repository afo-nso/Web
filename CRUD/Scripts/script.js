//Validação do formulario de cadastro
function validar_form_cad() {
    var cad_nome = form_cad.cad_nome.value;//recebe os parametros
    var cad_login = form_cad.cad_login.value;
    var cad_senha = form_cad.cad_senha.value;
    var confirma_senha = form_cad.confirma_senha.value;

    if (String(cad_nome).length == 0) {//nome em branco
        alert("Campo login é obrigatório.");
        form_cad
            .cad_nome
            .focus();
        return false;
    }
    if (String(cad_nome).length < 3) {//verifica se nome contem mais de 3 caracteres
       alert("Nome deve ter no mínimo 3 caracteres.");
        form_cad
            .cad_nome
            .focus();
        return false;
    }
    if (String(cad_nome).search(/[0-9]/) > -1) {//verifica se o nome contem numeros
        alert("O campo nome não pode conter números ou caracteres especiais. ");
         form_cad
             .cad_nome
             .focus();
         return false;
     }

    if (String(cad_login).length == 0) {//login em branco
        alert("Campo login é obrigatório.");
        form_cad
            .cad_login
            .focus();
        return false;
    }
    if (String(cad_login).length < 5 || String(cad_login).length > 10) {//login recebe entre 5 e 10 caracteres
        alert("Login deve ter entre 5 e 10 caracteres.");
        form_cad
            .cad_login
            .focus();
        return false;
    }

    if (String(cad_senha).length == 0) {//senha em branco
        alert("Campo Senha é obrigatório.");
        form_cad
            .cad_senha
            .focus();
        return false;
    }
    if (String(cad_senha).length < 5 || String(cad_senha).length > 10) {//senha entre 5 e 10 caracteres
        alert("Senha deve ter entre 5 e 10 caracteres.");
        form_cad
            .cad_senha
            .focus();
        return false;
    }
    if (cad_senha != confirma_senha) {//senhas iguais
        form_cad
            .confirma_senha
            .setCustomValidity("Senhas diferentes");
    } else {
        form_cad
            .confirma_senha
            .setCustomValidity("");
    }

}
        //Função de confirmação de exclusão de usuário
function confirma_exclusao() {
   if(confirm('Deseja mesmo excluir esse usuario')== true){
       return true;
   }else{
       return false;
   }
    
}