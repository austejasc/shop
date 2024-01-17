<?php
include_once "../components/head.php";
include "../../Controllers/ItemController.php";
include  "../../Controllers/CategoryController.php";

$categories = CategoryController::getAll();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (ItemController::store()){
        $_SESSION['success'] = "Prekė sėkmingai pridėta!";
        header("Location: ./index.php".(isset($_GET['category_id']) ? "?category_id=". $_GET['category_id'] : ""));
    die;
    }
}

include_once "../components/messages.php";


?>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 mt-2">
                <h2>NAUJA PREKĖ</h2>
            </div>
            <div class="col-4"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 mt-3">
                <form action="./create.php<?=isset($_GET['category_id']) ?"?category_id=". $_GET['category_id'] : ""?>" method="POST">
                    <div class="form-group">
                        <label for="itemName">Prekės pavadinimas</label>
                        <input type="text" class="form-control" id="categoryName" name="title" placeholder="Pavadinimas" value="<?=(isset($_POST['title'])) ? $_POST['title'] : "" ?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Kaina</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Kaina" value="<?=(isset($_POST['price'])) ? $_POST['price'] : "" ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Aprašymas</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Aprašymas" value="<?=(isset($_POST['description'])) ? $_POST['description'] : "" ?>" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Nuotraukos nuoroda</label>
                        <textarea class="form-control" id="photo" name="photo" placeholder="Nuotraukos nuoroda" value="<?=(isset($_POST['photo'])) ? $_POST['photo'] : "" ?>" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Kategorija:</label>
                        <select class="form-select " id="category" name="categoryId" aria-label="Default select example">
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?= $category->id ?>"><?= $category->name ?> </option>
                                <?php } ?>
                            </select>
                        </div>

                    <button type='submit' class='btn btn-sm confirm'>Pateikti</button>
                    <a class='btn btn-danger btn-sm' href='./index.php<?=isset($_GET['category_id']) ?"?category_id=". $_GET['category_id'] : ""?>' role="button">Atšaukti</a>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    
<?php include_once "../components/footer.php";?>