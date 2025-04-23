<!-- update_room.php -->
<html>
<head><title>Update Room</title></head>
<body>
<center><h2>Update Room</h2></center>
<hr width="40%">

<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>Please <a href='login.php'>login</a> first!</p></center>";
    exit;
}

$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$conn = new mysqli("vlamp.cs.uleth.ca", $username, $password, $username);

$sql = "SELECT room_ID, room_number FROM ROOM";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<fieldset>";
    echo "<legend><b>Choose a Room</b></legend>";
    echo "<form action=\"updateroom.php\" method=\"post\">";
    echo "Room: <select name=\"room_ID\">";
    while ($row = $result->fetch_assoc()) {
        echo "<option value='".$row['room_ID']."'>"
             .$row['room_ID']." - Room #".$row['room_number']."</option>";
    }
    echo "</select> ";
    echo "<input type=\"submit\" value=\"Edit\">";
    echo "</form>";
    echo "</fieldset>";
} else {
    echo "<center><p>No rooms available!</p></center>";
}
?>

<p><a href="main.php">Back to Main</a></p>
</body>
</html>
