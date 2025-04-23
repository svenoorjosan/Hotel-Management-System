<!-- deletereservation.php -->
<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>You must <a href='login.php'>login</a> first!</p></center>";
    exit;
}

$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$conn = new mysqli("vlamp.cs.uleth.ca", $username, $password, $username);

$sql = "DELETE FROM RESERVATION WHERE reservation_ID='$_POST[reservation_ID]'";

if ($conn->query($sql)) {
    echo "<center><h3>Reservation deleted!</h3></center>";
    // Optionally set the related room back to 'Available'
    // $conn->query("UPDATE ROOM SET status='Available' WHERE room_ID=... ");
} else {
    $err = $conn->errno;
    $errtxt = $conn->error;
    echo "<center><p>Error $err: $errtxt</p></center>";
}

echo "<center><p><a href=\"main.php\">Return to Main</a></p></center>";
?>
