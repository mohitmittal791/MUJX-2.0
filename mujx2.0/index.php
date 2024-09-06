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
        header("C:\xampp\htdocs\quiz.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
