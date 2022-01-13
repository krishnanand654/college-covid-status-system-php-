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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/login.css">
    <link rel = "icon" href = "assets\images\coicon.png" type = "image/x-icon">
</head>
<body>
    
    <div class="card">
        <div class="group">
        <form action="" method="POST">
            <h6><i class="fas fa-user-circle"></i></h6>
            <div class="title">Admin Login</div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" autocomplete="off" >
        </div>
            <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" autocomplete="off" name="password">
            </div>
        <div>
           <input type="submit" name="login" class="btn btn-primary btn-sm" value="login">
           <a href="index.php" class="btn btn-primary btn-sm button" >Back</a>
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
