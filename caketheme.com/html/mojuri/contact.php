<?php
// Establish connection to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contactform";

// Create connection
$conn = new mysqli('localhost', 'root', '', 'contactform');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        // Retrieve values from the form
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Insert user data into the database
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            // You can redirect the user to a success page or perform other actions here
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
