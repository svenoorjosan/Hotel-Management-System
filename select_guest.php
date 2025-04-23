<!-- select_guest.php -->
<html>
<head><title>View Guest</title></head>
<body>
<center><h2>View Guest Information</h2></center>
<hr width="40%">

<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>Please <a href='login.php'>login</a> first!</p></center>";
    exit;
}
?>

<?php
$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$conn = new mysqli("vlamp.cs.uleth.ca", $username, $password, $username);

$sql = "SELECT guest_ID, name FROM GUEST";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<fieldset>";
    echo "<legend><b>Choose Guest</b></legend>";
    echo "<form action=\"selectguest.php\" method=\"post\">";
    echo "Guest: <select name=\"guest_ID\">";
    while($row = $result->fetch_assoc()) {
        echo "<option value='".$row['guest_ID']."'>"
             .$row['guest_ID']." - ".$row['name']."</option>";
    }
    echo "</select> ";
    echo "<input type=\"submit\" value=\"View\">";
    echo "</form>";
    echo "</fieldset>";
} else {
    echo "<center><p>No guests in system!</p></center>";
}
?>

<p><a href="main.php">Back to Main</a></p>
</body>
</html>
