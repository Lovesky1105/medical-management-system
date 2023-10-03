<?php
include_once "phyBackend/config.php";
include_once "../header.php"; 
?>

<html>
<body>

<form action="adminBackend/timeController.php" method="post">
    <div>
        <input type="text" name="slot" placeholder="Please enter the slot name.. e.g. slot 1">
    </div>

    <div>
        <input type="time" name="time" placeholder="Please enter the time e.g. hh:mm:ss">
    </div>

    <button type="submit" name="submit" >Submit</button>
</form>

</body>
</html>