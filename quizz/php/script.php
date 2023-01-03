<?php
include '../classes/user.php'; 
include '../classes/question.php'; 
include '../classes/answer.php'; 


if(isset($_POST['login'])) logIn();

if(isset($_GET['id'])) update();

function logIn(){

    $email = $_POST['email'];
    $userName = $_POST['userName'];
    $user=new User($email,$userName);
    $user->createUser();

}

function update(){
    $id=$_GET['id'];
    $Score=$_GET['Score'];
    echo $id;
    echo $Score;
    $result=User::getById($id);
    if($result->bestScore<$Score){
        $user=User::updateUser($id,$Score);
        if($user){
            echo "done";
            header("Location: http://localhost/quizz/view/index.php");
            die();
        }else{
            header("Location: http://localhost/quizz/view/index.php");
        }
    }else{
        header("Location: http://localhost/quizz/view/index.php");
    }
}

