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
  $sql = "INSERT INTO users (username, email,  phone, password)
          VALUES ('$username', '$email', '$phone', '$password')";

  if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}

?>