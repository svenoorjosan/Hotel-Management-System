<!-- updatereservation.php -->
<html>
<head><title>Edit Reservation</title></head>
<body>
<center><h2>Edit Reservation Details</h2></center>
<hr width="40%">

<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>You must <a href='login.php'>login</a> first!</p></center>";
    exit;
}

$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$conn = new mysqli("vlamp.cs.uleth.ca", $username, $password, $username);

$sql = "SELECT * FROM RESERVATION WHERE reservation_ID='$_POST[reservation_ID]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rec = $result->fetch_assoc();
    echo "<fieldset>";
    echo "<legend><b>Update Reservation #$rec[reservation_ID]</b></legend>";
    echo "<form action=\"updatereservation2.php\" method=\"post\">";
    echo "Reservation ID: <input type=\"text\" name=\"reservation_ID\" value=\"$rec[reservation_ID]\" readonly><br><br>";
    echo "Check In: <input type=\"text\" name=\"check_in_date\" value=\"$rec[check_in_date]\"><br><br>";
    echo "Check Out: <input type=\"text\" name=\"check_out_date\" value=\"$rec[check_out_date]\"><br><br>";
    echo "Number of Guests: <input type=\"text\" name=\"number_of_guest\" value=\"$rec[number_of_guest]\"><br><br>";
    echo "Total Cost: <input type=\"text\" name=\"total_cost\" value=\"$rec[total_cost]\"><br><br>";
    echo "Guest ID: <input type=\"text\" name=\"guest_ID\" value=\"$rec[guest_ID]\"><br><br>";
    echo "Room ID: <input type=\"text\" name=\"room_ID\" value=\"$rec[room_ID]\"><br><br>";
    echo "<input type=\"submit\" value=\"Update\">";
    echo "</form>";
    echo "</fieldset>";
} else {
    echo "<center><p>Reservation not found!</p></center>";
}
?>

<p><a href="main.php">Back to Main</a></p>
</body>
</html>
