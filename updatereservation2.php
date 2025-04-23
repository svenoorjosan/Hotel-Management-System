<!-- updatereservation2.php -->
<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>You must <a href='login.php'>login</a> first!</p></center>";
    exit;
}

$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$conn = new mysqli("vlamp.cs.uleth.ca", $username, $password, $username);

$sql = "UPDATE RESERVATION
        SET check_in_date='$_POST[check_in_date]',
            check_out_date='$_POST[check_out_date]',
            number_of_guest='$_POST[number_of_guest]',
            total_cost='$_POST[total_cost]',
            guest_ID='$_POST[guest_ID]',
            room_ID='$_POST[room_ID]'
        WHERE reservation_ID='$_POST[reservation_ID]'";

if ($conn->query($sql)) {
    echo "<center><h3>Reservation updated!</h3></center>";
} else {
    $err = $conn->errno;
    $errtxt = $conn->error;
    echo "<center><p>Error $err: $errtxt</p></center>";
}

echo "<center><p><a href=\"main.php\">Back to Main</a></p></center>";
?>
