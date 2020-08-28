<?php
$con = mysqli_connect('localhost', 'id8399240_vinit', 'vinit', 'id8399240_acm_registartion');

// This is important to prevent injection attacks
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$department = mysqli_real_escape_string($con, $_POST['department']);
$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
$message = mysqli_real_escape_string($con, $_POST['message']);

// The query.
$result = mysqli_query($con, "INSERT INTO registration (name, email, department, mobile, message) VALUES ('" . $name . "', '" . $department . "', '" . $email . "', '" . $mobile . "', '" . $message . "')");
if (mysqli_error($con))
  { die('Something went miserably wrong.<br>' . mysqli_error($con)); }

mysqli_close($con);

echo 'Successfully registered!';
?>