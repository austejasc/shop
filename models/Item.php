<?php

class Item {
    public $id;
    public $title;
    public $price;
    public $description;
    public $photo;
    public $categoryId;

    public function __construct($id = 0, $title = "", $price = 0, $description = "", $photo = "", $categoryId = 0) {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
        $this->photo = $photo;
        $this->categoryId = $categoryId;
    }
    
public static function all(){
    $items = [];
    $db = new mysqli("localhost", "root", "", "web_11_23_shop");
    $db->set_charset("utf8");
    $result = $db->query("SELECT * from items");
    while ($row = $result->fetch_assoc()) {
        $items[] = new Item($row['id'], $row['title'], $row['price'], $row['description'], $row['photo'], $row['category_id']);
    }
    $db->close();
    return $items;
}

public static function find($id)
    {
        $item = new Item();
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $db->set_charset("utf8");
        $sql = "SELECT * from items WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $item = new Item($row['id'], $row['title'], $row['price'], $row['description'], $row['photo'], $row['category_id']);
        }
        $db->close();

        return $item;
    }

public static function findByCategory($id)
{
    $items = [];
    $db = new mysqli("localhost", "root", "", "web_11_23_shop");
    $db->set_charset("utf8");
    $sql = "SELECT * from items where category_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $items[] = new Item($row['id'], $row['title'], $row['price'], $row['description'], $row['photo'], $row['category_id']);
    }
    $db->close();
    return $items;
}

    public function save()
    {
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $db->set_charset("utf8");
        $sql = "INSERT INTO `items`(`title`, `price`, `description`,`photo`, `category_id`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sdssi", $this->title, $this->price, $this->description, $this->photo, $this->categoryId);
        $stmt->execute();
        $db->close();
    }



    public function update()
    {
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $db->set_charset("utf8");
        $sql = "UPDATE `items` SET `title`= ?, `price` = ?, `description`= ?, `photo` = ?, `category_id` = ? WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sdssi", $this->title, $this->price, $this->description, $this->photo, $this->categoryId);
        $stmt->execute();
        $db->close();
    }

    public static function destroy($id)
    {
        $db = new mysqli("localhost", "root", "", "web_11_23_shop");
        $db->set_charset("utf8");
        $sql = "DELETE FROM `items` WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $db->close();
    }

}

?>