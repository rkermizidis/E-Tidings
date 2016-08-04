<?php 

function loginAdmin($email, $password) {
$email_db = mysql_query("select * from customer where customer.email = " . $email);
$passdb = mysql_query("select * from customer where customer.password = " . $password);

		if(($email) && ($passdb)) {
		
			$_SESSION['userID'] = "admin";
			return true;
		} else {
		
			$result = mysql_query("SELECT * FROM customer WHERE Email = '$email' AND Password = '$password';");
			
			$rows = mysql_num_rows($result);
			
			if($rows == 1) {
			
				$row = mysql_fetch_array($result);
				
				$_SESSION['userID'] = $row['Username'];

				return true;
			} else {
			
				return false;
			}	
		}
}


$found = loginAdmin($_POST['email'], $_POST['password']);
if($found) {
	echo "<script>window.setTimeout(function() {window.open('http://www.e-tidings.com/pages/insert.php', '_blank'); }, 3000);</script>";
	echo "<script>window.setTimeout(function() {window.open('http://www.e-tidings.com/pages/insertvideo.php', '_blank'); }, 3000);</script>";
	echo "<script>window.setTimeout(function() {window.open('http://www.e-tidings.com/pages/insertimages.php', '_blank'); }, 3000);</script>";
    echo "Καλωσήρθες:" . " " . $_SESSION['userID'];
    

}
 else {
	echo "Λάθος email ή κωδικός πρόσβασης";
	 echo "<script>window.setTimeout(function() {window.location = 'index.php?p=loginform' }, 2000);</script>";

	
	}
?>