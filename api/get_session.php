<?php include_once "db.php";

$id=$_GET['id'];
$date=$_GET['date'];

$movie=$Movie->find($id);

$start=0;
$hr=date("G");

if($date==date("Y-m-d") && $hr>13){
    $start=ceil(($hr-13)/2);
}

for($i=$start;$i<5;$i++){
    $remaining=20-$Orders->sum('tickets',['date'=>$date,'movie'=>$movie['name'],'session'=>$sessStr[$i]]);
    echo "<option value='{$sessStr[$i]}'>";
    echo $sessStr[$i];
    echo "剩餘座位";
    echo "$remaining 人";
    echo "</option>";
}