<?php

class Itineraries{
    private $db;
    public function __construct(Database $database){
        $this->db = $database->getConnection();
    }

    public function getAll(){
        try{
            $sql = "SELECT * FROM itineraries";
            $itineraries = $this->db->prepare($sql);
            $itineraries->execute();
            return $itineraries->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo $e;
        }    
    }
}

?>