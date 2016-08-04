<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-7" />

<html xmlns="http://www.w3.org/1999/xhtml">
  
 <head>
  
<title></title>
<style>
#name{
	width:250px;
	height:21px;
}
#email{
	width:250px;
	height:21px;
}

#message{
	width:460px;
	height:130px;
}
#submit{
	width:150px;
	height:70px;
}


</style>
</head>
<body>

<?php 
if (isset($_POST['submit'])){
$name = $_POST['onoma'];
$email  = $_POST['email'];
$message = $_POST['message'];


  
                if (empty($name) || empty($email) || empty($message) ){
                echo "<p style = 'font-family:Arial, Helvetica, sans-serif;font-size:small;'>παρακαλώ συμπληρώστε όλα τα πεδία</p>";
                echo "<script>window.setTimeout(function() {window.location = 'index.php?p=contact' }, 1500);</script>";

                }else
                {
               $to = 'info@e-tidings.com'; 
               $msg = 'Name:' . $name . '\n'
               . 'E-mail:' . $email . '\n' 
               . 'Message:' . $message . '\n' ;
              
               mail($to,$email,$msg);
               echo "<p style = 'font-family:Arial, Helvetica, sans-serif;font-size:small;'>Επιτυχής αποστολή</p>";
               echo "<script>window.setTimeout(function() {window.location = 'index.php?p=contact' }, 1500);</script>";

                              
            	} 
            	          
                            


?>
	<?php }?>
	<form name="form1" method="post" action="index.php?p=contact">
 	<table style="width:250px; background-color:#F0F0F0;">
 	<tr>
 	<td style="font-family:Arial, Helvetica, sans-serif;font-size:small;" >Όνομα:</td>
 	<td><input name="onoma" type="text" placeholder="Το όνομα σας" id="name" />*</td>
 	</tr>
 	<tr>
 	<td style="font-family:Arial, Helvetica, sans-serif;font-size:small;">E-mail:</td>
 	<td><input name="email" type="text"placeholder="Το e-mail σας" id="email" />*</td>
 	</tr>
	<tr>
 	<td style="font-family:Arial, Helvetica, sans-serif;font-size:small;">Μήνυμα:</td>
 	<td>
	<textarea name="message" placeholder="Το μήνυμα σας" id="message" ></textarea></td>
 	</tr>

 	</table>
 	<input name="submit" type="submit" value="Αποστολή" id="submit" />
 	</form>
 	</body>

</html>
