<?php
session_start();
$name=$_SESSION['name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Filter</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            
            background-color: #007BFF;

            padding: 16px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.3);
            text-align: center;
        }
       
        h1 {
            text-align: center;
            padding: 20px 0;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
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
    <header>
    <h1>Enter the Details</h1></header><br>
    
    <div style="position: absolute; top: 10px; left: 10px;" >
<font color="white"><a href="index.html">HOME</a></font>
    </div>
    <form method="get" action="display.php">
        <label for="department">Department:</label>
        <select name="department" id="department">
            <option value="CSE">CSE</option>
            <option value="CIVIL">CIVIL</option>
            <!-- Add more department options as needed -->
        </select>
        <br>
        <label for="semester">Semester:</label>
        <select name="semester" id="semester">
            <option value="1">Semester 1</option>
            <option value="2">Semester 2</option>
            <option value="3">Semester 3</option>
            <option value="4">Semester 4</option>
            <option value="5">Semester 5</option>

            <!-- Add more semester options as needed -->
        </select>
        <br>
        <label for="group">Group:</label>
        <select name="group" id="group">
            <option value="1">Group 1</option>
            <option value="2">Group 2</option>
            <option value="3">Group 3</option>
            <option value="4">Group 4</option>
            <option value="5">Group 5</option>
            <!-- Add more group options as needed -->
        </select>
        <br>
        <input type="submit" value="Submit">
    </form>
    <div style="position: absolute; top: 10px; right: 10px;" > 
       

        <?php
        
         if (isset($name)) {    
             echo "Hello " . $name;
         }
         ?>
     
      </div> 
</body>
<!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        const resultsDiv = document.querySelector('#results');

        form.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent the form from submitting traditionally

            // Serialize the form data
            const formData = new FormData(form);

            // Send an AJAX POST request to display.php
            fetch('display.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.text())
            .then(data => {
                // Update the results div with the fetched data
                resultsDiv.innerHTML = data;
            });
        });
    });
</script> -->

</html>
