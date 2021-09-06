<?php
include "../config/config.php";

if(isset($_POST['newbutton'])){
    $name = $_POST['name'];
    $tpnumber = $_POST['tpnumber'];
    //check data di Database
    $check = $mysqli->prepare("SELECT * FROM students where name=? or tpnumber=?");
    $check->bind_param("ss",$name,$tpnumber);
    $check->execute();
    $check->store_result();
    if($check->num_rows==1){
        header("location:../student/input/?message=duplicate");
    } else{
        $update = $mysqli->prepare("INSERT INTO students(name,tpnumber) values(?,?)");
        $update->bind_param("ss",$name,$tpnumber);
        $result = $update->execute();
        if($result){
            header("location: ../student/input/?message=success");
        } else{
            header("location: ../student/input/?message=sqlfail");
        }
    }
} else{
    header("location: ../student/input/?message=specifydata");
}

?>