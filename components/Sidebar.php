<?php
    include './dbconnection.php';
    date_default_timezone_set("Asia/Kolkata");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DCSS</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="components/sidebar.css"/>
    <script src="assets/action.js"></script>
</head>
<body>
<div>
    <nav>
    
        <div class='Nav'>
                
                <ul class="list">
                    <p class="title">Menu</p>
                 
                    <li class="active"><a href="./dashboard.php"><i class="fas fa-columns"></i> Dashboard</a></li>
                    <li class="active"><a href="./register.php"><i class="fas fa-user-plus"></i>Student register</a></li>
                    <li class="active"><a href="./manage_student.php"><i class="fas fa-tasks"></i> Manage student</a></li>
                    <li class="active"><a href="./covid_status.php"><i class="fas fa-virus"></i> Covid Status</a></li>
                    <li class="active"><a href="./vaccination_status.php"><i class="fas fa-syringe"></i> Vaccination </a></li>
                    <li class="active"><a href="./messages.php"><i class="fas fa-comment"></i> Messages</a></li>
                </ul>
                <p class="logout" onclick ="logout()"><i class="fas fa-sign-out-alt"></i>Logout</p>
            </div>
        </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll('a');
        const menuLength = menuItem.length
        for(let i = 0; i <= menuLength; i++){
        if(menuItem[i].href === currentLocation){
            menuItem[i].className = "active"

      }
    }
     </script>
     
</body>
</html>