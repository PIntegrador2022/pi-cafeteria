<?php

class Usuario{

    public function login($nome, $senha){
        global $pdo; //(php data object) é um módulo de suporte a banco de dados no php

        $sql = "SELECT * FROM usuarios WHERE nome = :nome AND senha = :senha";
        $sql = $pdo -> prepare($sql);
        $sql -> bindValue("nome", $nome);
        $sql -> bindValue("senha", md5($senha)); //a senha é criptografada em md5 no banco de dados
        $sql -> execute();                       //por isso precisa usar a função md5() aqui

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            //o banco de dados mysql pode ser acessado pelo localhost/phpmyadmin (teste feito usando XAMPP)
            //os admins são inseridos diretamente pelo B.D. no phpmyadmin manualmente
            //no readme está o passo a passo p/ adicionar o B.D.
            $_SESSION['idUser'] = $dado['idUsuario'];

            return true;
        } else{
            return false;
        }
    }

    public function logado($id){ //Pega nome do usuário na Database p/ mostrar na tela de admin
        global $pdo;

        $array = array();

        $sql = "SELECT nome FROM usuarios WHERE idUsuario = :idUsuario";
        $sql = $pdo -> prepare($sql);
        $sql -> bindValue("idUsuario", $id);
        $sql -> execute();

        if($sql -> rowCount() > 0){
            $array = $sql -> fetch();
        }

        return $array;
    }
}

?>