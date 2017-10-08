<?php
    if(isset($_POST['addSubCategory'])) {
        $category_id=$_POST['categoryId'];
        $newItem=$_POST['newItem'];
        $db = new SQLite3('../../db/daich.db');
        $stmt = $db->prepare("INSERT INTO sub_category(category_id,name) VALUES (?,?)");
        $stmt->bindValue(1, $category_id, SQLITE3_INTEGER);
        $stmt->bindValue(2, $sub_category_id, SQLITE3_TEXT);
        $stmt->execute();
        echo $db->querySingle("SELECT max(id) FROM sub_category");
    }
?>
