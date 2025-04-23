<!-- main.php -->
<html>
<head><title>Hotel Management - Main Menu</title></head>
<body>

<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><h3>You are not logged in!</h3>";
    echo "<p><a href=\"login.php\">Login Here</a></p></center>";
    exit;
}
?>

<center>
  <h1>Hotel Management System</h1>
  <hr width="60%">
  <p>Welcome!</p>
</center>

<!-- GUEST -->
<font size="4"><b>Guest Operations</b></font>
<ul>
  <li><a href="insert_guest.php">Add a New Guest</a></li>
  <li><a href="update_guest.php">Update a Guest</a></li>
  <li><a href="select_guest.php">View a Guest</a></li>
  <li><a href="delete_guest.php">Delete a Guest</a></li>
</ul>

<!-- ROOM -->
<font size="4"><b>Room Operations</b></font>
<ul>
  <li><a href="insert_room.php">Add a New Room</a></li>
  <li><a href="update_room.php">Update a Room</a></li>
  <li><a href="select_room.php">View a Room</a></li>
  <li><a href="delete_room.php">Delete a Room</a></li>
</ul>

<!-- RESERVATION -->
<font size="4"><b>Reservation Operations</b></font>
<ul>
  <li><a href="insert_reservation.php">Create a Reservation</a></li>
  <li><a href="update_reservation.php">Update a Reservation</a></li>
  <li><a href="select_reservation.php">View a Reservation</a></li>
  <li><a href="delete_reservation.php">Delete a Reservation</a></li>
</ul>

<!-- QUERY EXAMPLE -->
<font size="4"><b>Queries</b></font>
<ul>
  <li><a href="list_available_rooms.php">List Available Rooms</a></li>
</ul>

<hr>
<p><a href="logout.php"><font color="red">Logout</font></a></p>
</body>
</html>
