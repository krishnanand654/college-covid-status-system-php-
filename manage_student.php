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
    <input class="form-control" type="text" name="id" autocomplete="off"  placeholder="enter id *"/>
   </div><br>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" name="search" value="search"/>
    <input type="submit" class="btn btn-secondary" name="back" value = "back"/>
</div>
   </form>
<br>
<?php
    if(isset($_POST['back'])){
      echo "<script>window.location = 'manage_student.php';</script>;"; 
    }
    ?>

  <div class="d-flex">  
    <table class="table table-striped table-bordered table-hover " >
      <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">contact.no</th>
      <th scope="col">Register.no</th>
      <th scope="col">Department</th>
      <th scope="col">Course</th>
      <th colspan="2" scope="col">Action</th> 
      </tr>
    </div>
  
    <?php
          if(isset($_GET['delete'])){
            $id=$_GET['delete'];
            $sql = "DELETE FROM cvddetails WHERE id = $id";
            $result=mysqli_query($conn, $sql);

            $sql1 = "DELETE FROM vacdetails WHERE id = $id";
            $result1=mysqli_query($conn, $sql1);

            if ( $result === true && $result1 == true){

              $sql2 = "DELETE FROM student WHERE id = $id";
              $result2 = mysqli_query($conn, $sql2);
              

              if($result1){
                echo '<script>alert("data deleted")
                </script>';
                echo "<script>window.location = 'manage_student.php';</script>;";
              }
            }else{
              echo '<script>alert("data not deleted")
              </script>';
              echo "<script>window.location = 'manage_student.php';</script>;";
          }
        }
    ?>
    


<?php

    if(isset($_POST['search'])){
        $x=$_POST['id'];
        $sql = "SELECT * FROM student where id = $x OR reg_num = $x ";
        $result = mysqli_query($conn, $sql);
        $row=mysqli_num_rows($result);
    
  }else{?>
  <?php
    $sql = "SELECT * FROM student ORDER BY id ASC";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    }?>

  <?php
  if($row > 0){?>
  <?php
   while($res = mysqli_fetch_array($result)):?>
            <tr>
            <td><?php echo $res['id']; ?></td>
            <td><?php echo $res['name']; ?></td>
            <td><?php echo $res['no']; ?></td>
            <td><?php echo $res['reg_num']; ?></td>
            <td><?php echo $res['dept']; ?> </td>
            <td><?php echo $res['course']; ?> </td>
            <td><a class="btn btn-success" href="register.php?edit=<?php echo$res['id']?>">Edit</a>
            <a class="btn btn-danger" href="manage_student.php?delete=<?php echo $res['id'];?>">Delete</a>
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
