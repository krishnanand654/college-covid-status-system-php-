
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
    <title>CCSS</title>
    <link rel = "icon" href = "assets\images\coicon.png" type = "image/x-icon">
    <link rel="stylesheet" href="assets/register.css">
    <script src="assets/action.js"></script>
</head>
<?php
          if(isset($_GET['edit'])){
            $ids=$_GET['edit'];
            $sql3 = "SELECT * FROM cvddetails WHERE id=$ids";
            $showdata1=mysqli_query($conn,$sql3);
            $arrdata1 = mysqli_fetch_array($showdata1);
          }
?>
<body>
<div class="main">
<div class="container">
            <div class="row">
            
              <div class="col">
                
              <form  action="#" method="POST">
                 
                  <h4 >Covid Details</span></h4>
                  
                      
                <div class="form-group">
                <label >Have you ever got covid</label><br><input type="hidden" name ="cvdstatus" value="<?php echo $arrdata1['cvdstatus']; ?>" ></input>
                <br>
                <input type="radio" name ="cvdstatus" value="Yes"  onclick = 'text(0)' >Yes</input>
                <input type="radio"  name ="cvdstatus" value="No" onclick = 'text(1)'>No</input>
                  </div>

                  <span style="padding:8px;"></span>
                  <div class="form-group " id="mycode">
                  <label>If yes when<span style="color:red;">*</span><I>&#40; last affected date &#41;</I>  </label>
                     <input class="form-control" type="date" name="cvddate" autocomplete="off" value="<?php echo $arrdata1['cvddate']; ?>" /><br>
                  </div>
                 
                  
                
                <?php
                if(isset($_GET['edit'])){?>
                <button type="submit" name="update" class="btn btn-primary button">update</button>
                <?php
                }?> 

                <?php
                if(isset($_POST['update']))
                     {
                        $idupdate=$_GET['edit']; 
                        $cvdstatus=$_POST['cvdstatus'];
                        $cvddate=$_POST['cvddate'];
                     
                        if($cvdstatus === 'No'){
                          $cvddate = "Not affected";
                        }
                    
                        $sql4 = "UPDATE cvddetails SET `cvdstatus`='$cvdstatus' , `cvddate`='$cvddate' WHERE id= $idupdate";
                        $result3=mysqli_query($conn, $sql4);
                        
                        if($result3 == true){
                        
                        echo '<script>alert("data updated successfully")
                        </script>' ;
                        echo "<script>window.location = 'covid_status.php';</script>;";
                        } else{
                        echo '<script>alert("data cannot updated")
                        </script>';
                        echo "<script>window.location = 'covid_register.php';</script>;";
                        } 
                }
              

              ?>

              </div>
             
           
              </div>
              </form>
              </div>
            </div>
</body>
</html>