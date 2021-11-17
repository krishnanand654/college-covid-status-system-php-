<?php
    include './dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/login.css">
</head>
<body>
    
    <div class="card">
        <div class="group">
        <form action="" method="POST">
            <div class="title">Admin Login</div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" autocomplete="off" placeholder="enter username *">
        </div>
            <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" autocomplete="off" name="password" placeholder="enter password *">
            </div>
        <div>
           <input type="submit" name="login" class="btn btn-primary" value="login">
        </div>
        </form>
        </div>
    </div>

   
    <?php

 
        if(isset($_POST['login'])){
           $x= $_POST['username'];
           $y= $_POST['password'];

                        if( empty($x) || empty($y) ){
                            echo '<script>alert("fill all fields")
                            </script>';
                        }else{
                            $sql ="select * from login where username= '$x' and password='$y' limit 1";
                            $result=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) == 1){
                                echo '<script>alert("login successfull")
                                </script>';
                                echo "<script>window.location = 'dashboard.php';</script>;";
                                exit();
                            }else{
                                echo '<script>alert("login failed incorrect username or password");
                                    </script>';
                                    exit();
                                 }
                        }
             }
            ?>
    
</body>
</html>
