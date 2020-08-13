<?php

if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['hacker_id']) ){ 
echo 'You haven\'t filled out all fields correctly. Please go back and try again.'; 
}

$con = mysqli_connect('localhost', 'ioithost_vinit', 'vinitshah', 'ioithost_contact');

// This is important to prevent injection attacks
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$hacker_id = mysqli_real_escape_string($con, $_POST['hacker_id']);

// The query.
$result = mysqli_query($con, "INSERT INTO event_registration(name, email, phone, hacker_id) VALUES ('" . $name . "', '" . $email . "', '" . $phone . "', '" . $hacker_id . "')");

$to = $email;
$from = "noreply@ioit.acm.org";
$subject = "IOIT ACM Coding War!";
$txt = "Thank you participating in ACM Coding War! 
The problem statement will be released on 27th March 2020 sharp at 00:00 hrs so make sure you're on time.
Contest Link: https://www.hackerrank.com/code-wars-march-i
";
$headers = "From: support@ioit.acm.org" . "\r\n"; 

mail($to,$from,$subject,$txt,$headers);

if ($result)
  { 
     session_start();
    $_SESSION['success_message'] = "Contact form saved successfully.";
    header("Location: event.html");
    exit();
  }

mysqli_close($con);

?>