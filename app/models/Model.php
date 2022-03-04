<?php

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
            return $rows;
        }else{
            echo "Nenhum dado encontrado!";
            die();
        }

    }
    
    /*
        SELECT GENÉRICO 
    */
    public function delete($tabela, $campo, $id){

        try{
        $conexao = new Database(DB, USER, PASS);
        $conUser = $conexao->conectar();

        if($this->select($tabela, $campo, $id)){
            $comando = $conUser->prepare('DELETE FROM '. $tabela. ' WHERE ' . $campo . ' = ' . $id);         
       
            $comando->execute();

            echo "EXCLUIDO";

        }else {
            echo "NADA ENCONTRADO AQUI";
            die();
        }       

       }catch(PDOException $e) {
            echo "Erro: " . $e->getMessage();      
       }

    }
}