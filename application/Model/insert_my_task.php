<?php
include 'ChromePhp.php';
    $category_id = $_POST['category_id'];
    $sub_category_id = $_POST['sub_category_id'];
    date_default_timezone_set('Asia/Tokyo');
    $db = new SQLite3('../db/daich.db');
    $date = date("Y-m-d"); //「2015-03-01」
    ChromePhp::log($date);   
    $stmt = $db->prepare("INSERT INTO my_task_list(category_id, sub_category_id,date_time,done) VALUES (?,?,?,'0')");
    $stmt->execute(array($category_id,$sub_category_id,$date));
?>
