<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-7" />



<html>
<head><title></title>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/el_GR/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</head>
<body>
<?php
	require_once('lib/news.php');
	function Source($source1){
		$url = parse_url($source1,PHP_URL_HOST);
		return $url;
		
	
	}
	$GLOBALS['category'] = ($_GET['q']);
	$cate = $GLOBALS['category'];
	$id = $_GET['q'];
    $result = mysql_query("select n.category from nea n where n.ID={$id}");
	$values = mysql_fetch_array($result);
	while($row =  mysql_fetch_assoc($result))
	echo $row['category'];
	$cat = getnewsfromID($GLOBALS['category']);
	$count = mysql_num_rows(mysql_query("select * from comments c  where c.n_id = {$cate}"));
	//$cat2 = getimages();

	while($row = mysql_fetch_array($cat)) {
	
?>
	<?php echo  '<table   style="background-color:#F0F0F0;">' .  '<tr>' .'<td style="width:52%">' . "". " " . getDateandHour(strtotime($row['Time'])).'</td>' .'<td>'."Σχόλια(".$count.")".'</td>' .  '<td align = "center">' . 'Κατηγορία :'  . ' ' ?><a style="background-color:#f0f0f0;" title="Κλικ για περισσότερα νέα " href="index.php?p=allnews"><?php echo getcat($row['category']); ?></a><?php echo '</td>' . '<td>'  ?><a style="background-color:#F0F0F0;" href="index.php?p=descriptions&q=<?php echo $row['ID']; ?>">A</a> &nbsp; <a style="background-color:#F0F0F0;font-size:medium;" href="index.php?p=descriptions&q=<?php echo $row['ID']; ?>&link">A</a>  <?php echo   '</td>'.'</tr>' . '</table>' ; ?>
	<?php echo "<img style='border: 2px solid #f0f0f0;' src='".$row['Eikona'].  "'width=100% height =350px </img>" . '<br>' ;
?>	
	<?php 
	if (isset($_GET['link'])){
	echo  '<table style="background-color:#F0F0F0;font:20px/21px Arial,tahoma,sans-serif;">' .  '<tr>' . '<td>' . $row['Keimeno']  . '<br>' . '<br>' ?> <a style="background-color:#F0F0F0;" href="<?php echo $row['source']; ?>"><?php echo Source($row['source']); ?></a> <?php echo '</td>' . '</tr>' . '</table>'; 
	}
	else
	if (!isset($_GET['link']))
	
	echo  '<table style="background-color:#F0F0F0;font:15px/21px Arial,tahoma,sans-serif;">' .  '<tr>' . '<td>' . $row['Keimeno']  . '<br>'.   '<br>' ?> <a style="background-color:#F0F0F0;" href="<?php echo $row['source']; ?>"><?php echo Source($row['source']); ?></a> <?php echo '</td>' . '</tr>' . '</table>'; ?>
	
	

<?php } ?>

<?php 

$id = $_GET['q'];
$result = mysql_query("select * from images where images.i_ID = {$id}");
while($row = mysql_fetch_assoc($result)){

	echo "<img style='border: 2px solid #f0f0f0;' src='".$row['image'].  "'width=100% height =100% </img>" . '<br>' ;


?>


<?php }?>

<?php

$id = $_GET['q'];
$result = mysql_query("select * from videos where videos.n_ID = {$id}");

while($row = mysql_fetch_assoc($result)){
	
?>

<iframe width="100%" height="350" src="https://www.youtube.com/embed/<?php echo $row['video']?>" frameborder="0" allowfullscreen></iframe>
<br>
<?php } ?>
<?php 

if (isset($_POST['submit'])){
$name = $_POST['name'];
$mail = $_POST['email'];
$text = $_POST['comment'];
$image = $_POST['image'];
$q = $_GET['q'];
$ip = get_client_ip();
$localip =  gethostbyname(trim(`hostname`));
if ($name != null && $mail !=null && $text !=null){
if ($localip)
mysql_query("insert into comments(n_id,Name,Email,Textc,image,IP) Values('$q','$name','$mail','$text','$image','$localip')");
else
mysql_query("insert into comments(n_id,Name,Email,Textc,image,IP) Values('$q','$name','$mail','$text','$image','$ip')");
//echo '<p style = "font-family:Cambria;"> '."επιτυχής καταχώρηση" . "</p>";


$rpage = $_SERVER['HTTP_REFERER'];
 echo "<script>alert('επιτυχής καταχώρηση');</script>";
 echo "<script>window.setTimeout(function() {window.location = '$rpage' }, 3000);</script>";
}
else{
echo "Παρακαλώ συμπληρώστε όλα τα πεδία" ;


}
}
?>
<?php $GLOBALS['category'] = ($_GET['q']);
$cat = getnewsfromID($GLOBALS['category']);

while($row = mysql_fetch_array($cat)){
?>
<br>
<div id="respond">
        <form action="index.php?p=descriptions&q=<?php echo $row['ID']; ?>" method="post">
          <p>
            <input type="text" name="name" id="name" value="" size="22" />
            <label for="name"><small style="color:#3399FF;font:12px/21px Arial,tahoma,sans-serif; font-family:Cambria;">Όνομα</small></label>
          </p>
          <p>
            <input type="text" name="email" id="email" value="" size="22" />
            <label for="email"><small style="color:#3399FF;font:12px/21px Arial,tahoma,sans-serif; font-family:Cambria;">Email&nbsp;&nbsp;&nbsp;(Δεν δημοσιεύεται)</small></label>
          </p>
          <p>
            <textarea name="comment" id="comment" style="width:100%"  cols="100%" rows="10"></textarea>
            <label for="comment" style="display:none;"><small>Comment (required)</small></label>
          </p>
          <p>
          <input name="image"  type="hidden" value="images/demo/avatar.gif" >
          </p>
           <p>
           <input name="submit" type="submit" value="Δημοσίευση"  style="font:12px/21px Arial,tahoma,sans-serif; font-family:Cambria" id="submit" >
         </p>
        </form>
      </div>
<?php }?>
 <?php 

	$desc = $_GET['q'];
	$query = mysql_query("select * from comments where comments.n_id ={$desc}  Order by id desc");
	while($row = mysql_fetch_array($query)){


	$name = $row['Name'];
	$text = $row['Textc'];
	


    ?>
	<meta property="og:site_name" content="http://www.etidings.com"/>
	<meta property="og:type" content="article" />
	<meta property="article:author" content="echo 'από e-tidings'" />
	

       <div id="comments">
        <ul class="commentlist">
          <li class="comment_even" style="width:607px">
            <div class="author"><img class="avatar" src="<?php echo $row['image']; ?>" width="32" height="32" alt="" ><span class="name" style="color:#3399FF;">O <?php echo $row['Name']; ?></span> <span class="wrote">έγραψε:</span></div>
            <div class="submitdate" style="color:#3399FF;"><?php echo getDateandHour(strtotime($row['Date2']));?></div>
            <p><?php echo $row['Textc'];?></p>
          </li>
</ul>
</div>
<?php }?>
<br><br>
<div class="fb-like" data-layout="button_count" data-href="<?php echo $_SERVER['REQUEST_URI']; ?>"  data-action="like" data-show-faces="true" data-share="true"></div>
</body>
</html>