<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the number of students from the form
    $registration = ($_POST["num_students"]);

    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cgu";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Die if connection was not successful
    if (!$conn) {
        die("Sorry we failed to connect: " . mysqli_connect_error());
    } else {
        echo "Connection was successful<br>";
    }

    // Query the database
    $sql = "SELECT * FROM student WHERE registration = $registration";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($num > 0) {
       
        echo '<script>alert("Welcome! You are logged in.");</script>';
        
            
        echo '<script>window.location.href = "filter.php";</script>';
   
        
        $_SESSION['name']=$row['name'];

    } else {
        // Display a JavaScript pop-up message and redirect
        echo '<script>alert("The entered registration number does not exist in the database."); window.location.href = "index.html";</script>';
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
