<?php

// Add a WECAN email address for EmailFrom. This is the reply to address.
// For EmailTo, use the address that should receive the email. EmailTo and EmailFrom can be the same address
// Change the Subject. It might be something like "WECAN Contact Form" or "WECAN Application"

$EmailFrom = "wecan645025@yahoo.com";
$EmailTo = "wecan645025@yahoo.com";
$Subject = "WECAN Application";

// You need to create the following lines for each field in your form. 
// Look at the index.html file. Each form field has a name and an id. ($_POST['Name']) copies the name or id that you use in the HTML and $Name is a variable that gets used in the form message below.

$Name = Trim(stripslashes($_POST['Name'])); 
$Tel = Trim(stripslashes($_POST['Tel'])); 
$Email = Trim(stripslashes($_POST['Email'])); 
$Message = Trim(stripslashes($_POST['Message'])); 

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

// This is the email body text. The blue parts are the varialbes that you have above, the green parts are what will show up in the eamil along with the information from the form.
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Tel: ";
$Body .= $Tel;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.php\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}
?>