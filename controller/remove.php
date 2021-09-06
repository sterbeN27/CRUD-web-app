<?php
include "../config/config.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $delete=$mysqli->prepare("DELETE from students where id=?");
    $delete->bind_param('s',$id);
    $result=$delete->execute();
    if($result){
        header("location:../student/?message=deleted");
    }else{
        header("location:../student/?message=fail");
    }
}

?>