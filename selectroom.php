<!-- selectroom.php -->
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
    echo "<center><table border='1' cellpadding='5'>";
    echo "<tr><th>ID</th><th>Number</th><th>Type</th><th>Capacity</th><th>Price</th><th>Status</th></tr>";
    while ($rec = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$rec['room_ID']."</td>";
        echo "<td>".$rec['room_number']."</td>";
        echo "<td>".$rec['room_type']."</td>";
        echo "<td>".$rec['capacity']."</td>";
        echo "<td>".$rec['price_per_night']."</td>";
        echo "<td>".$rec['status']."</td>";
        echo "</tr>";
    }
    echo "</table></center>";
} else {
    echo "<center><p>Room not found!</p></center>";
}

echo "<center><p><a href=\"main.php\">Back to Main</a></p></center>";
?>
