<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Εισαγωγή video</title>
</head>

<body>

<?php

require_once('connectiondb.php');
$connect = connecttoDB();
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $connect);
require_once('../lib/users.php');
require_once('../lib/news.php');


		if(isset($_POST['submit'])) {
	
		
		
		$n_id	= $_POST['n_id'];
		$link = mysql_real_escape_string($_POST['video']);
		$new_link = substr($link,17);
		
		if ($n_id != " " && $new_link!= " "){
		insertvideo($n_id,$new_link);
		echo "επιτυχής καταχώρηση";
		header('refresh:3; url=' . $_SERVER['HTTP_REFERER']);
		}

		


}
	
?>
	
<div><?php echo '<b><u>' . "Διάβασε προσεκτικά τις παρακάτω οδηγίες για σωστή προσθήκη video" . '</u>' . '</b>' ?></div>
<div><?php $counterID = mysql_num_rows(getcountnea()); echo '1)'.' '. "Στη βάση μας υπάρχουν αυτή τη στιγμή:" . ' ' . $counterID . ' ' . "εγγραφές." . ' ' . '<b>' . ' Καταχωρησε video για   την' . ' ' .$c = $counterID. ' ' . 'εγγραφή' . " " .  '</b>';   ?></div>


	<form method="post" action="insertvideo.php" >
	
	<table>
	<tr>
	<td>ID εγγραφής</td>
	<td><input name="n_id" size="5" type="text"  /></td>
	</tr>
	<tr>
	<td>Video</td>
	<td><input name="video" size="40" type="text"  /></td>
	</tr>
	<tr>
	<td ><input name="submit" type="submit" value="submit" /></td>
	</tr>
	</table>
	</form>	

</body>

</html>
