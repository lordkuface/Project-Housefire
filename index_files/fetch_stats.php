<html>
  <head>
    <title>Project HouseFire</title>
  
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
    <style type="text/css">
    body {
      text-align: center;
      background: url("../test.jpg");
    }

    a {
      text-decoration: none;
    }

    .firstgrid {
      padding: 5px;
    }

    h1 {
      font-weight: normal;
      font-family: 'Bungee', cursive;
      color: white;
      margin-top: 8%;
      margin-bottom: 8%;
    }

    .btn-default {
      background-color: #337ab7;
      border-color: #1e0a2f;
      color: #0f1882;
      font-size: 26px;
      font-weight: bold;
      margin-right: 300px;
    }

    select {
      color: darkcyan;
      font-size: 28;
      font-family: sans-serif;
      border-bottom-style: initial;
      background: khaki;
    }

    #disp_stats {
      font-size: 66px;
      font-family: fantasy;
      color: darkred;
      margin: 70px;
    }
  </style>
  </head>
  
  <body>

    <!-- Navbar -->
    <div class="top">
        <a href="../index.php"><button type="button" class="btn btn-default">Home</button></a>
        <a href="../index_files/search.php"><button type="button" class="btn btn-default">Search</button></a>
    </div>

    <!-- Main body -->
    <div class="main">
      <!-- First Grid -->
      <div class="firstgrid col-md-10"> 
        <div class="col-md-12" id="disp_stats">
            <?php
               $con = mysqli_connect('localhost','root','Boros1105','housefiredb');
               if (!$con) {
                die('Could not connect: ' . mysqli_error($con));
               }

               $sql = "SELECT db_name FROM bio WHERE name = '".$_GET['opname']."'";
               $result = mysqli_query($con,$sql);

               $row = mysqli_fetch_array($result);

               $sql = "SELECT * FROM loadout WHERE operator = '".$row['db_name']."'";
               $result = mysqli_query($con,$sql);

               $row = mysqli_fetch_array($result);
               
               echo "Win/Loss Ratio: ".number_format((float)$row['nbwins']/$row['nbpicks'], 2, '.', '')."<br>Kill/Death Ratio: ".number_format((float)$row['nbkills']/$row['nbdeaths'], 2, '.', '')."<br>Rounds Won: ".$row['nbwins']."<br>Rounds Picked: ".$row['nbpicks']."<br>Kills: ".$row['nbkills']."<br>Deaths: ".$row['nbdeaths'];
            ?>
</html>