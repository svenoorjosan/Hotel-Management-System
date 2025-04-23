<!-- update_guest.php -->
<html>
<head><title>Update Guest</title></head>
<body>
<center><h2>Update Guest Information</h2></center>
<hr width="40%">

<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>You must <a href='login.php'>login</a> first!</p></center>";
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
    echo "<form action=\"updateguest.php\" method=\"post\">";
    echo "Guest: <select name=\"guest_ID\">";
    while($row = $result->fetch_assoc()) {
        echo "<option value='".$row['guest_ID']."'>"
             .$row['guest_ID']." - ".$row['name']."</option>";
    }
    echo "</select> ";
    echo "<input type=\"submit\" value=\"Edit\">";
    echo "</form>";
    echo "</fieldset>";
} else {
    echo "<center><p>No guests found!</p></center>";
}
?>

<p><a href="main.php">Back to Main Menu</a></p>
</body>
</html>
