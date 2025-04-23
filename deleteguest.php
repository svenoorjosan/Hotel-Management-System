<!-- deleteguest.php -->
<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>You must <a href='login.php'>login</a> first!</p></center>";
    exit;
}

$username = $_COOKIE["username"];
$password = $_COOKIE["password"];

$conn = new mysqli("vlamp.cs.uleth.ca", $username, $password, $username);

$sql = "DELETE FROM GUEST WHERE guest_ID='$_POST[guest_ID]'";

if ($conn->query($sql)) {
    echo "<center><h3>Guest deleted successfully!</h3></center>";
} else {
    $err = $conn->errno;
    $errtxt = $conn->error;
    echo "<center><p>Error code: $err. $errtxt</p></center>";
}

echo "<center><p><a href=\"main.php\">Return to Main</a></p></center>";
?>
