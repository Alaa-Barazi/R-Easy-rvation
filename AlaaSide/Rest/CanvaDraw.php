<html>
    <script src="canvaV1.js"></script>
<body onload="init()">
<canvas id='canvas' onclick='boardClicked(event)' 
width="<?php $w= $_GET['rtw']+100; echo $w?>" height="<?php $h=$_GET['rth']+100; echo $h;?>" > </canvas>
<form action='' method='post'>
<button id='bob' name='bob' onclick='sendData()'> Add More Tables</button>
    <?php if(!isset($_POST['bob'])){}
    //echo "<button id='bob' name='bob' onclick='sendData()'> Add More Tables</button>";
    else echo "<SCRIPT>
    alert('Done')
    window.location.replace('BuildR.php');
</SCRIPT>";

    ?>


</form>
</body>
</html>