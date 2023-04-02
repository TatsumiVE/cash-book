<?php
require("../database.php");
$query=$conn->prepare("UPDATE cash SET isactive= 0 WHERE sid=?");
$id=$_GET['id'];
echo $id;
$query->bind_param("i", $id);
$query->execute();
$query->close();
header("location:/");
exit();