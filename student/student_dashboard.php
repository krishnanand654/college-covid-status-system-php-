<?php
    include '../dbconnection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCSS</title>
    <link rel = "icon" href = "../assets\images\coicon.png" type = "image/x-icon">
    <link rel="stylesheet" href="../assets/student_dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>


<?php
session_start();
if(isset($_SESSION["user"])){
$p =  $_SESSION["user"];
}else{
    echo "Unauthenticated user!";
}

        $sql = "SELECT  cvddetails.cvdstatus, cvddetails.cvddate, student.reg_num, student.name, student.no, student.email, student.dept, student.course, vacdetails.vacstatus, vacdetails.vacdate, vacdetails.dos from student INNER JOIN cvddetails ON cvddetails.id = student.id INNER JOIN vacdetails ON vacdetails.id = student.id where  student.reg_num = $p; ";
        $result = mysqli_query($conn, $sql);
        $row=mysqli_fetch_array($result);

?>

<body>
<div class="box">

    <div class="b1">

        <img src="https://images.pexels.com/photos/305816/pexels-photo-305816.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="img">
        <div class="overlay"></div>
            <div class="name">

                <p><i class="fas fa-user-circle user"></i><p>
                <h5>   <?php echo $row['name']; ?><h5> 
                <h1 class="subtitle"><?php echo $row['reg_num']; ?></h1> 
                <div class="button">  
                    <button class="btn btn-primary btn-sm btn" onclick="location.href='../index.php';">Logout <i class="fas fa-sign-out-alt"></i></button>
                    <button class="btn btn-primary btn-sm btn" onclick="location.href='#popup1';">Message <i class="fas fa-comment"></i></button>
                </div> 
                <div id="popup1" class="overlay1">
                <div class="popup">
                    <h2>Contact us</h2>
                    <a class="close1" href="#">&times;</a>
                    <div class="content">
                        <form  action="" method="POST">
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message" autocomplete="off"></textarea>
                            </div>
                        <div>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Send</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
                    
            </div>
    <div>
        <div class="flex">
            <div class="details">
                <li class="a"> Reg.No</li><p class="data"><?php echo $row['reg_num']; ?></p>
                <li class="a"> Number</li><p class="data"><?php echo $row['no']; ?></p>
                <li class="a"> Email</li><p class="data"><?php echo $row['email']; ?></p>
                <li class="a"> Department</li><p class="data"><?php echo $row['dept']; ?></p>
                <li class="a"> Course</li><p class="data"><?php echo $row['course']; ?></p>
            </div>

            <div class="details2">
                <li>Covid status</li><p class="data"><?php echo $row['cvdstatus']; ?></p>
                <li>Date</li><p class="data"><?php echo $row['cvddate']; ?></p>
                <li>Vaccine Status</li><p class="data"><?php echo $row['vacstatus']; ?></p>
                <li>Date</li><p class="data"><?php echo $row['vacdate']; ?></p>
                <li>No.of Dose</li><p class="data"><?php echo $row['dos']; ?></p>
            </div>
     </div>
    <div id="myDIV"><p class="footer">The given student information can only be updated by the Admin.<br>If any updation needed please message us.  <a onclick="myFunction()"><i class="fas fa-times close"></i></a></div></p>

<script>
    function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
  }
}
</script>

<?php
        if(isset($_POST['submit']))
                    {
                      $id='';
                      $name=$row['name'];
                      $no=$p;
                      $email = $row['email'];
                      $message=$_POST['message'];
                      $date = date('Y-m-d');
                      
                      if(empty($name) || empty($message) || empty($email)){
                        echo '<script>alert("fill all fields")
                        </script>';
                      }else{

                      $sql = "INSERT INTO `message` VALUES('$id','$no','$name','$message','$date', '$email')";
                      $result=mysqli_query($conn, $sql);
                      
                      if ($result) {
                        echo '<script>alert("Message sent");
                        window.location="student_dashboard.php";
                        </script>';
                      }else{
                        echo '<script>alert("Message not send")
                        </script>';
                      }
                    
                    }
                  
                  }
            ?>



</div>
</div>

</body>
</html>