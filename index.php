<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCSS</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel = "icon" href = "assets\images\corona.png" type = "image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<div class="nav-Bar">
              <header id="header" class="header">
              <h2 class="logo">CCSS</h2>
              </header>
            </div>
    <div class="container">
        <div class="row">
       
          <div class="col-sm-7 ">
          
          <div class="content">
            <h1 class="heading">College Covid Status <span class="edit">System</span></h1>
            <p class="caption">Hi, Welcome to CCSS. <br>CCSS is a step forward to reduce the spread and take precausions agianst <span style="color:red;">COVID-19</span> in Colleges.
            The system will record the student details, their covid and vaccination details. This system will help to monitor the status of students to take better precausion from covid.
            Become a part of this big step.</p>

            <a  class= "bg-primary button" onclick="location.href='student/student_login.php';">Login <i class="fas fa-arrow-right arrow"></i></a>
          </div>

          
          </div>

          <div class="col">
            <div class="image_pos">
              <img class="image" src="assets\images\5797.jpg">
            </div>
          
          </div>
          <div class="section_head">
            <h1>Precautions must be taken </h1>
          </div>

          <div class="section">
            <h2>Wear a mask</h2>
            <div class="body">
              <p>Wear a mask in public, especially indoors or when physical distancing is not possible. </p>
              <p><img class="pre_img" src="assets\images\mask-icon.png"/></p>
            </div>
          </div>

          <div class="section">
            <h2>Clean your hands</h2>
            <div class="body">
              <p><img class="pre_img1" src="assets\images\hand.png"/></p>
              <p>Clean your hands often. Use soap and water, or an alcohol-based hand rub.</p>
          </div>
          </div>

          <div class="section">
            <h2>Maintain safe distance</h2>
            <div class="body">
              <p>Maintain a safe distance from others 	&#40;at least 1 metre&#41;, even if they don&#39;t appear to be sick.</p>
              <p><img class="pre_img" src="assets\images\image_processing.png"/></p>
            </div>
          </div>

          <div class="section">
            <h2>Get vaccinated</h2>
            <div class="body">
              <p><img class="pre_img1" src="assets\images\vaccine.png"/></p>
              <p>Get vaccinated when it&#39;s your turn. Follow local guidance about vaccination.</p>
            </div>
          </div>   
          <div class="footer"> 
            <p><a href="" onclick="topFunction()" class="up"><i class="fas fa-arrow-circle-up"></i></a></p>
          </div>   
        </div>
        
        </div>
        
<script>
        window.addEventListener('scroll', function () {
          let header = document.querySelector('.nav-Bar');
          let windowPosition = window.scrollY > 300;
          header.classList.toggle('scrolling-active',windowPosition);
        })

        mybutton = document.getElementById("myBtn");
        function topFunction() {
          document.body.scrollTop = 0; 
          document.documentElement.scrollTop = 0; 
        }
</script>

</body>
</html>