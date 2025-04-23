<!-- insertreservation.php -->
<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>You must <a href='login.php'>login</a> first!</p></center>";
    exit;
}

$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$conn = new mysqli("vlamp.cs.uleth.ca", $username, $password, $username);

$sql = "INSERT INTO RESERVATION
        (check_in_date, check_out_date, number_of_guest, total_cost, guest_ID, room_ID)
        VALUES ('$_POST[check_in_date]', '$_POST[check_out_date]', '$_POST[number_of_guest]',
                '$_POST[total_cost]', '$_POST[guest_ID]', '$_POST[room_ID]')";

if ($conn->query($sql)) {
    echo "<center><h3>Reservation created!</h3></center>";
    // Optionally, you might set the Room's status to 'Occupied'
    // $conn->query("UPDATE ROOM SET status='Occupied' WHERE room_ID='$_POST[room_ID]'");
} else {
    $err = $conn->errno;
    $errtxt = $conn->error;
    echo "<center><p>Error $err: $errtxt</p></center>";
}

echo "<center><p><a href=\"main.php\">Back to Main</a></p></center>";
?>
