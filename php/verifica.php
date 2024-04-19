<?php //verifica se está logado

require 'connect.php';

if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])) {

    require_once 'user.class.php';
    $u = new Usuario();

    $listalogado = $u -> logado($_SESSION['idUser']);
    
    $nomeUser = $listalogado['nome'];

} else { //senão, volta p/ página de login
    header("Location: ../login.php");
}


?>