<!DOCTYPE html>
<html>
<head>
    <style>
    </style>
</head>
<body>
<?php

$servername = "localhost";
$password = file_get_contents("password.txt","r");
$username = "Admin2";
$dbname = "mydatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// add . '%' to enable the use of the LIKE feature, then edit the params as needed.
$name = '%' . $_GET["name"] . '%';
$email = '%' . $_GET["email"] . '%';
$zip = '%' . $_GET['zip'] . '%';

// template
$sql = "SELECT * FROM users WHERE email LIKE ?";
// create a prepared statement
$stmt = mysqli_stmt_init($conn);
// prepare the prepared statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
  echo "SQL statement failed";
} else {
  // bind parameters to the placeholder: 
  // "s" refers to the number of strings and can be ints "i". Must match # of vars after it
  // Vars must be listed with comma seperators. 
  mysqli_stmt_bind_param($stmt, "s",$email);
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
}

?> 
</body>
</html>