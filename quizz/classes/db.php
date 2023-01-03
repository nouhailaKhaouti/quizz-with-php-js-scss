<?php 

session_start();
class Dbconnect{

    //properties 
    private $host = "localhost";
    private $db_name = "quizz";
    private $username = "root";
    private $password = "";
    private $conn;

    //methods
    function connect_pdo(){
        try{
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name, $this->username, $this->password);
            return $this->conn;

        }catch(PDOException $err){
            echo "Connection Error -->> ",$err->getMessage();
            echo "<br>Error Code -->> ",$err->getCode();
            echo "<br>Error occur in File -->> ",$err->getFile();
            echo "<br>Error occur on Line no -->> ",$err->getLine();

            $this->conn = null;
        }
    }
}

?>
