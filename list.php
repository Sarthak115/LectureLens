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
  background-color: blue;
  color: white;
  padding: 15px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: blue;
}
    </style>
</head>
<body>

    <header><h1>Faculty rating</h1></header>
    <div style="position: absolute; top: 10px; left: 10px;" >
<font color="white"><a href="index.html">HOME</a></font>
    </div>
    <div class="container">
<?php
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

// Construct an SQL query to calculate the average rating for each faculty and order them by average rating in descending order
$sql = "SELECT faculty_name, Round(AVG(education_rating),2) AS average_rating FROM ratings GROUP BY faculty_name ORDER BY average_rating DESC";

// Execute the query
$result = mysqli_query($conn, $sql);

// Display the results in a table
//echo '<h2>Faculty Ratings </h2>';
if (mysqli_num_rows($result) > 0) {
    echo '<table border="1">';
    echo '<tr><th>Faculty Name</th><th>Average Education Rating</th></tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['faculty_name'] . '</td>';
        echo '<td>' . $row['average_rating'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<p>No ratings found in the database.</p>';
}

// Close the database connection
mysqli_close($conn);
?>
    </div>
</body>
</html>