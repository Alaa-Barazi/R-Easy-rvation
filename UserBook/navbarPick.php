<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php include "navbar.php"?><br>
<body style="overflow-y:scroll">
<center><h1>Book A Table At <?php 
require_once "../dbcon.php";
$id =  $_GET['id'];
$sql = "SELECT * FROM `tbrestaurant` where RestID = $id";
$result = $con->query($sql);
if($result->num_rows != 1){
    // redirect to show page
    die('id is not in db');
}
$data = $result->fetch_assoc(); echo $data['RestName'];?></h1></center>
<br>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="display:flex;justify-content:center">
            <form class="form-inline my-2 my-lg-0" method="post" action=''>
                <input class="form-control mr-sm-2" type='date' name='date'  min="<?php echo date('Y-m-d'); ?>" />
                <select class="form-control mr-sm-2 custom-select" name='hour' id='hour'>
                    <option selected="">Pick Hour</option>
                    <?php include '../dbCon.php';
                    $id =  $_GET['id'];
                    $sql = "SELECT * FROM tbrestaurant WHERE RestID=$id";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $open = date('H', strtotime($row['OpenTime']));
                        $close = date('H', strtotime($row['CloseTime']));
                        echo "<p>" . $open . " " . $close . " </p>";
                        for ($i = $open; $i < $close; $i += 2) {
                            echo "<option value=$i>$i </option>";
                        }
                    }
                    ?>
                </select>
                <input class="form-control mr-sm-2" type="search" placeholder="Party Size" aria-label="Search"
                    name='PartySize'>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name='search'>Search</button>
            </form>
        </div>
    </nav>

<?php include '../dbCon.php'; 
function foundInOrder($tableID, $hour, $date)
{
    /*do we have this table in the orders with specific date and hour */
    $sql = "SELECT * FROM tborder WHERE TableID=$tableID";
    $result = mysqli_query($GLOBALS['con'], $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $time = date('H', strtotime($row['Time']));
        $dateOrder = $row['Date'];
        if ($time == $hour && $dateOrder == $date)
            return false;
    }
    return true;
}
function Reserved($hour, $date,$partysize)
{  
    /*check if specific table of restaurant is reserved or not for the givent hour and date */
    $id =  $_GET['id'];
    $sql = "SELECT * FROM tbtable WHERE RestID=$id";
    $result = mysqli_query($GLOBALS['con'], $sql);
    echo "<br><center><a style='text-decoration:none' href='pickTable.php?id=$id&hour=$hour&date=$date&PartySize=$partysize'>Pick A Table by viewing Restaurant Vizualisation</a></center>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='card-deck' style='margin-left:11.8%;width:1230px;margin-top:20px'>";
        if (foundInOrder($row['tableID'], $hour, $date) == true) {
            echo "<div class='card' style='width: 18rem;'>
            <div class='card-body'>
              <h5 class='card-title'>Table no. $row[tableID] </h5>
              <h6 class='card-subtitle mb-2 text-muted'><strong>Date:</strong> $date</h6>
              <h6 class='card-subtitle mb-2 text-muted'><strong>Time:</strong> $hour o'clock </i></h6>
              <a href='bookTable.php?id=$id&hour=$hour&date=$date&PartySize=$partysize&table=$row[tableID]' class='btn btn' style='background-color:#DCDCDC' id='bookOrder'>Book Table</a>
            </div>
          </div>
          ";
        }
        echo "</div>";
    }
    
}
// function available($hour, $pickedDate)
// {
//     /*checks if the given hour is available to be booked */
//     /*which means we dont have any order at this time for this specific week */

//     $sql = "SELECT * FROM tborder WHERE RestID=1";
//     $result = mysqli_query($GLOBALS['$con'], $sql);
//     if ($result) {
//         while ($row = mysqli_fetch_assoc($result)) {
//             $time = date('H', strtotime($row['Time']));
//             $date = $row['Date'];
//             $start_date = date("d-m-Y");
//             $end_date = strtotime('+7 day', $start_date);
//             if ($time == $hour && $date == $pickedDate) {
//                 echo "not avalable";
//                 return false;
//             }
//         }
//         return true;
//     }
// }
if (isset($_POST['search'])) {
    $selectedate = $_POST['date'];
    $hour = $_POST['hour'];
    $partysize=$_POST['PartySize'];
    if ($partysize <= 0 || $partysize > 10) {
        echo "<div class='alert alert-danger' role='alert'>
                <center>Party size should be between 1 and 10!</center>
              </div>";
    } else {
        $_SESSION['date'] = $selectedate;
        $_SESSION['hour'] = $hour;
        $_SESSION['id'] = $id;
        Reserved($hour, $selectedate, $partysize);
    }
}
?>
</body>