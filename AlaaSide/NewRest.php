<?php 
include 'dbCon.php';
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['RestName']);
    $open = mysqli_real_escape_string($con, $_POST['open']);
    $close = mysqli_real_escape_string($con, $_POST['close']);
    $adr = mysqli_real_escape_string($con, $_POST['address']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $owner = $_SESSION['Owner'];
    
    // Upload image to server
    $file = $_FILES['img'];
    $filename = $file['name'];
    $tmpname = $file['tmp_name'];
    $filetype = $file['type'];
    $filesize = $file['size'];
    $target_dir = "uploads/"; // Change this to the folder where you want to store the images
    $target_file = $target_dir . basename($filename);
    move_uploaded_file($tmpname, $target_file);
    
    // Insert data into database
    $sql="INSERT INTO tbrestaurant (RestName, OpenTime, CloseTime, Cuisine, Address, City, imgURL, Status, Owner)
          VALUES ('$name', TIME('$open'), TIME('$close'), 'Italian', '$adr', '$city', '$target_file', 'Waiting', '$owner')";
    $res = mysqli_query($con, $sql);
    
    if ($res) {
       echo "<SCRIPT> 
                alert('Restaurant created successfully Wait for Confirmation');
                window.location.replace('AddR.php');
              </SCRIPT>";
    
    } else {
        echo "<SCRIPT> 
                alert('Error creating restaurant');
                window.location.replace('AddR.php');
              </SCRIPT>";
    }
}

mysqli_close($con);
?>
