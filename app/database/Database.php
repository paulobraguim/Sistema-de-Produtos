<?php

Class Database {
   
    public function __Construct($db, $user, $pass){

        $this->_db = $db;
        $this->_user = $user;
        $this->_pass = $pass;

        try {
            $conn = new PDO('mysql:host=localhost;dbname=' .$this->_db, $this->_user, $this->_pass);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              echo "CONNECTED IN DATABASE";
          } catch(PDOException $e) {
              echo 'ERROR: ' . $e->getMessage();
          }
    }

}