<?php

include "../../models/Item.php";

class ItemController
{
    public static function getAll()
    {
        $items = Item::all();
        return $items;
    }

    public static function find($id)
    {
        $item = Item::find($id);
        return $item;
    }

    public static function findByCategory($id)
    {
        $items = Item::findByCategory($id);
        return $items;
    }

    public static function destroy($id) {
        Item::destroy($id);
    }

    public static function store(){
        if (strlen($_POST['title']) == 0) {
            $errors[] = "Nėra pavadinimo!";
        }

        if (strlen($_POST['price']) == 0) {
            $errors[] = "Nėra kainos!";
        }
        
        if (strlen($_POST['description']) == 0) {
            $errors[] = "Nėra aprašymo!";
        }

        if (strlen($_POST['photo']) == 0) {
            $errors[] = "Nėra nuotraukos!";
        }
        
        if($errors){
            $_SESSION['alert'] = $errors;
            return false;
        }
        $item = new Item();
        $item->title = $_POST['title'];
        $item->price = $_POST['price'];
        $item->description = $_POST['description'];
        $item->photo = $_POST['photo'];
        $item->categoryId = $_POST['categoryId'];
        $item->save();
        return true;
    }

    public static function update($id)
    {
        
        $item = Item::find($id);
        $item->title = $_POST['title'];
        $item->description = $_POST['description'];
        $item->photo =  $_POST['photo'];
        $item->categoryId = $_POST['categoryId'];
        $item->update();
    }
}
