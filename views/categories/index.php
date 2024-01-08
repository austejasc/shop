<?php
include_once "../components/head.php";
include "../../Controllers/CategoryController.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    CategoryController::destroy($_POST['id']);
    header("Location: ./index.php");
}
$categories = CategoryController::getAll();

include_once "../components/messages.php";

?>





    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <h1 style="margin-top:10px;margin-right:20px">KATEGORIJOS</h1>
            </div>
            <div class="col-4"></div>
        </div>
        <div class="row">
            <div class="col-3">
                <a href="./create.php" class="button">Sukurti naują kategoriją</a>
                </div>
            <div class="col-9"></div> 
        </div>
        <div class="row gx-20">
            <?php foreach ($categories as $key => $category) { ?>
                <div class="col-3 inline-block mt-3 category">
                    <div class="row mb-3">
                        <div class="col-6 p-2">
                            <a href='./edit.php?id=<?= $category->id?>' class="edit">Redaguoti</a>
                        </div>
                        <div class="col-6 p-2">
                            <a href='./delete.php?id=<?= $category->id?>' class="delete">✕ Ištrinti</a></div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <a href="../items/index.php?category_id=<?= $category->id?>"><img src="<?php echo $category->photo?>" style="max-width: 200px" class="categoryPhoto"></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="../items/index.php?category_id=<?= $category->id?>" style="text-transform: uppercase" class="aCategoryName"><h5><?= $category->name ?></h5></a>
                                <p><?= $category->description ?></p>
                            </div>
                        </div>
                    </div>
            <?php } ?>
            </div>
        </div>
    </div>

    <?php include_once "../components/footer.php"; ?>
