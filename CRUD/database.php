<?php

class Database{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "local";
    private $connect;

    public function __construct(){
        try{
            $this->connect = new PDO("mysql:host={$this->server};dbname={$this->dbname}",$this->username,$this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(Exception $e){
            echo"". $e->getMessage();
        }
    }

    public function getConnection(){
        return $this->connect;
    }
}

?>
