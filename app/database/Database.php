<?php

Class Database {
   
    private $_conn;

    public function __Construct($db, $user, $pass){

        $this->_db = $db;
        $this->_user = $user;
        $this->_pass = $pass;

        try {
              $this->_conn = new PDO('mysql:host=localhost;dbname=' .$this->_db, $this->_user, $this->_pass);
              $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
              $this->_conn->exec('SET NAMES utf8');               
          } catch(PDOException $e) {
              echo 'ERROR: ' . $e->getMessage();
          }
    }

    public function conectar() {
        return $this->_conn;
    }

}