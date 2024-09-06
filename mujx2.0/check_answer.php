<?php
include 'db.php';

$pdo = new PDO($dsn, $username, $password);

$questionId = $_POST['question_id'];
$userAnswer = $_POST['user_answer'];

$result = checkUserAnswer($pdo, $questionId, $userAnswer);

echo $result;
?>