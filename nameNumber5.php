<!DOCTYPE html>
<html>
<head>
    <style>
    </style>
</head>
<body>

<?php
    if (isset($_POST["name"])){
    echo "Hello " .$_POST["name"];
    }
    else {
        echo "Hello, John Doe. I say this because I don't know your name!";
    }

?> 

</body>
</html>