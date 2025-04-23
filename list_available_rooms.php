<!-- list_available_rooms.php -->
<html>
<head><title>List Available Rooms</title></head>
<body>
<center><h2>Available Rooms</h2></center>
<hr width="40%">

<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>Please <a href='login.php'>login</a> first!</p></center>";
    exit;
}

$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$conn = new mysqli("vlamp.cs.uleth.ca", $username, $password, $username);

$sql = "SELECT * FROM ROOM WHERE status='Available'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<center><table border='1' cellpadding='5'>";
    echo "<tr><th>Room ID</th><th>Number</th><th>Type</th><th>Capacity</th><th>Price</th><th>Status</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['room_ID']."</td>";
        echo "<td>".$row['room_number']."</td>";
        echo "<td>".$row['room_type']."</td>";
        echo "<td>".$row['capacity']."</td>";
        echo "<td>".$row['price_per_night']."</td>";
        echo "<td>".$row['status']."</td>";
        echo "</tr>";
    }
    echo "</table></center>";
} else {
    echo "<center><p>No rooms currently available.</p></center>";
}

echo "<center><p><a href=\"main.php\">Back to Main</a></p></center>";
?>
</body>
</html>
