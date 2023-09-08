<?php include 'dbCon.php';

function notFoundOwner($name)
{
    /*checks if username of owner already exists in database */
    $sql = "SELECT * FROM tbowner WHERE Username = '$name'";
    $res = mysqli_query($GLOBALS['con'], $sql);
    if (mysqli_num_rows($res) == 0)
        return true;
    return false;
}
if (isset($_POST['reg'])) {
    /*Username	Email	PhoneNumber	Password  RepeatPassword */
    /*Added mysqli_real_escape_string to sanitize user input and prevent SQL injection attacks. */
    $user = mysqli_real_escape_string($con, $_POST['uname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['pnum']);
    $psw = mysqli_real_escape_string($con, $_POST['psw']);
    $pswrp = mysqli_real_escape_string($con, $_POST['psw-repeat']);
    if (notFoundOwner($user) && ($psw == $pswrp)) {
        $result = mysqli_query($con, "INSERT INTO tbowner
    VALUES ('$user', '$email','$phone','$psw','$pswrp')");
        if ($result) {
            echo "<SCRIPT> 
            alert('Account created succefully')
            window.location.replace('logboth.php');
        </SCRIPT>";
        }
    } 
    else  if ($psw != $pswrp){
        echo "<SCRIPT> 
        alert('Different Password')
        window.location.replace('regowner.php');
    </SCRIPT>";
    } 
    else  {
        echo "<SCRIPT> 
        alert('User Already Exists')
        window.location.replace('regowner.php');
        </SCRIPT>";
    }


}

mysqli_close($con);
?>

