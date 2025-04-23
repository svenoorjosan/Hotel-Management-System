<!-- login.php -->
<html>
<head><title>Hotel Management - Login</title></head>
<body>
<center>
  <h1>Hotel Management System</h1>
  <hr width="50%">
  <p>Please enter your MySQL credentials to continue.</p>
</center>

<fieldset>
  <legend><b>Login</b></legend>
  <form action="setpass.php" method="post">
    MySQL Username: 
    <input type="text" name="username" size="20" placeholder="e.g. wendy3660"><br><br>
    MySQL Password: 
    <input type="password" name="password" size="20" placeholder="*******"><br><br>
    <input type="submit" value="Login">
  </form>
</fieldset>

<hr>
<center>Hotel Management &copy; 2025</center>
</body>
</html>
