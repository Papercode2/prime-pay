<?php
session_start();

if (isset($_POST['submit'])) {
  $_SESSION['prime-pay'] = $_POST['prime-pay'];
}

// On the home page and reset page
if (isset($_SESSION['prime-pay'])) {
  $prime_pay = $_SESSION['prime-pay'];
  echo "Welcome, $prime_pay";
}




if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to database and validate credentials
    $db = mysqli_connect('localhost', 'root', '', 'guestbook');

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
    mysqli_close($db);
}
?>
<!DOCTYPE html>
<html>
<head>   
</head>
<body style="background-color:powderblue;">
  <p><font color="black"><center><b><i><font color=cool><font family= "arial">PRIME-PAY </family></cool></i></b></center></color></p>
  <br><hr><MARQUEE><FONT COLOR="red"><b><FONT FAMILY="ARIAL">SIMPLE , EASY AND TRANSPARENT</MARQUEE></COLOR></b></FAMILY>
<br><hr><div class="logo">
		<img src="IMG_20230128_230612.jpg"width="80"height="80">
	</div>
<center><h2>Login</h2>
<form action="index.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <input type="submit" value="Submit">
</form>
<button><a href='signup.php'>signup<p>
<button><a href='reset.php'>reset</p>
<?php
if (isset($error)) {
    echo "<p>$error</p>";
}
?>
</body>
</html>
