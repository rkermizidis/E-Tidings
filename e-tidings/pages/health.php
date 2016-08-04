<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-7" />

<html>
<head><title></title>
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


<body>

<?php
$cat = $_GET['c'];
$category = getnewsfromcategory($cat);

$sql = "SELECT COUNT(id) FROM nea n where n.category = 4 ";



$query = mysql_query($sql);
$row = mysql_fetch_row($query);

$rows = $row[0];

$page_rows = 3;

$last = ceil($rows/$page_rows);

if($last < 1){
	$last = 1;
}
$pagenum = 1;

if(isset($_GET['pn'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}

if ($pagenum < 1) { 
    $pagenum = 1; 
} else if ($pagenum > $last) { 
    $pagenum = $last; 
}

$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
$sql = "SELECT * FROM nea n where n.category = 4 order by ID desc  $limit ";
$query = mysql_query($sql);
$textline1 = "τεστ(<b>$rows</b>)";
$textline2 = "σελίδα <b>$pagenum</b> από <b>$last</b>";
$paginationCtrls = '';
if($last != 1){
		if ($pagenum > 1) {
        $previous = $pagenum - 1;
       
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?p=health&c=4'.'&pn='.$previous.'">Προηγούμενο</a> &nbsp; &nbsp; ';
				
				for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?p=health&c=4&pn='.$i.'">'.$i.'</a> &nbsp; ';
			}
	    }
    }
		$paginationCtrls .= ''.$pagenum.' &nbsp; ';
	
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?p=health&c=4&pn='.$i.'">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?p=health&c=4&pn='.$next.'">Επόμενο</a> ';
    
}



$list = '';

while($row = mysql_fetch_array($query)){
	

?>

	<table>
	<tr>
	<td><a href="index.php?p=descriptions&q=<?php echo $row['ID'];?>"><?php echo $row['Titlos_arthrou'] ; ?></a></td>
	</tr>
	</table>
	<table border="2">
	<tr>
	<td style="width:190px;"><img src="<?php  echo  $row['Eikona'] ?>" class="pic" alt="icon"><img src="<?php  echo  $row['Eikona'] ?>" alt="icon" class="picbig"></td>
	<td ><?php echo  $row['Small_text'] . " " . '<a href = "index.php?p=descriptions&q=' . $row['ID'] .  '">Διάβασε περισσότερα</a>' ;  ?></td>
	</tr>
	
	<tr>
	<td align="center"><?php echo   getDate2(strtotime($row['Time'])) ?></td>
	</tr> 
	</table>
	<?php } ?>
	<table style="width:300px;height:12px;">
	<tr >
	
	
</tr>
</table>
<style type="text/css">
div#pagination_controls{font-size:12px;}
div#pagination_controls > a{ color:#06F; }
div#pagination_controls > a:visited{ color:#3399ff; }

</style>
<body>
<div>

  <!-- <p><?php echo $textline2; ?></p>-->
  <p><?php echo $list; ?></p>
  <div  id="pagination_controls"><?php echo '<table><tr><td>' . $paginationCtrls . '</td><td style="color:#3399FF">'.$textline2.'</td></tr></table>' ?></div>

<?php 

}?>
</div>
</body>
</html>