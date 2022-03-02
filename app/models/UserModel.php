<?php

require "config/config.php";
require "app/database/Database.php";

Class UserModel {

    public function criarAdministrador(){

        $conexao = new Database(DB, USER, PASS);
        $conUser = $conexao->conectar();        

        $query = "INSERT INTO tb_usuarios (nome, usuario, senha) VALUES (?,?,?)";

        $stmt = $conUser->prepare($query);
        $stmt->execute(["USR", "usuario", password_hash("usuario", PASSWORD_DEFAULT)]);

    }

}