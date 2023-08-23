<DOCTYPE html>
<html>
<head>
  <title>prime pay. com</title>
<h1><center><font color= demonic><font family='arial'>Prime Pay</family></color></center></h1>
<link rel="stylesheet"href="maweu.css">
</head>
  </head>
<br><hr><MARQUEE><FONT COLOR="red"><b><FONT FAMILY="ARIAL">SIMPLE , EASY AND TRANSPARENT</MARQUEE></COLOR></b></FAMILY>
<br><hr>
<body style="background-color:powderblue;">
  <p><font color="black"><center><b><i><font color=cool><font family= "arial">CREATING AN ACCOUNT</family></cool></i></b></center></color></p>
  </body>
</html>
<?php

if(isset($_POST['submit'])) {
  $email = $_POST['email'];
  $username = $_POST['username'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];

  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "guestbook");

  // Check the connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Insert data into the database
  $sql = "INSERT INTO users (email, username, phone, password)
          VALUES ('$email', '$username', '$phone', '$password')";

  if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}

?>

<form action="insert.php" method="post">
  <input type="email" name="email" placeholder="Email" required>
  <input type="text" name="username" placeholder="Username"required>
  <input type="text" name="phone" placeholder="Phone"required>
  <input type="password" name="password" placeholder="Password"required>
  <input type="submit" name="submit">
</form>
