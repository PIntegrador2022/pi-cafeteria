<?php

if(isset($_POST['usuariologin']) && !empty($_POST['usuariologin']) && isset($_POST['senhalogin']) && !empty($_POST['senhalogin'])){

    require 'connect.php';
    require 'user.class.php';

    $u = new Usuario();
    
    $nome = addslashes($_POST['usuariologin']); //pega o nome e senha do formulário HTML
    $senha = addslashes($_POST['senhalogin']);

    if($u -> login($nome, $senha) == true){
        if(isset($_SESSION['idUser'])){
            header ("Location: ../admin/admin.php"); //se correto, vai p/ página de admin
        } else { header ("Location: ../login.php");} //Por segurança, retorna p/ página de login
    } else { header ("Location: ../login.php");}    //Por segurança, retorna p/ página de login

}else {
    header("Location: ../login.php"); //redireciona de volta p/ página de login
}


?>