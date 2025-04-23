<!-- updateroom.php -->
<html>
<head><title>Edit Room</title></head>
<body>
<center><h2>Edit Room Information</h2></center>
<hr width="40%">

<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>Please <a href='login.php'>login</a> first!</p></center>";
    exit;
}

$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$conn = new mysqli("vlamp.cs.uleth.ca", $username, $password, $username);

$sql = "SELECT * FROM ROOM WHERE room_ID='$_POST[room_ID]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rec = $result->fetch_assoc();
    echo "<fieldset>";
    echo "<legend><b>Update Room #$rec[room_ID]</b></legend>";
    echo "<form action=\"updateroom2.php\" method=\"post\">";
    echo "Room ID: <input type=\"text\" name=\"room_ID\" value=\"$rec[room_ID]\" readonly><br><br>";
    echo "Number: <input type=\"text\" name=\"room_number\" value=\"$rec[room_number]\"><br><br>";
    echo "Type: <input type=\"text\" name=\"room_type\" value=\"$rec[room_type]\"><br><br>";
    echo "Capacity: <input type=\"text\" name=\"capacity\" value=\"$rec[capacity]\"><br><br>";
    echo "Price/Night: <input type=\"text\" name=\"price_per_night\" value=\"$rec[price_per_night]\"><br><br>";
    echo "Status: <input type=\"text\" name=\"status\" value=\"$rec[status]\"><br><br>";
    echo "<input type=\"submit\" value=\"Update\">";
    echo "</form>";
    echo "</fieldset>";
} else {
    echo "<center><p>Room not found!</p></center>";
}
?>

<p><a href="main.php">Back to Main</a></p>
</body>
</html>
