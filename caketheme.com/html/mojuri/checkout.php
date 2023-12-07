<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost"; // Replace with your server name
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $dbname = "cartlist"; // Replace with your database name

    // Create connection
    $conn = new mysqli('localhost', 'root', '', 'cartlist');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $firstname = $_POST['name'];
    $lastname = $_POST['lname'];
    $companyname = $_POST['billing_company'];
    $country = $_POST['country'];
    $streetaddress = $_POST['billing_address_1'];
    $apartment = $_POST['billing_address_2'];
    $city = $_POST['billing_city'];
    $state = $_POST['billing_state'];
    $postcode = $_POST['billing_postcode'];
    $phone = $_POST['billing_phone'];
    $email = $_POST['billing_email'];
    // You can retrieve other form fields similarly

    // Insert the form data into MySQL table
    $sql = "INSERT INTO your_table_name (firstname, lastname, companyname, country, streetaddress, apartment, city, state, postcode, phone, email)
    VALUES ('$firstname', '$lastname', '$companyname', '$country', '$streetaddress', '$apartment', '$city', '$state', '$postcode', '$phone', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
