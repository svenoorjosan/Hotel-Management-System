<!-- insert_room.php -->
<html>
<head><title>Add New Room</title></head>
<body>
<center><h2>Add a New Room</h2></center>
<hr width="40%">

<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>Please <a href='login.php'>login</a> first!</p></center>";
    exit;
}
?>

<fieldset>
  <legend><b>Room Details</b></legend>
  <form action="insertroom.php" method="post">
    Room Number: <input type="text" name="room_number" size="10"><br><br>
    Room Type: <input type="text" name="room_type" size="15"><br><br>
    Capacity: <input type="text" name="capacity" size="5"><br><br>
    Price per Night: <input type="text" name="price_per_night" size="8"><br><br>
    Status: <input type="text" name="status" size="12" value="Available"><br><br>
    <input type="submit" value="Add Room">
  </form>
</fieldset>

<p><a href="main.php">Back to Main Menu</a></p>
</body>
</html>
