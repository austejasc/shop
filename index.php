<?php

header("Location: ./views/categories/index.php");
die;

?> 



<!-- <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_11_23_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");


$sql = "SELECT * FROM categories;";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body, body *{
        font-family:"Times New Roman", Times, serif;
    }
</style>
<body>
    <?php
    while($row = $result->fetch_assoc()) {
        echo "<p>id: " . $row["id"]. "<br>" . "Pavadinimas: " . $row["name"]. " " . "<br>" . "Aprašymas: " . $row["description"]. "</p>";
    }

    $conn->close();

    ?>
</body>
</html>

