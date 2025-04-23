<!-- selectguest.php -->
<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>Please <a href='login.php'>login</a> first!</p></center>";
    exit;
}

$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$conn = new mysqli("vlamp.cs.uleth.ca", $username, $password, $username);

$sql = "SELECT * FROM GUEST WHERE guest_ID='$_POST[guest_ID]'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<center><table border='1' cellpadding='5'>";
    echo "<tr><th>Guest ID</th><th>Name</th><th>Phone</th><th>Email</th></tr>";
    while ($rec = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$rec['guest_ID']."</td>";
        echo "<td>".$rec['name']."</td>";
        echo "<td>".$rec['phone']."</td>";
        echo "<td>".$rec['email']."</td>";
        echo "</tr>";
    }
    echo "</table></center>";
} else {
    echo "<center><p>Guest not found!</p></center>";
}

echo "<center><p><a href=\"main.php\">Return to Main</a></p></center>";
?>
