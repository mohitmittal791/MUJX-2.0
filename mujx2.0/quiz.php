<?php
include 'db.php';

$pdo = new PDO($dsn, $username, $password);

$question = getQuestionFromDatabase($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Page</title>
  <link rel="stylesheet" href="/mujx2.0/css/quiz.css">
</head>
<body>
  <img src="Untitled_design-removebg-preview.png" alt="">
  <div class="container">
    <h1>Quiz Time!</h1>
    <div class="question-container">
      <p id="question"><?php echo $question['question']; ?></p>
      <ul id="options">
        <li><input type="radio" id="option1" name="option">
          <label for="option1" id="option1-label"><?php echo $question['option1']; ?></label>
        </li>
        <li><input type="radio" id="option2" name="option">
          <label for="option2" id="option2-label"><?php echo $question['option2']; ?></label>
        </li>
        <li><input type="radio" id="option3" name="option">
          <label for="option3" id="option3-label"><?php echo $question['option3']; ?></label>
        </li>
        <li><input type="radio" id="option4" name="option">
          <label for="option4" id="option4-label"><?php echo $question['option4']; ?></label>
        </li>
      </ul>
      <button id="submit-btn">Submit</button>
    </div>
    <p id="result"></p>
  </div>

  <script>
    // Submit the user's answer using AJAX
    document.getElementById('submit-btn').addEventListener('click', function() {
      var userAnswer = document.querySelector('input[name="option"]:checked').id;
      var questionId = '<?php echo $question['id']; ?>';
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'check_answer.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.send('question_id=' + questionId + '&user_answer=' + userAnswer);
      xhr.onload = function() {
        if (xhr.status === 200) {
          document.getElementById('result').innerHTML = xhr.responseText;
        }
      };
    });
  </script>
</body>
</html>