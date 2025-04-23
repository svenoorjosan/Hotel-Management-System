<!-- insert_guest.php -->
<html>
<head><title>Insert New Guest</title></head>
<body>
<center><h2>Insert a New Guest</h2></center>
<hr width="40%">

<?php
if (!isset($_COOKIE["username"])) {
    echo "<center><p>Please <a href='login.php'>login</a> first!</p></center>";
    exit;
}
?>

<fieldset>
  <legend><b>New Guest</b></legend>
  <form action="insertguest.php" method="post">
    Name: <input type="text" name="name" size="30"><br><br>
    Phone: <input type="text" name="phone" size="20"><br><br>
    Email: <input type="text" name="email" size="25"><br><br>
    <input type="submit" value="Add Guest">
  </form>
</fieldset>

<p><a href="main.php">Back to Main Menu</a></p>
</body>
</html>
