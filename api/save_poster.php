<?php include_once "db.php";

if(isset($_POST['id'])){
    foreach($_POST['id'] as $key => $id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $Posters->del($id);
        }else{
            $poster=$Posters->find($id);
            $poster['name']=$_POST['name'][$key];
            $poster['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $poster['ani']=$_POST['ani'][$key];
            $Posters->save($poster);
        }
    }
}else{
    if(!empty($_FILES['img']['tmp_name'])){
        move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$_FILES['img']['name']);
    }
    $_POST['img']=$_FILES['img']['name'];
    $_POST['sh']=1;
    $_POST['rank']=$Posters->max('id')+1;
    $_POST['ani']=rand(1,3);
    $Posters->save($_POST);
}


to("../backend.php?do=poster");