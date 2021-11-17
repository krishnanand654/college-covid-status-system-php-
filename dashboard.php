 <?php 
      include 'components/Sidebar.php';
    ?>

  
      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="assets/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<?php
        $sql = "SELECT * FROM student ORDER BY id ASC";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);

        $date = date('Y-m-d');

        $sql2 = "SELECT * FROM cvddetails where cvdstatus = 'yes' and cvddate ='$date' ORDER BY id ASC";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_num_rows($result2);

        
        $sql3 = "SELECT * FROM vacdetails where vacstatus ='yes' ORDER BY id ASC";
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_num_rows($result3);
    ?>

<div class="main">
<h3>Hello, Admin <img src="https://img.icons8.com/fluency/50/000000/so-so.png"/></h3>
<div class="stat">
                    <h5>Registered<br><?php echo $row; ?></h5>
                    <h5>Covid affected<br><?php echo $row2;?></h5>
                    <h5>Vaccinated<br><?php echo $row3;?></h5>
  </div>


<div class="window">
  <div>
  <canvas id="myChart"></canvas>
</div>
</div>
</div>
<script>
  // === include 'setup' then 'config' above ===
  const labels = [
  'students registered',
  'covid affected',
  'vaccinated',
  
];
const data = {
  labels: labels,
  datasets: [{
    label: 'Overview',
    data: [<?php echo $row?>, <?php echo $row2?>, <?php echo $row3;?>],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
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