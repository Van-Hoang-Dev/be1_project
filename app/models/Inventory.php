<?php
class Inventory extends Database
{
    //Lay tat ca hang ton kho
    public function getAllInventoryWithProductInfo()
    {
        $sql = parent::$connection->prepare("SELECT  products.name, inventory.*
        FROM `inventory`
        INNER JOIN products ON products.id = inventory.product_id;");

        return parent::select($sql);
    }

    //Lay 1 san pham theo id va theo date
    public function getInventoryByProductIdAndDate($product_id, $date_add)
    {
        $sql = parent::$connection->prepare("SELECT products.name, inventory.* FROM `inventory` INNER JOIN products ON products.id = inventory.product_id WHERE inventory.product_id = ? AND date_add = ?;");
        $sql->bind_param("is", $product_id, $date_add);
        return parent::select($sql)[0];
    }

    //Them hang ton kho
    public function addInventory($inventoryItem)
    {
        $sql = parent::$connection->prepare("INSERT INTO `inventory`(`product_id`, `date_add`,`input_quantity`) VALUES (?,?,?)");

        $sql->bind_param("isi", $inventoryItem["product_id"], $inventoryItem["date_add"], $inventoryItem["input_quantity"]);
        $sql->execute();

        $sql = parent::$connection->prepare("UPDATE products SET 
        products.current_quantity = current_quantity +
        (SELECT input_quantity
        FROM inventory WHERE inventory.product_id = products.id AND inventory.date_add = ?)
        WHERE products.id = ?;");
        $sql->bind_param("si", $inventoryItem["date_add"], $inventoryItem["product_id"]);
        return $sql->execute();
    }

    //Update so luong cua san pham trong kho
    public function updateInventory($inventoryItem, $updateDate)
    {
        $sql = parent::$connection->prepare("UPDATE `inventory` SET `date_add`=?,`input_quantity`=? WHERE product_id=? AND date_add= ?");
        $sql->bind_param("siis", $updateDate, $inventoryItem["input_quantity"], $inventoryItem["product_id"], $inventoryItem["date_add"]);
        $sql->execute();

        if (!empty($inventoryItem["quantityASC"])) {
            $sql = parent::$connection->prepare("UPDATE products SET 
            products.current_quantity = current_quantity + ?
            WHERE products.id = ?;");
            $sql->bind_param("ii", $inventoryItem["quantityASC"], $inventoryItem["product_id"]);

        } else if (!empty($inventoryItem["quantityDESC"])) {
            $sql = parent::$connection->prepare("UPDATE products SET 
            products.current_quantity = current_quantity - ?
            WHERE products.id = ?;");
            $sql->bind_param("ii", $inventoryItem["quantityDESC"], $inventoryItem["product_id"]);
        }
        return $sql->execute();
    }

    //Xoa san pham khi khong con kinh doanh
    public function deleteInventory($product_id, $date_add)
    {
        $sql = parent::$connection->prepare("DELETE FROM `inventory` WHERE product_id = ? AND date_add = ? ");
        $sql->bind_param("is", $product_id, $date_add);
        return $sql->execute();
    }
}
