<!DOCTYPE html>
<html>
<head>
    <style>
    </style>
</head>
<body>


<?php
    $values = (explode("_", $_GET["values"]));
    echo "Hello, " .$_GET["name"];
    echo "<ul>";
    foreach($values as $current) {
        echo "<li>$current</li>";
    }
    echo "</ul>";
?> 

</body>
</html>