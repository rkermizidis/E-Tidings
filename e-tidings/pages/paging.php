<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-7" />

<html>
<head>
<title>Paging in php</title>
</head>
<?php 
session_start();
require_once('connectiondb.php');
$connect = connecttoDB();
include('../lib/news.php');
if ($_GET['c'] == 1){
$sql = "SELECT COUNT(ID) FROM nea where nea.category = 1 ";
$query = mysql_query($sql);
$row = mysql_fetch_row($query);

$rows = $row[0];

$page_rows = 3;
// This tells us the page number of our last page
$last = ceil($rows/$page_rows);
// This makes sure $last cannot be less than 1
if($last < 1){
	$last = 1;
}
// Establish the $pagenum variable
$pagenum = 1;
// Get pagenum from URL vars if it is present, else it is = 1
if(isset($_GET['pn'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
// This makes sure the page number isn't below 1, or more than our $last page
if ($pagenum < 1) { 
    $pagenum = 1; 
} else if ($pagenum > $last) { 
    $pagenum = $last; 
}
// This sets the range of rows to query for the chosen $pagenum
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
// This is your query again, it is for grabbing just one page worth of rows by applying $limit
$sql = "SELECT * FROM nea where category = 1 order by id desc  $limit ";
$query = mysql_query($sql);
// This shows the user what page they are on, and the total number of pages
$textline1 = "τεστ(<b>$rows</b>)";
$textline2 = "σελίδα <b>$pagenum</b> από <b>$last</b>";
// Establish the $paginationCtrls variable
$paginationCtrls = '';
// If there is more than 1 page worth of results
if($last != 1){
	/* First we check if we are on page one. If we are then we don't need a link to 
	   the previous page or the first page so we do nothing. If we aren't then we
	   generate links to the first page, and to the previous page. */
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
		// Render clickable number links that should appear on the left of the target page number
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
			}
	    }
    }
	// Render the target page number, but without it being a link
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
	// Render clickable number links that should appear on the right of the target page number
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}
	// This does the same as above, only checking if we are on the last page, and then generating the "Next"
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
    }
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
	<td style="width:190px;"><?php  echo  "<img src='".$row['Eikona']."'width=190px height = 120px" ?></td>
	<td ><?php echo  $row['Small_text'] . " " . '<a href = "index.php?p=descriptions&q=' . $row['ID'] .  '">Διάβασε περισσότερα</a>' ;  ?></td>
	</tr>
	
	<tr>
	<td align="center"><?php echo   getDate2(strtotime($row['Time'])) ?></td>
	</tr> 
	</table>
	<?php 

		
	//$list .= '<p><a href="paging.php?id='.$row['ID'].'">'.$row['Titlos_arthrou'].' </a></p>';
}
}
mysql_close($connect);
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
div#pagination_controls{font-size:21px;}
div#pagination_controls > a{ color:#06F; }
div#pagination_controls > a:visited{ color:#06F; }
</style>
</head>
<body>
<div>
  <h2><?php echo $textline1; ?> Εγγραφές</h2>
  <p><?php echo $textline2; ?></p>
  <p><?php echo $list; ?></p>
  <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
</div>
</body>
</html>
