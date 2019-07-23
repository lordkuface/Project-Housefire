<html>
  <head>
    <title>Project HouseFire</title>

  <link rel="stylesheet" type="text/css" href="index_files/index.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
  <style type="text/css">
    body {
      text-align: center;
      background: url("test.jpg");
    }

    a {
      text-decoration: none;
    }

    .col-md-6 {
      margin-top: 5%;
    }

    .firstgrid {
      padding: 5px;
      margin-top: 20%;
    }

    .btn-default {
      background-color: #337ab7;
      border-color: #1e0a2f;
      color: #0f1882;
      font-size: 26px;
      font-weight: bold;
      margin-right: 300px;
    }

    .col-md-12 {
      font-family: 'Permanent Marker';
      font-size: 50px;
      color: yellow;
    }

    .secondgrid {
      height: 800px;
    }

    img {
      height: 550px;
    }

    .ic-img {
      width: 64px;
      height: 64px;
    }

    .op-img {
      width: 100%;
    }
  </style>
  </head>
  
  <body>

    <!-- Navbar -->
    <div class="top">
        <a href="index.php"><button type="button" class="btn btn-default">Home</button></a>
        <a href="index_files/search.php"><button type="button" class="btn btn-default">Search</button></a>
    </div>

    <!-- Main body -->
    <div class="main">
      <!-- First Grid -->
      <?php 
        $password = 'Boros1105';
        $con = mysqli_connect('localhost','root',$password,'housefiredb');
        if (!$con) {
          die('Could not connect: ' . mysqli_error($con));
        }
        $sql="SELECT * FROM bio WHERE name = '".$_GET['q']."'";
        $result = mysqli_query($con,$sql);      
        $row = mysqli_fetch_array($result);
      ?>
      <div class="firstgrid col-md-6"> 
        <div class="col-md-12">
            Name: <?php echo $row['name']?>
        </div>
        <div class="col-md-12">
            DOB: <?php echo $row['dob']?>
        </div>
        <div class="col-md-12">
            Height: <?php echo $row['height']?>
        </div>
        <div class="col-md-12">
            Weight: <?php echo $row['weight']?>
        </div>
      </div>
      <div class="secondgrid col-md-6" id="secondgrid">
        <img src=<?php 
          $sql = "SELECT picture FROM bio WHERE name ='".$row['name']."'";
          $result = mysqli_query($con,$sql);
          $row = mysqli_fetch_array($result);

          echo $row['picture']
        ?>>
      </div>
    </div>
  </body>
</html>