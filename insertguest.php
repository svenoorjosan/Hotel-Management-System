<!-- insertguest.php -->
<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>You must <a href='login.php'>login</a> first!</p></center>";
    exit;
}

$username = $_COOKIE["username"];
$password = $_COOKIE["password"];

$conn = new mysqli("vlamp.cs.uleth.ca", $username, $password, $username);
if ($conn->connect_errno) {
    echo "<h3>DB Connection Issue</h3>";
    exit;
}

$sql = "INSERT INTO GUEST (name, phone, email)
        VALUES ('$_POST[name]', '$_POST[phone]', '$_POST[email]')";

if ($conn->query($sql)) {
    echo "<center><h3>Guest inserted successfully!</h3></center>";
} else {
    $err = $conn->errno;
    if ($err == 1062) {
        echo "<center><p>Duplicate entry for this guest!</p></center>";
    } else {
        echo "<center><p>Error code $err: ".$conn->error."</p></center>";
    }
}

echo "<center><p><a href=\"main.php\">Return to Main</a></p></center>";
?>
