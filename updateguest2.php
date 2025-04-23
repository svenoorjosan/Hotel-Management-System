<!-- updateguest2.php -->
<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>Please <a href='login.php'>login</a> first!</p></center>";
    exit;
}

$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$conn = new mysqli("vlamp.cs.uleth.ca", $username, $password, $username);

$sql = "UPDATE GUEST
        SET name='$_POST[name]', 
            phone='$_POST[phone]', 
            email='$_POST[email]'
        WHERE guest_ID='$_POST[guest_ID]'";

if ($conn->query($sql)) {
    echo "<center><h3>Guest updated successfully!</h3></center>";
} else {
    $err = $conn->errno;
    echo "<center><p>Error code $err: ".$conn->error."</p></center>";
}

echo "<center><p><a href=\"main.php\">Return to Main</a></p></center>";
?>
