<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '.\quizz\classes\db.php');


class Answer
{
  //les attributes d'une session
  private $id;
  private $label;

  public static function getAnswers()
  {
    $database = new Dbconnect();
    $bdd = $database->connect_pdo();
    $stmt = $bdd->query("SELECT * FROM answer");
    return $stmt->fetchAll(PDO::FETCH_OBJ);
   
  }
}