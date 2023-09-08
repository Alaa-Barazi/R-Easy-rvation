<?php  
$con=mysqli_connect("localhost","root","1234","contact");
// Check connection
 if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
if (isset($_POST['reg'])){
    $user=$_POST['uname'];
    $psw=$_POST['psw'];
    $email=$_POST['email'];
    $phone=$_POST['pnum'];

    $result = mysqli_query($con,"INSERT INTO  tbusers (Username,Password,Email,Phone)
    VALUES ('$user', '$psw','$email','$phone')");

    if($result){
        header('Location: http://localhost/labs/Try/Login.php');
    }
   
}
    
    mysqli_close($con);
?>
</body>
</html>
