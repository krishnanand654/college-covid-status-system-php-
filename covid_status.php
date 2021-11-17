<?php 
include 'components/Sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="./assets/manage_student.css"/>
</head>
<body>


<div class="box">

<form action="" method="POST">
<div class="form-group">
<input class="form-control" type="text" name="id" autocomplete="off"  placeholder="Enter id / Register.no"/>
</div><br>
<div class="form-group">
<input type="submit" class="btn btn-primary" name="search" value="search"/>
<input type="submit" class="btn btn-secondary" name="back" value = "back"/>
</div>
</form>
<br>
<?php
if(isset($_POST['back'])){
  echo "<script>window.location = 'covid_status.php';</script>;"; 
}
?>

<div class="d-flex">  
<table class="table table-striped table-bordered table-hover " >
  <tr>
  <th scope="col">Id</th>
  <th scope="col">Register.no</th>
  <th scope="col">Status</th>
  <th scope="col">Date</th>
  <th scope="col">Action</th> 
  </tr>
</div>





<?php

if(isset($_POST['search'])){
    $x=$_POST['id'];
    $sql = "SELECT cvddetails.id, cvddetails.cvdstatus, cvddetails.cvddate, student.reg_num from student INNER JOIN cvddetails ON cvddetails.id = student.id where cvddetails.id= '$x' or student.reg_num = '$x'; ";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_num_rows($result);

}else{?>
<?php
$sql = "SELECT cvddetails.id, cvddetails.cvdstatus, cvddetails.cvddate, student.reg_num from student INNER JOIN cvddetails ON cvddetails.id = student.id; ";
$result = mysqli_query($conn, $sql);
$row = mysqli_num_rows($result);
}?>

<?php
if($row > 0){?>
<?php
while($res = mysqli_fetch_array($result)):?>
        <tr>
        <td><?php echo $res['id']; ?></td>
        <td><?php echo $res['reg_num']; ?></td>
        <td><?php echo $res['cvdstatus']; ?></td>
        <td><?php echo $res['cvddate']; ?></td>
        <td><a class="btn btn-success" href="cvd_register.php?edit=<?php echo$res['id']?>">Edit</a>
       
        </td>
        </tr>
    <?php endwhile; ?>
    <?php }else{
        echo "<tr><td colspan='9'>no records</td></tr>"; }?>
      </table>
   
    </div>
</div> 

</body>
</html>
