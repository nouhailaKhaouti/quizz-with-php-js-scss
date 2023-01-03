<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '.\quizz\classes\db.php');


class Question
{
  //les attributes d'une session
  private $id;
  private $label;

  public static function getQuestion()
  {
    $database = new Dbconnect();
    $bdd = $database->connect_pdo();
    $stmt = $bdd->query("SELECT * FROM question");
    return $stmt->fetchAll(PDO::FETCH_OBJ);
   
  }
}