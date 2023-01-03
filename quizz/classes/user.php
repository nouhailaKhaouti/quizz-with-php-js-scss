<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '.\quizz\classes\db.php');


class User
{
  //les attributes d'une session
  private $id;
  private $userName;
  private $email;
  private $bestScore;


  public function __construct($userName, $email)
  {
    $this->userName = $userName;
    $this->email = $email;
  }


  public function createUser()
  {
    $database = new Dbconnect();
    $bdd = $database->connect_pdo();
    $stmt = $bdd->prepare("SELECT * FROM user WHERE email = :email ");
    $stmt->bindParam(':email', $this->email);
    $stmt->execute();
    $row = $stmt->fetch();
    if (!$row) {
      echo "create User";
      $req = $bdd->prepare("INSERT INTO user(userName,email,bestScore)VALUES(:userName,:email,'0')") or die(print_r($bdd->errorInfo()));
      $req->bindParam(':userName', $this->userName);
      $req->bindParam(':email', $this->email);
      $userI = $req->execute();
      if ($userI) {
        echo "done";
        $stmt = $bdd->query("SELECT LAST_INSERT_ID(id) from user order by LAST_INSERT_ID(id) desc limit 1;");
        $id = $stmt->fetchColumn();
        $_SESSION['id'] = $id;
        $result=self::getById($id);
        $_SESSION['bestScore']=$result->bestScore;
        header("Location: http://localhost/quizz/view/quizz.php");
        echo $_SESSION['id'];
        echo $_SESSION['bestScore'];
      } else {
        echo "error";
      }
    } else {
      $stmt = $bdd->prepare("SELECT * FROM user WHERE email = :email AND userName=:userName ");
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':userName', $this->userName);
      $stmt->execute();
      $query = $stmt->fetch();
      if (!$query) {
        $_SESSION['message'] = "email is already in use you need an other email to log in";
        header("location:http://localhost/quizz/view/index.php");
        echo "error";
      } else {
        $_SESSION['id'] = $query['id'];
        $result=self::getById($_SESSION['id']);
        $_SESSION['bestScore']=$result->bestScore;
        echo $_SESSION['id'];
        echo $_SESSION['bestScore'];
        var_dump( $result);
        header("Location: http://localhost/quizz/view/quizz.php");
      }
    }
  }
  public static function updateUser($id, $bestScore)
  {
    $database = new Dbconnect();
    $bdd = $database->connect_pdo();
    $req = $bdd->prepare("UPDATE user SET bestScore=:bestScore WHERE id=:ID") or die(print_r($bdd->errorInfo()));
    $req->bindParam(':bestScore', $bestScore);
    $req->bindParam(':ID', $id);
    $userU = $req->execute();
    return ($userU);
  }

  public static function getById($id)
  {
    $database = new Dbconnect();
    $db = $database->connect_pdo();
    $stmt = $db->query("SELECT * FROM user where id = '$id'");
    return $stmt->fetch(PDO::FETCH_OBJ);
  }
}
