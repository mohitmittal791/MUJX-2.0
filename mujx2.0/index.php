<<<<<<< HEAD
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
=======
<?php
// Database configuration
$servername = "localhost";
$username = "root";  // Default XAMPP MySQL username
$password = "";      // Default XAMPP MySQL password (blank by default)
$dbname = "register"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $school = $_POST['school'];
    $grade = $_POST['grade'];
    $parentsName = $_POST['parentsName'];
    $parentsPhone = $_POST['parentsPhone'];
    $disabilityType = $_POST['disabilityType'];
    $disabilityPercentage = $_POST['disabilityPercentage'];
    $disorderType = $_POST['disorderType'];
    $strength = $_POST['strength'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO registrations (name, email, phone, school, grade, parentsName, parentsPhone, disabilityType, disabilityPercentage, disorderType, strength) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $name, $email, $phone, $school, $grade, $parentsName, $parentsPhone, $disabilityType, $disabilityPercentage, $disorderType, $strength);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the quiz page
        header("Location: quiz.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
>>>>>>> aad3fde880a21f3aaf4e29635d4c3dfcb1ddfcb0
