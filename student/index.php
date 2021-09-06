<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

  <h2>Student Data</h2>
  <table class="table table-striped" >
    <!-- HEADER -->
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>TP Number</th>
      <th>                </th>
    </tr>
  <!-- ISI -->
  <?php
    require "../config/config.php";

    $retrieve = $mysqli->prepare("SELECT id,name,tpnumber FROM students");
    $retrieve->execute();
    $retrieve->store_result();
    $retrieve->bind_result($id,$name,$tpnumber);
    if($retrieve->num_rows>0){
      while($row=$retrieve->fetch()){
    

  ?>
    <tr>
      <td><?php echo $id; ?></td>
      <td><?php echo $name; ?></td>
      <td><?php echo 'TP'.$tpnumber;?></td>
      <td>
          <a href="../controller/remove.php?id=<?php echo $id;?>"> <button  class="col-sm-6 btn btn-danger"  >  Remove  </button></a>
          <a  href="edit/?id=<?php echo $id;?>"> <button  class="col-sm-6 btn btn-info"  >  Edit  </button></a>
      </td>
    </tr>
  <?php }} else{
      echo "<h4>EMPTY</h4>";
    }
    ?>
  </table>

  <div class="text-right col-sm-12">
    <a href="input/index.php"> <button class="btn btn-warning">  Add new student  </button></a>
  </div>

  <?php
    if(isset($_GET['message'])){
      if($_GET['message']=="deleted"){
        echo "<h4> KEHAPUS BRO </h4>";
      } else{
        echo "<h4>FAIL COK CUPUU</h4>";
      }
    }
  ?>

</div>

</body>
</html>
