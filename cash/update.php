<?php
require("../database.php");


$query=$conn->prepare("UPDATE cash SET cid=?, detail=?,amount=?,createDate=? WHERE sid=?");
$category_id=$_POST['category'];
$description=$_POST['description'];
$amount=$_POST['amount'];
$date=$_POST['date'];
$sid=$_GET['id'];
echo $category_id." ".$description." ".$amount." ".$date." ".$sid;
$query->bind_param("isisi",$category_id,$description,$amount,$date,$sid);
$query->execute();
$query->close();
header("location:/?date=$date");
exit;