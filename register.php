<?php



$email = mysql_real_escape_string($_POST['email']);



$email_from = 'kosta@potatoweb.com.au';//<== update the email address
$email_subject = "New Expression of Interest from AdsUp";
$email_body = "You have received a new expression of interest from an AdsUp visitor.\n\n".

    "Visitor Details \n \n".

    "Email Address: $email \n ".


   
$to = "kosta@potatoweb.com.au";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
echo "<script>alert('Thank you for registering your insterest. We will get in touch with you soon.')</script>";
echo "<script>window.open('../index.html', '_self')</script>";
   
?> 