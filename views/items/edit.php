<?php
include_once "../components/head.php";
include "../../Controllers/ItemController.php";
include "../../Controllers/CategoryController.php";

$categories = CategoryController::getAll();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    ItemController::update($_POST['id']);
    header("Location: ./index.php" . (isset($_GET['category_id']) ? "?category_id=" . $_GET['category_id'] : ""));
}

if (!isset($_GET['id'])) {
    header("Location: ./index.php" . (isset($_GET['category_id']) ? "?category_id=" . $_GET['category_id'] : ""));
}

$item = ItemController::find($_GET['id']);

include_once "../components/messages.php";
?>



    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 mt-2">
                <h2><?=$item->title?></h2>
            </div>
            <div class="col-4"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 mt-3">
                <form action='./edit.php<?=isset($_GET['category_id']) ?"?category_id=". $_GET['category_id'] : ""?>' method="POST">
                    <div class="form-group">
                        <label for="itemName">Prekės pavadinimas</label>
                        <input type="text" class="form-control" id="itemName" name="name" placeholder="Pavadinimas" value="<?=$item->title; ?>">
                    </div>

                    <div class="form-group">
                        <label for="price">Kaina</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Kaina" value="<?=$item->price; ?>">
                    </div>

                    <div class="form-group">
                        <label for="description">Aprašymas</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Aprašymas"><?=$item->description; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="photo">Nuotraukos nuoroda</label>
                        <textarea class="form-control" id="photo" name="photo" placeholder="Nuotraukos nuoroda"><?=$item->photo; ?></textarea>
                    </div>

                    <input type="hidden" name="id" value="<?=$item->id?>">
                    <button type='submit' class='btn btn-sm confirm'>Pateikti</button>
                    <a class='btn btn-danger btn-sm' href='./index.php<?=isset($_GET['category_id']) ?"?category_id=". $_GET['category_id'] : ""?>' role="button">Atšaukti</a>
        </form>
        </div>
            <div class="col-3"></div>
        </div>
    </div>
<?php include_once "../components/footer.php";?>