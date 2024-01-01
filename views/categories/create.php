<?php

include_once "../components/head.php";

include "../../Controllers/CategoryController.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // include_once "../../Controllers/CategoryController.php";
    if (CategoryController::store()){
        $_SESSION['success'] = "Kategorija sėkmingai sukurta!";
        header("Location: ./index.php");
    die;
    }
}



?>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 mt-2">
                <h2>NAUJA KATEGORIJA</h2>
            </div>
            <div class="col-4"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 mt-3">
                <form action="./create.php" method="POST">
                    <div class="form-group">
                        <label for="categoryName">Kategorijos pavadinimas</label>
                        <input type="text" class="form-control" id="categoryName" name="name" placeholder="Pavadinimas" value="<?=(isset($_POST['name'])) ? $_POST['name'] : "" ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Aprašymas</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Aprašymas" rows="3" value="<?=(isset($_POST['description'])) ? $_POST['description'] : "" ?>"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categoryPhoto">Kategorijos nuotrauka</label>
                        <input type="text" class="form-control" id="photo" name="photo" placeholder="Nuotraukos nuoroda" value="<?=(isset($_POST['photo'])) ? $_POST['photo'] : "" ?>">
                    </div>
                    <button type='submit' class='btn btn-sm confirm'>Pateikti</button>
                    <a class='btn btn-danger btn-sm' href='./index.php' role="button">Atšaukti</a>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

<?php include_once "../components/footer.php";?>