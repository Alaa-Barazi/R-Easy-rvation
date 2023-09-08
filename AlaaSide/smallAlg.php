
<html>
<link rel="stylesheet" type="text/css" href="CSS/Rating.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php include 'dbCon.php';
function showAverageRating($restID){
    /*Functon that gets restaurant id and then displays the average rating with stars */
    $sum=0;
    $count=0;
    $sql="SELECT * FROM tbratings WHERE RestID=$restID";
    $result=mysqli_query($GLOBALS['con'],$sql);
    while($row=mysqli_fetch_array($result)){
        $count++;
        $str=$row['Stars'];
        $sum+=$str;
    }
    $avg=0;
    if($count!=0){
        $avg=$sum/$count;
    }
    $real_avg=ceil($avg);
    $star=$real_avg;
    $st=0;
    echo "<div class='d-flex flex-start' style='margin-bottom:10px;margin-top:15px; ' >"; 
    echo "<div style='margin-left:15px;'>";
    echo "<center><div class='rate'>";
     
     
    echo "<h2> User Ratings: </h2>";
      while($star>0){
        echo "<span class='fa fa-star checked'></span>";
        echo "<input type='radio' value=$st /> <label title='stars'>$st stars</label>";
        $star--;
        $st++;
    }
    echo "<br> <br> <p>$avg average based on $count reviews.</p>";
      echo "</div><br><div class='d-flex align-items-center mb-3'>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
}
showAverageRating(1);
?>

</html>