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

  <script src="quiz.js"></script>
</body>
</html>