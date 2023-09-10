<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Faculty</title>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Light grey background */
            color: #333; /* Dark grey text color */
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007BFF;
            padding: 16px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff; /* White background */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            margin-bottom: 20px;
            color: #007BFF; /* Blue heading color */
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007BFF; /* Blue header background color */
            color: #fff;
        }

        /* Back button styles */
        .back-button {
            margin-top: 20px;
            text-align: center;
        }

        .back-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-button a:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        a:link, a:visited {
  background-color: white;
  color: Black;
  padding: 15px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: Lightblue;
}

    </style>
</head>
<body>
    <header><h1>Faculty List</h1></header>
    click on faculty name
    <div style="position: absolute; top: 10px; left: 10px;" >
<font color="white"><a href="index.html">HOME</a></font>
    </div>
    <div class="container">
        <?php
        session_start();
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            // Your existing PHP code here, including the query and table display
            // ...
            
   

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Get the selected department, semester, and group from the form
    $selectedDepartment = $_GET["department"];
    $selectedSemester = $_GET["semester"];
    $selectedGroup = $_GET["group"];
    $_SESSION["Department"]=$selectedDepartment;
    $_SESSION["Semester"]=$selectedSemester;
    $_SESSION["Group"]= $selectedGroup;
    
$sem=$_SESSION["Semester"];
$grp=$_SESSION["Group"];

    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cgu";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Construct a SQL query to retrieve faculty based on user input
    $sql = "SELECT * FROM faculty WHERE  semester='$sem' AND grp='$grp'";

    // Execute the query
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    // Display the results in a table
    //echo '<h2>Faculty List</h2>';
    if ($num > 0) {
        echo '<table border="1">';
        echo '<tr><th>Name</th><th>Department</th><th>Semester</th><th>Group</th><th>SUbject</th></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td><a href="rating1.php?name=' . urlencode($row['name']) . '">' . $row['name'] . '</a></td>';
            echo '<td>' . $row['department'] . '</td>';
            echo '<td>' . $row['semester'] . '</td>';
            echo '<td>' . $row['grp'] . '</td>';
            echo '<td>' . $row['subject'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<script>
        alert("No faculty members found matching the criteria");
        window.location.href = "filter.php"; // Redirect to filter.html
    </script>';
        

    }

    // Close the database connection
    mysqli_close($conn);
}
}
?>
       
        <div class="back-button">
            <a href="filter.php">Back to Filter</a>
        </div>
    </div>
</body>
</html>