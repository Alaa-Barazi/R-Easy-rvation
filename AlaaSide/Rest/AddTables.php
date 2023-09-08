<html>
    <!--Start adding tables width height chair breath -->
    <body>
        <form action="checkT.php" method="post">
        <label>Restaurant Width</label>
        <br>
        <input type="text" id="widthR" name="widthR" 
        value="<?php echo $_GET['width'];?>" readonly/>
        <br>
        <label>Restaurant Height</label>
        <br>
        <input type="text" id="heightR" name="heightR"
        value="<?php echo $_GET['height'];?>" readonly/>
        <br>
        <label>Enter Width of your table</label>
        <br>
        <input type="text" placeholder="Width" id="widthT" name="widthT"/>
        <br>
        <label>Enter Height of your table</label>
        <br>
        <input type="text" placeholder="Height" id="heightT" name="heightT"/>
        <br>
        <label>Enter Chair breath/Party Size</label>
        <br>
        <input type="text" placeholder="Chair Breath" id="chairb" name="chairb"/>
        <br>
        <input type="submit" placeholder="Start" id="add" name="add"/>
        <br>
        <button type="reset" placeholder="Reset">Reset </button>
    </form>
    </body>
</html>