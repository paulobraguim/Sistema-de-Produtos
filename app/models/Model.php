<?php

require "config/config.php";
require "app/database/Database.php";

Class Model {
    
    /*
        SELECT GENÉRICO 
    */
    public function select($tabela, $campo = null, $valor = null){

        $conexao = new Database(DB, USER, PASS);
        $conUser = $conexao->conectar();

        if($campo != null and $valor != null){
            $comando = 'SELECT * FROM '. $tabela. ' WHERE ' . $campo . ' = ' . "'$valor'";                   
        }else {
            $comando = "SELECT * FROM $tabela";
        }

        $result = $conUser->query($comando);

        $rows = $result->fetchAll();
        
        if(count($rows) > 0){
            echo "<pre>";
            print_r($rows);
            echo "</pre>";
        }else{
            echo "Nenhum dado encontrado!";
        }

    }    
}