<?php
include '..\classes\question.php'; 
include '..\classes\answer.php'; 
function showQuestion(){

$result =Question::getQuestion() ;
$data = array();
foreach($result as $row){
    $data[] = $row;
}

# =========== get options ========== #
$result = Answer::getAnswers();
$options = array();
foreach($result as $row){
    $options[] = $row;
}

# =========== insert options into questions ========== #
for($i=0; $i<sizeof($options); $i++){
    for($j=0; $j<sizeof($data); $j++){
        if($options[$i]->question_id == $data[$j]->id){
            $data[$j]->answers[] = $options[$i];
        }
    }
}

// print_r($data);
echo htmlentities(json_encode($data));
}

showQuestion();

