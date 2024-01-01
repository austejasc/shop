<?php
include "../../Controllers/CategoryController.php";

if (isset($_GET["id"])) {
    CategoryController::destroy($_GET['id']);
    header("Location: ./index.php");
}

?>