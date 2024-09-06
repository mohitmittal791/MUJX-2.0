<?php
$dsn = 'mysql:host=localhost;dbname=quiz_db';
$username = 'root';
$password = '';

try {
  $pdo = new PDO($dsn, $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

// Function to retrieve a question from the database
function getQuestionFromDatabase($pdo) {
  $sql = 'SELECT * FROM questions ORDER BY RAND() LIMIT 1';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  return $stmt->fetch();
}

// Function to check the user's answer
function checkUserAnswer($pdo, $questionId, $userAnswer) {
  $sql = 'SELECT correct_answer FROM questions WHERE id = :questionId';
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':questionId', $questionId);
  $stmt->execute();
  $correctAnswer = $stmt->fetchColumn();
  if ($userAnswer == $correctAnswer) {
    return "Correct!";
  } else {
    return "Incorrect. The correct answer is $correctAnswer.";
  }
}
?>