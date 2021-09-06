<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Edit Student Data</h2>
  <div class="text-right">
    <a href="../">Home</a>
  </div>
  <?php 
    if(isset($_GET['id'])){

    require "../../config/config.php";
    $id = $_GET['id'];
    $retrieve = $mysqli->prepare("SELECT name,tpnumber from students where id=?");
    $retrieve->bind_param("s",$id);
    $retrieve->execute();
    $retrieve->store_result();
    $retrieve->bind_result($name,$tpnumber);
    if($retrieve->num_rows==1){
      while($row=$retrieve->fetch()){
    
  ?>

  <form method="POST" action="../../controller/edit.php">
    <div class="form-group">
      <label for="email">ID:</label>
      <input type="text" class="form-control" value=<?php echo $id;?> name="id" readonly>
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" value="<?php echo $name;?>" name="name">
    </div>
    <div class="checkbox">
    <input type="number" class="form-control" value=<?php echo $tpnumber;?> name="tpnumber">
    </div>
    <button type="submit" name="editbutton" value="submit" class="btn btn-default">Submit</button>
  </form>
  
  <?php }}} ?>
  <?php
    if(isset($_GET['message'])){
      if($_GET['message']=="success"){
        echo "<h4> SUKSES BRO </h4>";
      } else if ($_GET['message']=="specifydata"){
        echo "<h4> KOK KOSONG? </h4>";
      } else{
        echo "<h4>FAIL COK CUPUU</h4>";
      }
    }
  ?>
</div>

</body>
</html>

