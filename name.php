<!DOCTYPE html>
<html>
<head>
    <style>
    </style>
</head>
<body>

<?php
    if (isset($_GET["name"])){
    echo "Hello " .$_GET["name"];
    }
    else {
        echo "Hello, John Doe. I say this because I don't know your name!";
    }

?> 

</body>
</html>