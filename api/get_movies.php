<?php include_once "db.php";

$id=$_GET['id'];

$today = date("Y-m-d");
$ondate = date("Y-m-d", strtotime("-2 days", strtotime($today)));
$movies = $Movie->all(['sh' => 1], " and ondate between '$ondate' and '$today' order by `rank`");

foreach($movies as $movie){
    $selected=($movie['id']==$id)?"selected":"";
    echo "<option {$selected} value='{$movie['id']}'>".$movie['name']."</option>";
}