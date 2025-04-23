<!-- updateroom2.php -->
<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>You must <a href='login.php'>login</a> first!</p></center>";
    exit;
}

$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$conn = new mysqli("vlamp.cs.uleth.ca", $username, $password, $username);

$sql = "UPDATE ROOM
        SET room_number='$_POST[room_number]',
            room_type='$_POST[room_type]',
            capacity='$_POST[capacity]',
            price_per_night='$_POST[price_per_night]',
            status='$_POST[status]'
        WHERE room_ID='$_POST[room_ID]'";

if ($conn->query($sql)) {
    echo "<center><h3>Room updated!</h3></center>";
} else {
    $err = $conn->errno;
    $errtxt = $conn->error;
    echo "<center><p>Error $err: $errtxt</p></center>";
}

echo "<center><p><a href=\"main.php\">Back to Main</a></p></center>";
?>
