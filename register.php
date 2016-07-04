<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
	exit;
}
$email = $_POST['email'];

//Validate first
if (empty($email)) 
{
    echo "Your email address is needed";
    exit;
}

if(IsInjected($email))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'interest@adsup.today';//<== update the email address
$email_subject = "New registration of interest";
$email_body = "You have received a new registration of interest from $email.\n".
    
$to = "kosta@potatoweb.com.au";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
echo "<script>alert('Thank you for registering your interest. We will get in touch with you soon.')</script>";
echo "<script>window.open('index.html', '_self')</script>";


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 
