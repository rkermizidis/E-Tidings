<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-7" />

<?php
require_once('connectiondb.php');
$connect = connecttoDB();

mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $connect);
include_once('../lib/users.php');
include_once('../lib/news.php');

	if(isset($_POST['submit'])) {
	
		
		$title	 = $_POST['titlos'];
		$small_text = $_POST['small_text'];
		$keimeno = $_POST['keimeno'];
		$eikona = $_POST['eikona'];
		$categoria = $_POST['category'];
		$url = $_POST['url'];
		$source = $_POST['source'];
		
			if ( $title == ""  || $small_text == "" || $keimeno == "" || $eikona == "" || $categoria == ""   ){
			 		
			 		echo "συμπλήρωσε όλα τα πεδία";
					$ref = $_SERVER['HTTP_REFERER'];
					header('refresh: 3; url=' . $ref);
		
			
			}
else				if (isset($_POST['checkbox'])){
					
					
					
					
					

					insertnews($title,$small_text,$keimeno,$eikona,$categoria,$url,$source);
					$counternea  = mysql_num_rows(getcountnea());
					echo $counternea;
					insertimpnews($title,$small_text,$keimeno,$eikona,$categoria,$counternea,$url,$source);
					echo "add successfull";
					$ref = $_SERVER['HTTP_REFERER'];
					header('refresh: 3; url=' . $ref);

		}
		else
		{
		insertnews($title,$small_text,$keimeno,$eikona,$categoria,$url,$source);
		echo "add successfull";
		$ref = $_SERVER['HTTP_REFERER'];
		header('refresh: 3; url=' . $ref);


		}
		
		
		?>


<?php 

}?>

<div><?php echo '<b><u>' . "Διάβασε προσεκτικά τις παρακάτω οδηγίες για σωστή καταχώρηση αρθρων" . '</u>' . '</b>' ?></div>
<div><?php $counterID = mysql_num_rows(getcountnea()); echo '1)'.' '. "Στη βάση μας υπάρχουν αυτή τη στιγμή:" . ' ' . $counterID . ' ' . "εγγραφές." . ' ' . '<b>' . ' Καταχωρείς  την' . ' ' .$c = $counterID+1 . ' ' . 'εγγραφή' . '</b>';   ?></div>
   

<form name="form" action="insert.php" method="post" enctype="multipart/form-data">
<h4><strong style="color:#3399FF">Ει</strong>σαγωγή <strong  style="color:#3399FF">
Α</strong>ρθρου</h4>
<fieldset style="width:200px" >
<legend>**********************************</legend>
	<label style="border:thin;margin:5px">Titlos</label>
	<textarea name="titlos" rows="2" style="width: 566px"></textarea><br>

	<label style="border:thin;margin:5px">Small_Text</label><br>
	<textarea name="small_text" style="width: 566px; height: 136px;"></textarea><br>

	<label style="border:thin;margin:5px">Keimeno</label>
	<textarea name="keimeno" style="width: 566px; height: 380px;"></textarea><br>

	<label style="border:thin;margin:5px">Eikona</label>
	<br><input name="eikona" type="text" value="images/imagefornews/"  style="width:566px" ><br>

	<label style="border:thin;margin:5px">Kathgoria</label>
	<input name="category" type="text"  style="width:566px" >
	
	Σημαντικό<input name="checkbox" type="checkbox" ><br>
	<label style="border:thin;margin:5px">url</label>
	<input name="url" type="text" style="width:566px;" />
	
	<label style="border:thin;margin:5px">Πηγή</label>
	<input name="source" type="text" style="width:566px;" />

	
	<p align="center"><input  type="submit"  name="submit" value="Eisagwgh" style="width:100px"/></p>

	

	
</fieldset>
</form>


</html>
