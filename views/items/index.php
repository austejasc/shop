<?php

include "../../Controllers/ItemController.php";
include "../../Controllers/CategoryController.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    ItemController::destroy($_POST['id']);
    header("Location: ./index.php");
}

if (isset($_GET['category_id'])) {
    $items = ItemController::findByCategory($_GET['category_id']);
}else{
    $items = ItemController::getAll();

}

include_once "../components/head.php";
?>


    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <h1 style="margin-top:10px;margin-right:20px">PREKĖS</h1>
            </div>
            <div class="col-4"></div>
        </div>
        <div class="row">
            <div class="col-3">
                <a href="../categories/index.php" class="backToCategory">⇦Atgal į kategorijų sąrašą</a>
            </div>
            <div class="col-3">
                <a href="./create.php<?=isset($_GET['category_id']) ?"?category_id=". $_GET['category_id'] : ""?>" class="button">Pridėti naują prekę</a>
                </div>
            <div class="col-6"></div> 
        </div>
        <div class="row gx-20">
            <?php foreach ($items as $key => $item) { ?>
                <div class="col-3 inline-block mt-3 item">
                    <div class="row mb-3">
                        <div class="col-6 p-2">
                            <a href='./edit.php<?=isset($_GET['category_id']) ?"?category_id=". $_GET['category_id'] : ""?>' class="edit">Redaguoti</a>
                        </div>
                        <div class="col-6 p-2">
                            <a href='./delete.php?id=<?= $item->id?>' class="delete">✕ Ištrinti</a></div>
                        </div>
                    <div class="row">
                        <div class="col">
                            <img src="<?=$item->photo?>" style="max-width: 200px" class="itemPhoto">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="" style="text-transform: uppercase" class="aItemName"><h5><?= $item->title ?></h5></a>
                            <p><?= $item->description ?></p>
                        </div>
                    </div>
                        <div class="row">
                        <div class="col-4"><h5><?=$item->price?> €</h5></div>
                    </div>
                    </div>
                    
            <?php } ?>
            </div>
        </div>
    </div>

    <?php include_once "../components/footer.php"; ?>