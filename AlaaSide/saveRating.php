<?php  include 'dbCon.php';

if(isset($_POST['submit'])){
    $stars=$_POST['rate'];
    $desc=$_POST['comment'];
//RestID Comment Stars RateID
//INSERT INTO `tbratings`(`RestID`, `Comment`, `Stars`, `RateID`) 
    
   
    $sql="INSERT INTO tbratings (`RestID`, `Comment`, `Stars`)  VALUES(1,'$desc',$stars)";
    $result=mysqli_query($con,$sql);
    // $result = mysqli_query($con, "INSERT INTO tbowner
   // VALUES ('$user', '$email','$phone','$psw','$pswrp')");
   if($result){
        echo "<SCRIPT> 
        alert('Review Added');
        window.location.replace('User_rating.php');
    </SCRIPT>";
    }
    else{
        echo "<SCRIPT> 
        alert('Error Adding Review')
        window.location.replace('User_rating.php');
        </SCRIPT>";
        

    }
}


?>