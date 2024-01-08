<?php 
include_once "../components/head.php";

include "../../Controllers/CategoryController.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    CategoryController::update($_POST['id']);
    header("Location: ./index.php");
}

if (!isset($_GET['id'])) {
    header("Location: ./index.php");
}

$category = CategoryController::find($_GET['id']);



?>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 mt-2">
                <h2><?=$category->name;?></h2>
            </div>
            <div class="col-4"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 mt-3">
                <form action="./edit.php" method="POST">
                    <div class="form-group">
                        <label for="categoryName">Kategorijos pavadinimas</label>
                        <input type="text" class="form-control" id="categoryName" name="name" placeholder="Pavadinimas" value="<?=$category->name?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Aprašymas</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Aprašymas" rows="3"><?=$category->description?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Kategorijos nuotrauka</label>
                        <textarea class="form-control" id="photo" name="photo" placeholder="Nuotraukos nuoroda" rows="3"><?=$category->photo?></textarea>
                    </div>
                    <input type="hidden" name="id" value="<?=$category->id?>">
                    <button type='submit' class='btn btn-sm confirm'>Pateikti</button>
            <a class='btn btn-danger btn-sm' href='./index.php' role="button">Atšaukti</a>
        </form>
        </div>
            <div class="col-3"></div>
        </div>
    </div>

<?php include_once "../components/footer.php";?>