<?php
include "navbar.php";
?>
<center><h1 style="padding-top:30px">Order now to save time!</h1>
<small><b><i>Order Online so you avoid delays</i></b></small></center>
<div style="display:flex;justify-content:center;align-items:center;height:50%">
<?php include '../dbCon.php';
function addMealDB($id, $qty) {
  // Function implementation goes here
}
?>

<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  <style>
    td{
      padding:3px 20px;
    }
    th{
      padding:3px 10px;
    }
    .box {
      display: none;
      width: 50px;
      border: 1px solid black;
    }
  </style>
  <script>
    function handleCheckbox(id, check) {
      var checkbox = document.getElementById(check);
      if (checkbox.checked) {
        var box = document.getElementById(id);
        box.style.display = "block";
      } else {
        var box = document.getElementById(id);
        box.style.display = "none";
      }
    }
  </script>
</head>
<body>
  <form action='' method='post'>
    <table border='1'>
      <tr>
        <th>Appetizer</th>
      </tr>
      <?php
    $sql = "SELECT * FROM tbmenu WHERE Category='Appetizer' AND RestID='1'";
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
        <td>
          <input type='checkbox' value='$row[ID]' name='checkbox[]' id='$row[ID]' onchange='handleCheckbox(\"$row[ID]qty\", \"$row[ID]\")' />
          $row[Name]  
          <input type='number' value='0' min='0' name='quantity[$row[ID]]' id='$row[ID]qty' class='box'/>  
        </td>
        <td>$row[Description]</td>
        <td>$row[Price]$</td>
      </tr>";
    }
    ?>

      <tr>
        <th>Main Course</th>
      </tr>

      <?php
      $sql = "SELECT * FROM tbmenu WHERE Category='MainCourse' AND RestID='1'";
      $result = mysqli_query($con, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>
          <input type='checkbox' value='$row[ID]' name='checkbox[]' id='$row[ID]' onchange='handleCheckbox(\"$row[ID]qty\", \"$row[ID]\")' />
          $row[Name]  
          <input type='number' value='0' min='0' name='quantity[$row[ID]]' id='$row[ID]qty' class='box'/>  
        </td>
        <td>$row[Description]</td>
        <td>$row[Price]$</td>
      </tr>";
      }
      ?>

      <tr>
        <th>Desserts</th>
      </tr>

      <?php
      $sql = "SELECT * FROM tbmenu WHERE Category='Desserts' AND RestID='1'";
      $result = mysqli_query($con, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>
          <input type='checkbox' value='$row[ID]' name='checkbox[]' id='$row[ID]' onchange='handleCheckbox(\"$row[ID]qty\", \"$row[ID]\")' />
          $row[Name]  
          <input type='number' value='0' min='0' name='quantity[$row[ID]]' id='$row[ID]qty' class='box'/>  
        </td>
        <td>$row[Description]</td>
        <td>$row[Price]$</td>
      </tr>";
  }
  ?>
</table><br><center>
<button class="btn btn-dark" name="add" id="add">Submit</button>
<center></form>
</body>
</html>



<?php
if (isset($_POST['add'])) {
    $meals = [];
    // Change RestID to session/url parameters
    $sql = "SELECT * FROM tbmenu WHERE RestID='1'";
    $result = mysqli_query($con, $sql);
    
    foreach ($_POST['checkbox'] as $mealID) {
        $quantity = $_POST['quantity'][$mealID];
        
        if ($quantity > 0) {
            $meals[$mealID] = $quantity;
        }
    }
   
    //get orderID from url pass it after confirmung the order
    foreach($meals as $ID => $qty) {
        $sql="INSERT INTO tbordermeals (`qty`, `MealID`, `RestID`, `OrderID`)
   VALUES ($qty,$ID,'1','3')";
   $result = mysqli_query($con,$sql);
      }
}


?>

</div>






