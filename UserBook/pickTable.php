<html>
<script src="pickTable.js"></script>
<?php include "navbar.php"; ?><br>

<body onload="init()">
    <div style="display:flex;justify-content:center;margin-left:20%;max-height:85%"><canvas id='canvas' onclick='boardClicked(event)' width="600" height="600"> </canvas></div>
<div style="margin-top:-20px"><br><center>The <b style="color:green;">Green</b> Squares Are the Available Tables for You To pick! Black Squares Are <b>NOT TO</b> Click</center></div>
</body>
</html>