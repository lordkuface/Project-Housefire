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

    .col-md-10 {
      margin-top: 5%;
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
    
    .secondgrid {
      height: 800px;
    }

    #form {
      font-size: 60;
      font-family: fantasy;
      color: darkblue;
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
        <div class="col-md-12" id="form">
            Select Operator...<br>
            <select onchange="opLoadout(this.value)">
              <option value="null"></option>
              <?php 
                $password = '';
                $con = mysqli_connect('localhost','root',$password,'housefiredb');
                if (!$con) {
                  die('Could not connect: ' . mysqli_error($con));
                }
                $sql = "SELECT name FROM bio";
                $result = mysqli_query($con,$sql);

                while ($row = mysqli_fetch_array($result)) {
                  echo "<option value=".$row['name'].">".$row['name']."</option>";
                } 
              ?>
            </select>
        </div>
      </div>
    </div>
  </body>
  <script>
  function opLoadout(val){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("form").innerHTML = this.responseText;
      }
    }
    xhttp.open("GET", "choice.php?value="+val, true);
    xhttp.send();
  }
  </script>
</html>
