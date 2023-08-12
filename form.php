<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];

    // Database credentials
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'with_animation_db';

    // Create a connection to the database
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert form data into the "contact" table
    $sql = "INSERT INTO form (name, email,phoneNumber) VALUES ('$name', '$email', '$phoneNumber')";
    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
