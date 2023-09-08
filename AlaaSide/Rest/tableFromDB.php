<?php include 'dbCon.php';
$tables=[];
$sql="SELECT * FROM tbtable WHERE RestID=1";
$result=mysqli_query($con,$sql);
$width=0;
$length=0;
while($row=mysqli_fetch_assoc($result)) {
    $newRow=[$row['CenterX'],$row['CenterY']];
    $width=$row['width'];
    $length=$row['length'];
    array_push($tables, $newRow);
}
//array_push($tables,$width);
//array_push($tables,$length);

echo json_encode($tables);




?>