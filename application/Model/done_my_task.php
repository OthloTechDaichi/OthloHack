<?php
$db = new SQLite3('../../db/daich.db');
$my_task_list_id = $_POST['id'];
$sql = "UPDATE my_task_list SET done = 1 where id =".$my_task_list_id;
$res = $db->query($sql);
$db->close();
?>