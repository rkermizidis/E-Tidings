<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-7"  />
<title></title>
</head>
<style>

.pic{
	width:190px;
	height:120px;
}
.picbig{
	position:absolute;
	width:0px;
	-webkit-transition:width 0.3s linear 0s;
	transition:width 0.3s linear 0s;
	z-index:10px;
}
.pic:hover + .picbig{
	width:400px;
}

</style>


<?php



	
		if (isset($_POST['search'])){
	
		$searchq = $_POST['search'];
		
	 //	$searchq = preg_replace("/[^a-z0-9\xC0-\xD6\xD8-\xF6\xF8-\xFF]+/i", '', $searchq);
				
		$query = mysql_query("SELECT * FROM nea where Titlos_arthrou LIKE '%".$searchq."%' or Small_text Like '%".$searchq."%' order by ID desc") or die("could not search");
		$s = getcountnea();
		$counter = mysql_num_rows($s);
		
		$count = mysql_num_rows($query);
		echo '<h2>' . "Αναζήτηση για:". $searchq . " " . "Αποτελέσματα (" . $count . ")" . '</h2>';
		if ($searchq == " " || $count == 0){
		echo '<h2>' ."Δεν βρέθηκαν αποτελέσματα" . '</h2>';
		}else{
				
				while($row = mysql_fetch_array($query)){
		
		?>

	<table>
	<tr>
	<td><a href="index.php?p=descriptions&q=<?php echo $row['ID'];?>"><?php echo $row['Titlos_arthrou'] ; ?></a></td>
	</tr>
	</table>
	<table border="2">
	<tr>
	
	<td style="width:190px;"><img src="<?php  echo  $row['Eikona'] ?>" class="pic" alt="icon"/><img src="<?php  echo  $row['Eikona'] ?>" alt="icon" class="picbig"/></td>
	<td ><?php echo  $row['Small_text'] . " " . '<a href = "index.php?p=descriptions&q=' . $row['ID'] .  '">Διάβασε περισσότερα</a>' ;  ?></td>
	</tr>
	
	<tr>
	<td align="center"><?php echo   getDate2(strtotime($row['Time'])) ?></td>
	</tr> 
	</table>
	
	<table style="width:300px;height:12px;">
	<tr >
	
	
</tr>
</table>

<?php }}} ?>
