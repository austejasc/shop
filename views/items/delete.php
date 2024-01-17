<?php
include "../../Controllers/ItemController.php";

if (isset($_GET["id"])) {
    ItemController::destroy($_GET['id']);
    header("Location: ./index.php".(isset($_GET['category_id']) ? "?category_id=". $_GET['category_id'] : ""));
    die;
}


?>

