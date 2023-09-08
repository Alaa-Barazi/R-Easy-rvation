<?php  include 'dbCon.php';

if(isset($_POST['Add'])){
   
    $desc=$_POST['desc'];
    $desc2=$_POST['descmore'];
    $desc .= $desc2;

    
   
    $sql="INSERT INTO tbreport (`RestID`, `Comment`)  VALUES(1,'$desc')";
    $result=mysqli_query($con,$sql);
   
   if($result){
        echo "<SCRIPT> 
        alert('Report Added');
        window.location.replace('User_report.php');
    </SCRIPT>";
    }
    else{
        echo "<SCRIPT> 
        alert('Error Adding Report')
        window.location.replace('User_report.php');
        </SCRIPT>";
        

    }
}


?>