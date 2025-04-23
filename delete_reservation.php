<!-- delete_reservation.php -->
<html>
<head><title>Delete Reservation</title></head>
<body>
<center><h2>Delete a Reservation</h2></center>
<hr width="40%">

<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>Please <a href='login.php'>login</a> first!</p></center>";
    exit;
}
?>

<?php
$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$conn = new mysqli("vlamp.cs.uleth.ca", $username, $password, $username);

$sql = "SELECT reservation_ID FROM RESERVATION";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<fieldset>";
    echo "<legend><b>Select Reservation</b></legend>";
    echo "<form action=\"deletereservation.php\" method=\"post\">";
    echo "Reservation: <select name=\"reservation_ID\">";
    while($row = $result->fetch_assoc()) {
        echo "<option value='".$row['reservation_ID']."'>Reservation #"
             .$row['reservation_ID']."</option>";
    }
    echo "</select> ";
    echo "<input type=\"submit\" value=\"Delete\">";
    echo "</form>";
    echo "</fieldset>";
} else {
    echo "<center><p>No reservations to delete!</p></center>";
}
?>

<p><a href="main.php">Back to Main</a></p>
</body>
</html>
