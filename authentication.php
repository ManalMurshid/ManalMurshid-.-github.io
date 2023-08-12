<?php   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

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

        // Retrieve form data
        $email = $_POST['email'];
        $psw = $_POST['psw'];

        //to prevent from mysqli injection  
        $username = stripcslashes($email);  
        $psw = stripcslashes($psw);  
        $username = mysqli_real_escape_string($conn, $username);  
        $psw = mysqli_real_escape_string($conn, $psw);  
      
        $sql = "select * from login where username = '$username' and password = '$psw'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<script>alert("Login successful")</script>";
        }  
        else{  
            echo "<script>alert("Login failed. Invalid username or password.")</script>";
        }    
    } 
?>