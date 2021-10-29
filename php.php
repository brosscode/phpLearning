<!DOCTYPE html>
<html>
<head>
    <style>
    </style>
</head>
<body>

<form method="post">
    Name: <input type="text" name="name"><br>
    Second Box: <input type="text" name="email"><br>
    <input type="submit" name="submit"></input>
</form>

<?php



// comment

// global, cannot be accessed inside functions
// using static keyword will not delete the variable after the execution of the php

if(isset($_POST['submit'])) {
    echo "You Have Clicked Submit." ."<br>";
    sampleFunction();
}
else{
    echo "Hello, John Doe. I say this because I don't know your name!";
}

?> 

</body>
</html>