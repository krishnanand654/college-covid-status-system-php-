 <?php 
      include 'components/Sidebar.php';
?>

  
      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DCSS</title>
    <link rel = "stylesheet" href="assets/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<?php
        $sql = "SELECT * FROM student ORDER BY id ASC";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);

        $date =  date('d-m-Y');

        $sql2 = "SELECT * FROM cvddetails where cvdstatus = 'yes' and cvddate ='$date' ORDER BY id ASC";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_num_rows($result2);

        
        $sql3 = "SELECT * FROM vacdetails where vacstatus ='yes' ORDER BY id ASC";
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_num_rows($result3);

        $sql4 = "SELECT * FROM message";
        $result4 = mysqli_query($conn, $sql4);
        $row4 = mysqli_num_rows($result4);

        $sql5 = "SELECT * FROM message where `date` = '$date' ";
        $result5 = mysqli_query($conn, $sql5);
        $row5 = mysqli_num_rows($result5);

    ?>

    

<div class="main">


<div class="container">
  <div class="row">
    <div class="col col1">

        <h3>Hello, Admin <img src="https://img.icons8.com/fluency/50/000000/so-so.png"/></h3>
        <div class="stat">
                            <a href="manage_student.php"><h5>Registered<br><?php echo $row; ?></h5></a>
                            <a href="covid_status.php"><h5>Covid affected<br><?php echo $row2;?></h5></a>
                            <a href="vaccination_status.php"><h5>Vaccinated<br><?php echo $row3;?></h5></a>
                            <a href="messages.php"><h5>Messages<br><?php echo $row4;?></h5></a>
          </div>

      <div class="window">
        <div>
        <canvas id="myChart"></canvas>
        </div>
      </div>
     
    </div>


    <div class="col col2">
    <h1 class="time"> <?php echo date('d-m-Y'); ?></h1>
        <div class="notifi">
              <h3>Notification<i class="fas fa-bell"></i></h3> 
              <h3><div class="count"><?php echo $row5;?></div></h3>
        </div>
        <div class="frame-2">
            <table class="table"> 
                <?php

                if($row5 > 0){?>
                    <?php
                    while($res4 = mysqli_fetch_array($result5)):?>
                                <tr>
                                <th><?php echo  $res4['name']; ?></th>
                                <td><a href="messages.php">Added a message</a></td>
                                </tr>
                    <?php endwhile; ?>
                <?php 
                   }?>
                                
                    </table>  
        </div> 
  </div>

</div>

<script>
  // === include 'setup' then 'config' above ===
  const labels = [
  'students registered',
  'covid affected',
  'vaccinated'
];
const data = {
  labels: labels,
  datasets: [{
    label: 'Overview',
    data: [<?php echo $row?>, <?php echo $row2?>, <?php echo $row3;?>],
    backgroundColor: [
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};


  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
 



    
</body>
</html>