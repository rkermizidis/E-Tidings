
<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-7" />
<?php
	
$emailErr ="";
$nameErr = "";
$email  = "";
$fname = "";
$name = "";
if(isset($_POST['submit'])) {
	
     if (empty($_POST["fname"])) {
     $nameErr = "Το πεδίο όνομα είναι υποχρεωτικό";
   } else {
     $name = test_input($_POST["fname"]);
    
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Μόνο γράμματα και κενά επιτρέπονται"; 
          
     }
   }
		

      if (empty($_POST["email"])) {
     $emailErr = "Το πεδίο email είναι υποχρεωτικό";
   } else {
     $email = test_input($_POST["email"]);
     
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Δώσε σωστό format για το email"; 
     
   
            }
            }
            
	if (filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("/^[a-zA-Z ]*$/",$name) && !empty($_POST['fname'])){
	  $name = $_POST['fname'];
      insertUser($name, $email);
      $rpage = $_SERVER['HTTP_REFERER'];
      echo '<script>alert("επιτυχής καταχώρηση");</script>';
      echo "<script>window.setTimeout(function() {window.location = '$rpage' }, 2000);</script>";           
    }
    }
     
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<style>
#name{
	width:250px;
	height:21px;
}
#email{
	width:250px;
	height:21px;
}
#submit{
	width:150px;
	height:70px;
}


</style>

<h4 ><strong style="color:#3399FF">Δ</strong>ωρεάν <strong  style="color:#3399FF">Ε</strong>γγραφή</h4>
<form action="index.php?p=register" method="post">

<table  style="width:300px; background-color:#F0F0F0;">
<tr>
<td style="font-family:Arial, Helvetica, sans-serif;font-size:small;">Όνομα:</td>
<td ><input name="fname" type="text" id="name" placeholder="Το όνομα σας " ></td>
<p style="color:#3399FF;" ><?php echo  $nameErr; ?></p>
</tr>
<tr>
<td style="font-family:Arial, Helvetica, sans-serif;font-size:small;">E-mail:</td>
<td><input name="email" type="text" id="email" placeholder="το e-mail σας" /></td>
<p style="color:#3399FF;"><?php echo  $emailErr; ?></p>
</tr>

</table>

<input name="submit" type="submit" value="Καταχώρηση" id="submit" />


</form>
</html>
