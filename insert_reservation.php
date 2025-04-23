<!-- insert_reservation.php -->
<html>
<head><title>Create Reservation</title></head>
<body>
<center><h2>Create a New Reservation</h2></center>
<hr width="40%">

<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>Please <a href='login.php'>login</a> first!</p></center>";
    exit;
}
?>

<fieldset>
  <legend><b>Reservation Details</b></legend>
  <form action="insertreservation.php" method="post">
    Guest ID: <input type="text" name="guest_ID" size="5"><br><br>
    Room ID: <input type="text" name="room_ID" size="5"><br><br>
    Check In Date (YYYY-MM-DD): <input type="text" name="check_in_date" size="10"><br><br>
    Check Out Date (YYYY-MM-DD): <input type="text" name="check_out_date" size="10"><br><br>
    Number of Guests: <input type="text" name="number_of_guest" size="3"><br><br>
    Total Cost (optional): <input type="text" name="total_cost" size="8"><br><br>
    <input type="submit" value="Reserve">
  </form>
</fieldset>

<p><a href="main.php">Back to Main</a></p>
</body>
</html>
