<!-- selectreservation.php -->
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
    echo "<center><table border='1' cellpadding='5'>";
    echo "<tr>
            <th>ID</th><th>Check In</th><th>Check Out</th>
            <th># Guests</th><th>Total Cost</th>
            <th>Guest ID</th><th>Room ID</th>
          </tr>";
    while ($rec = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$rec['reservation_ID']."</td>";
        echo "<td>".$rec['check_in_date']."</td>";
        echo "<td>".$rec['check_out_date']."</td>";
        echo "<td>".$rec['number_of_guest']."</td>";
        echo "<td>".$rec['total_cost']."</td>";
        echo "<td>".$rec['guest_ID']."</td>";
        echo "<td>".$rec['room_ID']."</td>";
        echo "</tr>";
    }
    echo "</table></center>";
} else {
    echo "<center><p>No matching reservation.</p></center>";
}

echo "<center><p><a href=\"main.php\">Back to Main</a></p></center>";
?>
