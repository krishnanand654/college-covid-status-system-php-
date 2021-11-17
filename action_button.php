  
            <?php
                if(isset($_GET['edit'])){?>
                <button type="submit" name="update" class="btn btn-primary button">update</button>
                <?php
                }else{?>
                  <button type="submit" name="submit"class="btn btn-primary button">Register</button>
                  <?php
                }
                ?>
         <?php
          
          if(isset($_POST['submit']))
          {
            $name=$_POST['name'];
            $number=$_POST['contact'];
            $reg_num=$_POST['reg_num'];
            $dept=$_POST['dept'];
            $course=$_POST['course'];
            $cvdstatus=$_POST['cvdstatus'];
            $cvddate=$_POST['cvddate'];
            $vacstatus=$_POST['vacstatus'];
            $vacdate=$_POST['vacdate'];
            $dos_no=$_POST['dos_no'];

            
            

            $sql = "INSERT INTO student VALUES('$id','$name','$number','$dept','$course','$reg_num')";
            $result=mysqli_query($conn, $sql);
            
          
            
            if($result){
              
              $ins = "INSERT INTO cvddetails VALUES((select MAX(id) from student),'$cvdstatus','$cvddate')";
              $result1 = mysqli_query($conn,$ins);

              if ($result1) {
                $msg="registered";
                echo '<script>alert("Registration Successfull")
                </script>';
              }
            }else{
              echo '<script>alert("Registration Unsuccessfull")
              </script>';
            }
            }
  ?>