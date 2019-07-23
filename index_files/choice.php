<p style="color: dark blue">Select Your Loadout</p>
<form method="get" action="fetch_stats.php">
  
  <select name="primaryweapon">
    <?php
      $password = 'Boros1105';
      $con = mysqli_connect('localhost','root',$password,'housefiredb');
      if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
      }

      $sql = "SELECT weapons_id FROM weapons_has_bio WHERE bio_name = '".$_GET['value']."'";
      $result1 = mysqli_query($con,$sql); 

      while($row=mysqli_fetch_array($result1)){
        $sql = "SELECT weaponname FROM weapons WHERE id = '".$row['weapons_id']."'";
        $result = mysqli_query($con,$sql);
        $weapon = mysqli_fetch_array($result);
        echo "<option value=".$weapon['weaponname'].">".$weapon['weaponname']."</option>";
      }
    ?>
  </select>

  <select name="secondaryweapon">
    <?php
      $sql = "SELECT secondaryweapon_id FROM bio_has_secondaryweapon WHERE bio_name = '".$_GET['value']."'";
      $result1 = mysqli_query($con,$sql); 

      while($row=mysqli_fetch_array($result1)){
        $sql = "SELECT secondaryweaponname FROM secondaryweapons WHERE id = '".$row['secondaryweapon_id']."'";
        $result = mysqli_query($con,$sql);
        $weapon = mysqli_fetch_array($result);
        echo "<option value=".$weapon['secondaryweaponname'].">".$weapon['secondaryweaponname']."</option>";
      } 
    ?>
  </select>

  <select name="secondarygadget">
    <?php
      $sql = "SELECT secondarygadget_id FROM bio_has_secondarygadget WHERE bio_name = '".$_GET['value']."'";
      $result1 = mysqli_query($con,$sql); 

      while($row=mysqli_fetch_array($result1)){
        $sql = "SELECT gadgetname FROM secondarygadgets WHERE id = '".$row['secondarygadget_id']."'";
        $result = mysqli_query($con,$sql);
        $weapon = mysqli_fetch_array($result);
        echo "<option value=".$weapon['gadgetname'].">".$weapon['gadgetname']."</option>";
      } 
    ?>
  </select>
  <input type="hidden" name="opname" value=<?php echo $_GET['value']?>>
  <input type="submit" style="font-size: 25;
    font-family: monospace;
    color: #ebf108;
    background-color: darkcyan;
    margin: 100px;" value="SUBMIT">
</form>