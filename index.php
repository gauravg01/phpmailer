<html>
<head>
<title>G Mailinator - An Email Spoofer with Attachments</title>
<link rel="stylesheet" type="text/css" href="custom.css" />
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="description" content="E mail Spoofer with attachments sent directly in inbox. #phpmailer #phpspammer #gauravg01">
<link rel='shortcut icon' type='image/x-icon' href='favicon.png' />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body bgcolor="cyan" text="black" background="bg.jpg">
<div class="container">
<form action="#" method="post" enctype="multipart/form-data">
<fieldset>
<font size="5" color="Blue"><a href="http://gauravg.ga/" target="_blank">
<marquee bgcolor="white" behavior="alternate"
onmouseover="this.stop();" onmouseout="this.start();">
G Mailinator an E-mail Spoofer with Attachments by Gaurav Gupta
</marquee></font></a>
<?php
if(isset($_POST['submit']))
{
$to = $_POST['to'];
$from = $_POST['from'];
$subject = $_POST['subject'];
$msg = $_POST['msg'];
$cc = $_POST['cc'];
$headers = "From: ".$_POST['from']. "\r\n" ."CC:".$_POST['cc']. "\r\n" ."Content-Type: text/html; charset=iso-8859-1\n";
$file_tmp_name = $_FILES['file']['tmp_name'];
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $file_error = $_FILES['file']['error'];
       if($file_error > 0)
    { 
if(mail($to,$subject,$msg,$headers))
echo "<script type='text/javascript'>alert('Your message was successfully sent');</script>";
        else
        echo "<script type='text/javascript'>alert('Your message was not sent.Please try the alternative link');</script>";
    }
else{
    //read from the uploaded file & base64_encode content for the mail
    $handle = fopen($file_tmp_name, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $encoded_content = chunk_split(base64_encode($content));

        $boundary = md5("sanwebe");
        //header
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "From:".$from."\r\n";
        $headers .= "CC:".$cc."\r\n";
        $headers .= "Reply-To: ".$to."" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
        
        //plain text 
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        $body .= chunk_split(base64_encode($msg)); 
        
        //attachment
        $body .= "--$boundary\r\n";
        $body .="Content-Type: $file_type; name=".$file_name."\r\n";
        $body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
        $body .="Content-Transfer-Encoding: base64\r\n";
        $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
        $body .= $encoded_content;
        if(mail($to,$subject,$body,$headers))
        echo "<script type='text/javascript'>alert('Your message was successfully sent');</script>";
        else
        echo "<script type='text/javascript'>alert('Your message was not sent.Please try the alternative link');</script>";
}
}
?>
<br>
<label for="fromemailAddress"><b><font color="red"><sup>*</sup></font>From:</b></label>
<input type="email" placeholder="abc@xyz.com" name="from" id="fromemailAddress" required><br>
<label for="toemailAddress"><b><font color="red"><sup>*</sup></font>To:</b></label>
<input type="text" placeholder="abc@xyz.com,pqr@xyz.com" name="to" id="toemailAddress" required><br>
<label for="cc"><b>CC:</b></label>
<input type="text" placeholder="abc@xyz.com" name="cc" id="cc">
<label for="subject"><b>Subject</b></label>
<input type="text" placeholder="Enter the subject" name="subject" id="subject">
<label for="message"><b><font color="red"><sup>*</sup></font>Message:</b></label>
<textarea placeholder="You can type your message here as a plain text or you can use html also" name="msg" id="Message" required></textarea><br>
<label for="file"><b>Attachment:</b></label>
<input type="file" name="file" id="file"><br>
<p align="center">
<input id="button" type="submit" name="submit" value="Send" class="pulse-button"><br><br>
<b>Get this script on github:- <a href="https://github.com/gauravg01/phpspammer"><i class="fa fa-github" aria-hidden="true"> Click Here </i></a></b>
</fieldset>
</form>
</div>
<div id="foot"><center>© Copyright #gauravg01 | Made by Gaurav Gupta 
❤️ | All rights reserved.</center></div>
</body>
</html>
