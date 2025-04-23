<!-- updateguest.php -->
<html>
<head><title>Edit Guest</title></head>
<body>
<center><h2>Edit Guest Data</h2></center>
<hr width="40%">

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
    $rec = $result->fetch_assoc();
    echo "<fieldset>";
    echo "<legend><b>Update Guest #$rec[guest_ID]</b></legend>";
    echo "<form action=\"updateguest2.php\" method=\"post\">";
    echo "Guest ID: <input type=\"text\" name=\"guest_ID\" value=\"$rec[guest_ID]\" readonly><br><br>";
    echo "Name: <input type=\"text\" name=\"name\" value=\"$rec[name]\"><br><br>";
    echo "Phone: <input type=\"text\" name=\"phone\" value=\"$rec[phone]\"><br><br>";
    echo "Email: <input type=\"text\" name=\"email\" value=\"$rec[email]\"><br><br>";
    echo "<input type=\"submit\" value=\"Update\">";
    echo "</form>";
    echo "</fieldset>";
} else {
    echo "<center><p>Guest not found!</p></center>";
}
?>

<p><a href="main.php">Back to Main</a></p>
</body>
</html>
