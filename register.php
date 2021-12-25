
  <?php 
  include 'components/Sidebar.php';
  error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/register.css">
    <script src="assets/action.js"></script>
</head>
<?php
          if(isset($_GET['edit'])){
            $ids=$_GET['edit'];
            
            $sql = "SELECT * FROM student WHERE id=$ids";
            $showdata=mysqli_query($conn,$sql);
            $arrdata = mysqli_fetch_array($showdata);

            $sql3 = "SELECT * FROM cvddetails WHERE id=$ids";
            $showdata1=mysqli_query($conn,$sql3);
            $arrdata1 = mysqli_fetch_array($showdata1);

            $sql4 = "SELECT * FROM vacdetails WHERE id=$ids";
            $showdata2=mysqli_query($conn,$sql4);
            $arrdata2 = mysqli_fetch_array($showdata2);
          }
?>
<body>

<div class="main">
<h2 class="title-std">Student Registration </h2>
<div class="container">
            <div class="row">
              <div class="col">
                
                <form  action="#" method="POST">
                <h5 >Student information</h5>
                  <div class="form-group">
                    <label>Enter Name <span style="color:red;">*</span> </label>
                    <input class="form-control" type="text" name="name" autocomplete="off"  value="<?php echo $arrdata['name']; ?>"  required/><br>
                  </div>
                

                <div class="form-group">
                    <label>Phone no<span style="color:red;">*</span></label>
                    <input class="form-control" type="number" name="contact" autocomplete="off" value="<?php echo $arrdata['no']; ?>" required/><br>
                  </div>

                  <div class="form-group">
                    <label>Email<span style="color:red;">*</span></label>
                    <input class="form-control" type="text" name="email" autocomplete="off" value="<?php echo $arrdata['email']; ?>" required/><br>
                  </div>
              
                  
                  <div class="form-group">
                    <label>Register.no<span style="color:red;">*</span></label>
                    <input class="form-control" type="number" name="reg_num" autocomplete="off" value="<?php echo $arrdata['reg_num']; ?>" required/><br>
                  </div>
                  
                
              
              <div class="form-group">
                  <label>Department<span style="color:red;">*</span></label>
                  <input class="form-control" type="text" name="dept" autocomplete="off" value="<?php echo $arrdata['dept']; ?>" required/><br>
                  </div>


                  <div class="form-group">
                    <label>Course<span style="color:red;">*</span></label>
                    <input class="form-control" type="text" name="course" autocomplete="off" value="<?php echo $arrdata['course']; ?>" required/><br>
                  </div>

                  <h5>Covid Details</span></h5>
                  
                <div class="form-group">
                <label >Have you ever got covid</label><br><input type="hidden" name ="cvdstatus" value="<?php echo $arrdata1['cvdstatus']; ?>"/>
                <br>
                
                      <input type="radio" name ="cvdstatus" value="Yes"  onclick = 'text(0)'>Yes</input>
                      <input type="radio"  name ="cvdstatus" value="No" onclick = 'text(1)'>No</input>
                  </div>

                  <span style="padding:8px;"></span>
                  <div class="form-group " id="mycode">
                  <label>If yes when<span style="color:red;">*</span> <span style="font-size:12px;"></label>
                     <input class="form-control" type="text" name="cvddate" autocomplete="off" value="<?php echo $arrdata1['cvddate']; ?>" placeholder="YYYY-MM-DD" /><br>
                  </div>

               
                  <h5 >Vaccination details</h5>
                  <div class="form-group">
                  <label>Have you got vaccinated<span style="color:red;">*</span></label><br><br>
                    <input type="hidden" name ="vacstatus" value="<?php echo $arrdata2['vacstatus']; ?>" ></input>
                    <input type="radio" name ="vacstatus" value="Yes"  onclick = 'text(2)' >Yes</input>
                    <input type="radio"  name ="vacstatus" value="No" onclick = 'text(3)'>No</input>
                </div>

                  <span style="padding:8px;"></span>
                  <div id="mycode1" >
                  <div class="form-group" >
                  <label>If yes when<span style="color:red;">*</span> </label>
                     <input class="form-control" type="text" name="vacdate" autocomplete="off" value="<?php echo $arrdata2['vacdate']; ?>" placeholder="YYYY-MM-DD" /><br>
                  </div>

                  <div class="form-group" >
                  <label>No.of Dose<span style="color:red;">*</span> </label>
                    <select name="dos_no" class="form-control">
                        <option value="<?php echo $arrdata2['dos']; ?>"><?php echo $arrdata2['dos'];?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                  </div>
        </div>
                  
                
                <?php
                if(isset($_GET['edit'])){?>
                <button type="submit" name="update" class="btn btn-primary button">update</button>
                <?php
                }else{?>
                  <button type="submit" name="submit"class="btn btn-primary button">Register</button>
                  <?php
                }
                ?>
              </div>
              <?php

              if(isset($_POST['update']))
              {
                $idupdate=$_GET['edit']; 
                $name=$_POST['name'];
                $number=$_POST['contact'];
                $reg_num=$_POST['reg_num'];
                $email=$_POST['email'];
                $dept=$_POST['dept'];
                $course=$_POST['course'];
                $cvdstatus=$_POST['cvdstatus'];
                $cvddate=$_POST['cvddate'];
                $vacstatus=$_POST['vacstatus'];
                $vacdate=$_POST['vacdate'];
                $dos_no=$_POST['dos_no'];

            
                $sql = "UPDATE student SET `name`='$name' , `no`='$number',`email`='$email', `dept`='$dept', `course`= '$course',`reg_num`='$reg_num' WHERE id= $idupdate";
                $result=mysqli_query($conn, $sql);
                

                if ($result == true ) {

               
                  if($cvddate == ''){
                    $cvddate ="Not affected";
                  }
                  if($vacdate == ''){
                    $vacdate ="Not taken";
                  }
                  
                  $sql4 = "UPDATE cvddetails SET `cvdstatus`='$cvdstatus' , `cvddate`='$cvddate' WHERE id= $idupdate";
                  $result3=mysqli_query($conn, $sql4);

                  $sql5 = "UPDATE vacdetails SET `vacstatus`='$vacstatus' , `vacdate`='$vacdate',`dos`=' $dos_no' WHERE id= $idupdate";
                  $result4=mysqli_query($conn, $sql5);
                  
                  if($result3 == true and $result4 == true){
                 
                  echo '<script>alert("data updated successfully")
                  </script>' ;
                  echo "<script>window.location = 'manage_student.php';</script>;";
                  }

                } else{
                  echo '<script>alert("data cannot updated")
                  </script>';
                  echo "<script>window.location = 'manage_student.php';</script>;";
                } 
                }
              

              ?>
              <?php
          
                    if(isset($_POST['submit']))
                    {
                      $name=$_POST['name'];
                      $number=$_POST['contact'];
                      $reg_num=$_POST['reg_num'];
                      $email=$_POST['email'];
                      $dept=$_POST['dept'];
                      $course=$_POST['course'];
                      $cvdstatus=$_POST['cvdstatus'];
                      $cvddate=$_POST['cvddate'];
                      $vacstatus=$_POST['vacstatus'];
                      $vacdate=$_POST['vacdate'];
                      $dos_no=$_POST['dos_no'];

                        
                      $query = "SELECT * FROM student WHERE reg_num = '$reg_num'";
                      $check = mysqli_query($conn, $query);
                      $checkrows = mysqli_num_rows($check);

                      if($checkrows>0){
                        echo '<script>alert("Student already exist");
                        </script>';
                      }else{

                      $sql = "INSERT INTO student VALUES('$id','$name','$number','$dept','$course','$reg_num','$email')";
                      $result=mysqli_query($conn, $sql);
                      
                
                      if($result){
                       
                        if($cvddate == ''){
                          $cvddate ="Not affected";
                        }
                        if($vacdate == ''){
                          $vacdate ="Not taken";
                        }

                        $ins = "INSERT INTO cvddetails VALUES((select MAX(id) from student),'$cvdstatus','$cvddate')";
                        $result1 = mysqli_query($conn,$ins);

                        $ins2 = "INSERT INTO vacdetails VALUES((select MAX(id) from student),'$vacstatus','$vacdate','$dos_no')";
                        $result2 = mysqli_query($conn,$ins2);

                            if ($result1 && $result2) { 
                              echo '<script>alert("Registration Successfull")
                              </script>';
                            }
                      }
                      else
                      {
                            echo '<script>alert("Registration Unsuccessfull")
                             </script>';
                          }
                         }
                        }
                  
            ?>
          
              </div>
              </form>
              </div>
            </div>
</body>
</html>