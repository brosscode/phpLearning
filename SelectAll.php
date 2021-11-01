<?php

$servername = "localhost";
$password = file_get_contents("password.txt","r");
$username = "Admin2";
$dbname = "mydatabase";

// connection errors
// reprint form submission html

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  ini_set('display_errors', 0);
  http_response_code(500);
  include('my_500.php');
  die();
}

// add . '%' to enable the use of the LIKE feature, then edit the params as needed.

  // param was set in the query string
if(empty($_GET['name']))
{
    ini_set('display_errors', 0);
    echo '<form action="SelectAll.php" method="get">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    Zip: <input type="text" name="zip"><br>
    <input type="submit"></input>
  </form>';
     // query string had param set to nothing ie ?param=&param2=something
}
else {
$name = '%' . $_GET["name"] . '%';
$email = '%' . $_GET["email"] . '%'; 
$zip = '%' . $_GET['zip'] . '%';
  
// template
$sql = "SELECT * FROM users WHERE name LIKE ? AND email LIKE ? AND zip LIKE ?";
// create a prepared statement
$stmt = mysqli_stmt_init($conn);
// prepare the prepared statement
?>

<!DOCTYPE html>
<html>
<head>
    <style>
    </style>
</head>
<body>

<?php
if (!mysqli_stmt_prepare($stmt, $sql)) {
  echo "SQL statement failed" . "<br>";
  echo '<form action="SelectAll.php" method="get">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    Zip: <input type="text" name="zip"><br>
    <input type="submit"></input>
  </form>';
} else {
  // bind parameters to the placeholder: 
  // "s" refers to the number of strings and can be ints "i". Must match # of vars after it
  // Vars must be listed with comma seperators. 
  mysqli_stmt_bind_param($stmt, "sss", $name, $email, $zip);
  // run parameters inside database
  mysqli_stmt_execute($stmt);
  // take results
  $result = mysqli_stmt_get_result($stmt);
  // print results
  echo "<ul>";
  while($row = mysqli_fetch_assoc($result)) {
  echo "<li>" . "Name: " . $row["name"] . " | Email: " . $row["email"] . " | Zip: " . $row["zip"] . "</li>";
  }
  echo "</ul>";
  // close statment
  $stmt->close();
  // close connection
  $conn->close();
  echo '<form action="SelectAll.php" method="get">
  Name: <input type="text" name="name"><br>
  Email: <input type="text" name="email"><br>
  Zip: <input type="text" name="zip"><br>
  <input type="submit"></input>
</form>';
}
}
?> 

</body>
</html>