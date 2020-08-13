<?php

if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['department']) ||empty($_POST['message'])){ 
echo 'You haven\'t filled out all fields correctly. Please go back and try again.'; 
}

$con = mysqli_connect('localhost', 'ioithost_vinit', 'vinitshah', 'ioithost_contact');

// This is important to prevent injection attacks
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$department = mysqli_real_escape_string($con, $_POST['department']);
$message= mysqli_real_escape_string($con, $_POST['message']);

// The query.
$result = mysqli_query($con, "INSERT INTO contact_form (name, email, phone, department, message) VALUES ('" . $name . "', '" . $email . "', '" . $phone . "', '" . $department . "', '" . $message . "')");
if ($result)
  { 
     session_start();
    $_SESSION['success_message'] = "Contact form saved successfully.";
    header("Location: contact.html");
    exit();
  }

mysqli_close($con);

?>

