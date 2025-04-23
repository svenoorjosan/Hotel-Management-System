<!-- setpass.php -->
<?php
$uname = $_POST["username"];
$pword = $_POST["password"];

// Attempt to connect
$conn = @new mysqli("vlamp.cs.uleth.ca", $uname, $pword, $uname);
if ($conn->connect_errno) {
    // If fail, show error
    echo "<center><h3>Invalid username or password!</h3>";
    echo "<p><a href=\"login.php\">Go Back</a></p></center>";
    exit;
}

// If success, store cookies
setcookie("username", $uname, time() + 3600);
setcookie("password", $pword, time() + 3600);

// Redirect to main
header("Location: main.php");
?>
