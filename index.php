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

.btn-default {
  background-color: #337ab7;
  border-color: #1e0a2f;
  color: #0f1882;
  font-size: 26px;
  font-weight: bold;
  margin-right: 300px;
}

.col-md-6 {
  margin-top: 5%;
}

.firstgrid {
  padding: 1px;
}

h1 {
  font-weight: bold;
  font-family: 'Play';
  color: white;
  margin-top: 8%;
  margin-bottom: 8%;
}

.secondgrid {
  height: 800px;
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
    <a href=""><button type="button" class="btn btn-default">Home</button></a>
    <a href="index_files/search.php"><button type="button" class="btn btn-default">Search</button></a>
</div>

<!-- Main body -->
<div class="main">
  <!-- First Grid -->
  <div class="firstgrid col-md-6"> 
    <div class="col-md-6">
      <h1 style=color:#ffbd02;>ATTACKERS</h1>
      <?php 
        $password = 'Boros1105';
        $con = mysqli_connect('localhost','root',$password,'housefiredb');
        if (!$con) {
          die('Could not connect: ' . mysqli_error($con));
        }

        $sql="SELECT * FROM bio WHERE role = 'Attacker'";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_array($result)) {
          echo "<div class=\"col-md-4\">";
          echo "<a href=\"bio.php?q=".$row['name']."\"><img onMouseOver=\"changePicture(this.id)\" id=\"".$row['name']."\" class=\"ic-img\" src=\"".$row['icon']."\"></a>";
          echo "</div>";
        }
      ?>
    </div>
      <div class="col-md-6">
        <h1>DEFENDERS</h1>
        <?php 
          $sql="SELECT * FROM bio WHERE role = 'Defender'";
          $result = mysqli_query($con,$sql);
          while ($row = mysqli_fetch_array($result)) {
            echo "<div class=\"col-md-4\">";
            echo "<a href=\"bio.php?q=".$row['name']."\"><img onMouseOver=\"changePicture(this.id)\"  id=\"".$row['name']."\" class=\"ic-img\" src=\"".$row['icon']."\">";
            echo "</div>";
          } 
        ?>
      </div>
    </div>
  </div>
  </div>
      <!-- Second Grid -->
  <div class="secondgrid col-md-6" id="secondgrid">
    <img class="op-img" id="op-img" src="" width="100">
  </div>

</div>

  <script>
  function changePicture(opName){
    var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("op-img").src = this.responseText;
        }
      }
      xhttp.open("GET", "fetch_pic.php?q="+opName, true);
      xhttp.send();
  }
</script>
</body></html>