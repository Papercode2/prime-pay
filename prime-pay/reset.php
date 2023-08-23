<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guestbook";

// Create connection
$conn = mysqli_connect("localhost", "root", "", "guestbook");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['reset'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if the email exists in the database
    $query = "SELECT email FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        // Generate a random password
        $new_password = bin2hex(random_bytes(8));

        // Hash the password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the password in the database
        $update_query = "UPDATE users SET password='$hashed_password' WHERE email='$email'";
        if (mysqli_query($conn, $update_query)) {
            // Send the new password to the user's email
            $to = $email;
            $subject = "Password reset";
            $message = "Your new password is: $new_password";
            $headers = "From: noreply@example.com";
            if (mail($to, $subject, $message, $headers)) {
                echo "A new password has been sent to your email.";
            } else {
                echo "Failed to send email. Please try again.";
            }
        } else {
            echo "Failed to reset password. Please try again.";
        }
    } else {
        echo "Email address not found.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<<body style="background-color:powderblue;">
  <p><font color="black"><center><b><i><font color=cool><font family= "arial">PRIME-PAY </family></cool></i></b></center></color></p>
  <br><hr><MARQUEE><FONT COLOR="red"><b><FONT FAMILY="ARIAL">SIMPLE , EASY AND TRANSPARENT</MARQUEE></COLOR></b></FAMILY>
<br><hr>
    <title>Password reset</title>
</head>
<body>
    <form action="" method="post">
        <input type="email" name="email" placeholder="Email address">
        <input type="submit" name="reset" value="Reset password">
    </form>
</body>
</html>
