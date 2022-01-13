
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
            $sql4 = "SELECT * FROM vacdetails WHERE id=$ids";
            $showdata2=mysqli_query($conn,$sql4);
            $arrdata2 = mysqli_fetch_array($showdata2);
          }
      
?>
<body>
<div class="main">
<div class="container">
            <div class="row">
            
              <div class="col">
                
              <form  action="#" method="POST">
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
                  <label>If yes when<span style="color:red;">*</span></label>
                     <input class="form-control" type="date" name="vacdate" autocomplete="off" value="<?php echo $arrdata2['vacdate']; ?>"  /><br>
                  </div>

                  <div class="form-group" >
                  <label>No.of Dose<span style="color:red;">*</span></label>
                    <select name="dos_no" class="form-control">
                        <option value="<?php echo $arrdata2['dos']; ?>" ><?php echo $arrdata2['dos']; ?></option>
                        <option value="1">1</option>
                        <option value="2" >2</option>
                    </select>
                  </div>
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
                        $vacstatus=$_POST['vacstatus'];
                        $vacdate=$_POST['vacdate'];
                        $dos_no=$_POST['dos_no'];
                        
                        if($vacstatus=='No'){
                            $vacdate="Not taken";
                            $dos_no=0;
                        }

                    
                        $sql5 = "UPDATE vacdetails SET `vacstatus`='$vacstatus' , `vacdate`='$vacdate', `dos`=' $dos_no' WHERE id= $idupdate";
                        $result4=mysqli_query($conn, $sql5);
                        
                        if($result4 == true){
                        
                        echo '<script>alert("data updated successfully")
                        </script>' ;
                        echo "<script>window.location = 'vaccination_status.php';</script>;";
                        } else{
                        echo '<script>alert("data cannot updated")
                        </script>';
                        echo "<script>window.location = 'vaccination_status.php';</script>;";
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