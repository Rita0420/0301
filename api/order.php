<?php include_once "db.php";

$_POST['tickets']=count($_POST['seats']);
$_POST['seats']=serialize($_POST['seats']);
$maxNo=$Orders->max('id')+1;
$_POST['no']=date("Ymd").sprintf("%04d",$maxNo);

$Orders->save($_POST);

echo $_POST['no'];
