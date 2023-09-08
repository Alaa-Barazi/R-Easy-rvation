<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/Rating.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div style="text-align:center">
            <h1> The restaurant does not exist?The restaurant is closed?</h1>
            <h2>Report it! </h2>
        </div>


        <div class="row ">
            <div class="column">
                <form action="saveReport.php" method="post">
                    <div>
                        <center>
                            <h3>Report <i class="fa fa-flag" style='color:red' aria-hidden="true"></i></h3>
                        </center>
                    </div>
            </div>
        </div>


        <h3>Describe it</h3>
        <textarea id="desc" name="desc" cols="40" rows="7"></textarea>

        <h3>Tell us more about the situation?</h3>
        <textarea id="descmore" name="descmore" cols="40" rows="7"></textarea>
        <br> <br>
        <input type="submit" value="Add" name='Add'>
        <input type="reset" value="Clear">
        </form>
        <br>
        <h2> Other's reports</h2>
        <?php
        include 'dbCon.php';
        //$sql="SELECT *FROM tbratings WHERE RestID=X";
        $sql = "SELECT * FROM tbreport ";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {


            echo "<div class='d-flex flex-start' style='margin-bottom:10px;margin-top:15px; ' >";

            echo "<div style='margin-left:15px;'>";

            echo "<center>";
            echo "<br><div class='d-flex align-items-center mb-3'>";
            echo "<p style='font-size:20px'>" . $row["Comment"] . ". </p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<hr class='my-0'/>";

        }
        ?>




    </div>
    </div>
    </div>


</body>
<script>

</html >