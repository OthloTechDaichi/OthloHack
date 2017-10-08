<?php
include 'ChromePhp.php';
    $category_id = $_POST['category_id'];
    $sub_category_id = $_POST['sub_category_id'];
    date_default_timezone_set('Asia/Tokyo');
    $date = date("Y-m-d");
    $db = new SQLite3('../../db/daich.db');
    $stmt = $db->prepare("INSERT INTO my_task_list(category_id, sub_category_id,date_time,done) VALUES (?,?,?,'0')");
    $stmt->bindValue(1, $category_id, SQLITE3_INTEGER);
    $stmt->bindValue(2, $sub_category_id, SQLITE3_INTEGER);
    $stmt->bindValue(3, $date, SQLITE3_TEXT);
    $stmt->execute();
    //
    // $sql = "INSERT INTO my_task_list(category_id, sub_category_id,date_time,done) VALUES (1,2,'dfafda','0')";
    // $res = $db->query($sql);
?>
