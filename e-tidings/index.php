<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
session_start();
require_once('pages/connectiondb.php');
$connect = connecttoDB();
require_once('lib/users.php');
require_once('lib/news.php');
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=" />
<head>



<?php 

if (isset($_GET['p'])){
	if ($_GET['p'] == 'descriptions'){
	$GLOBALS['category'] = ($_GET['q']);
	$cat = getnewsfromID($GLOBALS['category']);
	while($row = mysql_fetch_array($cat)) {


?>
<meta property="og:image"  content="<?php echo $row['Eikona']; ?>" />
<meta property="og:image:width" content="200" />
<meta property="og:image:height" content="200" />
<link rel="image_src" href="http://www.e-tidings.com/images/imagefornews/<?php  echo $row['Eikona'];?>" />
<meta property="og:image:secure_url" content="http://www.e-tidings.com/images/imagefornews/<?php  echo $row['Eikona'];?>" />
<meta property="og:description"  content="<?php echo $row['Keimeno'] ?>" />
<meta property="og:href"     name="E-tidings"      content="http://www.e-tidings.com/index.php?p=descriptions&q=<?php echo $row['ID'] ?> " />
<meta property="og:data-href"  content="http://www.e-tidings.com/" />

<?php }}}?>





<title><?php   $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; if(isset($_GET['q'])){ $a = gettitle(); echo $a . " " . "|" . " " . "e-Tidings.com"  ;}else if (isset($_GET['c'])){ $b = gettitle2();echo $b . " " ." | e-Tidings" ;}else if (isset($_GET['p'])){$a = gettitlefromlinks();echo $a ;} else if ($_SERVER['REQUEST_URI'])   echo "e-Tidings: Online έγκυρη και έγκαιρη ενημέρωση"; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="images/demo/e_tidings_logo.png"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-7" />
<meta name="keywords" content="Είδηση εγκυρότητα Ελλάδα εξωτερικό παιδεία τεχνολογία υγεία "/>
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<link href="menus/styles.css" rel="stylesheet" type="text/css" />
<link href="layout/styles/style.css" rel="stylesheet" type="text/css" />
<link href="layout/styles/menus_top_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script language="javascript" src="js/methods.js"></script>
<script language="javascript" src="js/colors.js"></script>




<!-- Homepage Specific -->
<script type="text/javascript" src="layout/scripts/galleryviewthemes/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="layout/scripts/galleryviewthemes/jquery.timers.1.2.js"></script>
<script type="text/javascript" src="layout/scripts/galleryviewthemes/jquery.galleryview.2.1.1.min.js"></script>
<script type="text/javascript" src="layout/scripts/galleryviewthemes/jquery.galleryview.setup.js"></script>
<!-- / Homepage Specific -->
<meta name="description" content="Καλώς ορίσατε στο e-tidings,εδώ θα βρείτε νέα για όλα τα θέματα,online ενημέρωση με ένα κλικ"/>
</head>
<body id="top" onload="startTime(),myfun()"  >
<div class="wrapper col0">
 <div id="topline" >
 <li><input type="image" id="email_index"  src="images/demo/email OMC.png" ></input>&nbsp;&nbsp;&nbsp;&nbsp;<a id="mailtext" style="font-size:medium;margin:-2px;padding:2px;" title="επικοινώνισε μαζί μας" href="mailto:info@e-tidings.com">info@e-tidings.com</a></li>
 <input id="demotext" type="image" src="images/demo/calendar_scheduled-512.png"></input>&nbsp;&nbsp;&nbsp;&nbsp;<li id="demo"><?php dateandtime(); ?></li>
 <input id="clocktext" type="image" src="images/demo/watch_wristwatch_clock_time_flat_icon-512.png"></input>&nbsp;&nbsp;<li id="clock" onload="startTime()"></li>
 <li id="textweather"><input id="weather" type="image" src="images/demo/weather_icon.gif" >&nbsp;&nbsp;</input><a href="index.php?p=weather">&nbsp;&nbsp;&nbsp;Καιρός</a></li>
 <li id="textagwnes"><input type="image" id="agwnesli" src="images/demo/Football-App-Icon.jpg">&nbsp;&nbsp;</input><a href="index.php?p=footballlive">&nbsp;&nbsp;&nbsp;Αγώνες</a></li>
 <li id="textagwnes"><a href="index.php?p=ekloges">Εκλογές Live</a></li>
<!-- <li id="textlogin"><a href="index.php?p=loginform">Είσοδος</a></li>-->
<br class="clear" />
    </div>
	 
	  	      	    	      
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="header">
    <div class="fl_left">
      <h1  title="ενημερωνόμαστε-σχολιάζουμε-συμμετέχουμε"><a href="http://www.e-tidings.com/"><strong>e</strong>-<strong>T</strong>idings</a></h1>
      <p  style="color:#999999;font-size:small"><strong style="color:#3399FF">ε</strong>ίδηση που αντιπροσωπεύει το <strong style="color:#3399FF">σ</strong>ήμερα</p>
    </div>
    <div class="fl_right" ><img src="images/demo/Fotor0701153214.jpg" id="img1" ></img>
		</div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
      
        <li class="active"><a href="index.php">Η Αρχικη μου</a></li>
        <li><a href="index.php?p=education&c=5&pn=1">παιδεια</a></li>
               <li><a href="#">πολιτικη</a>
          <ul>
            <li><a href="index.php?p=news&c=<?php echo 1?>&pn=1">Ελλαδα</a></li>
            <li><a href="index.php?p=world&c=<?php echo 2;?>&pn=1">Κοσμος</a></li>
			
			
            
          </ul>
        </li>
         

        <li><a href="index.php?p=culture&c=3&pn=1">πολιτισμος</a></li>
        <li class="last"><a href="index.php?p=athlete&c=6&pn=1">ΑΘΛΗΤΙΚΑ</a></li>
        

      </ul>
    </div>
   				
		   
           <div id="search">
          
       <form action="index.php?p=search" method="post">
        <fieldset>
          <legend>Site Search</legend>
         
          <input type="text" name="search"  value="Αναζήτηση...."  onfocus="this.value=(this.value=='Αναζήτηση....')? '' : this.value ;" />
          <a href="index.php?p=search"><input type="image" name="go" id="go"  src="images/demo/search1.png" style="width:20px; height:16px;display:block"></input></a>
 </fieldset>
      </form>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">

  <div class="container">


    <div class="content">
   
    	<?php
    	
    		if (isset($_GET['p'])) {
	   		
	      		require('pages/'.$_GET['p'].'.php');
	   		} else {
	   		 
    	?>
    
    	<div id="featured_slide">
        
        <ul id="featurednews">
       
          <li><p><?php
    				$resultc = mysql_num_rows(getcountimpnea());
                    $getnea2= getimpnewsfromID($resultc);
                    while($row = mysql_fetch_array($getnea2)) echo "<img src='".$row['Eikona']."'width=300px height = 150px"; ?></p> 
            
            <div class="panel-overlay">
		<!--	 <p style="color:#3399ff;">&nbsp;&nbsp;&nbsp;<?php $resultc = mysql_num_rows(getcountimpnea());
                    $getnea2= getimpnewsfromID($resultc);
                    while($row = mysql_fetch_array($getnea2)) echo getDateandHour(strtotime($row['Timer']));?></p>-->
             <H2><a href="index.php?p=descriptions&q=<?php $resultc = mysql_num_rows(getcountimpnea()); $getnea2= getimpnewsfromID($resultc); while($row = mysql_fetch_array($getnea2)) echo $row['n_id'];  ?>"><?php 
             $resultc = mysql_num_rows(getcountimpnea());
             $getnea2= getimpnewsfromID($resultc);
            while($row = mysql_fetch_array($getnea2))echo '<center>'.  $row['Title'] . '</center>'; ?></a></H2>
            </div>
          </li>
          <li><p><?php 
	          $resultc = mysql_num_rows(getcountimpnea());
	          $getnea2= getimpnewsfromID($resultc-1);
 			while($row = mysql_fetch_array($getnea2)) echo "<img src='".$row['Eikona']."'width=300px height = 150px"; ?></p>
            <div class="panel-overlay">
              <h2><a href="index.php?p=descriptions&q=<?php $resultc = mysql_num_rows(getcountimpnea()); $getnea2= getimpnewsfromID($resultc-1); while($row = mysql_fetch_array($getnea2)) echo $row['n_id'];  ?>"><?php
              $resultc = mysql_num_rows(getcountimpnea());
              $getnea2= getimpnewsfromID($resultc-1);
			  while($row = mysql_fetch_array($getnea2)) echo '<center>'.  $row['Title'] . '</center>';?></a></h2>
                             
            </div>
          </li>
          <li><p><?php 
         $resultc = mysql_num_rows(getcountimpnea());
	          $getnea2= getimpnewsfromID($resultc-2);
 			while($row = mysql_fetch_array($getnea2)) echo "<img src='".$row['Eikona']."'width=300px height = 150px"; ?></p>
            <div class="panel-overlay">
              <h2><a href="index.php?p=descriptions&q=<?php $resultc = mysql_num_rows(getcountimpnea()); $getnea2= getimpnewsfromID($resultc-2); while($row = mysql_fetch_array($getnea2)) echo $row['n_id'];  ?>"><?php
              $resultc = mysql_num_rows(getcountimpnea());
              $getnea2= getimpnewsfromID($resultc-2);
			  while($row = mysql_fetch_array($getnea2)) echo '<center>'.  $row['Title'] . '</center>';?></a></h2>
                             
            </div>
          </li>
          <li><p><?php 
         $resultc = mysql_num_rows(getcountimpnea());
	          $getnea2= getimpnewsfromID($resultc-3);
 			while($row = mysql_fetch_array($getnea2)) echo "<img src='".$row['Eikona']."'width=300px height = 150px"; ?></p>
            <div class="panel-overlay">
              <h2><a href="index.php?p=descriptions&q=<?php $resultc = mysql_num_rows(getcountimpnea()); $getnea2= getimpnewsfromID($resultc-3); while($row = mysql_fetch_array($getnea2)) echo $row['n_id'];  ?>"><?php
              $resultc = mysql_num_rows(getcountimpnea());
              $getnea2= getimpnewsfromID($resultc-3);
			  while($row = mysql_fetch_array($getnea2)) echo '<center>'.  $row['Title'] . '</center>';?></a></h2>
                             
            </div>
          </li>
          <li><p><?php 
			$resultc = mysql_num_rows(getcountimpnea());
	          $getnea2= getimpnewsfromID($resultc-4);
 			while($row = mysql_fetch_array($getnea2)) echo "<img src='".$row['Eikona']."'width=300px height = 150px"; ?></p>
            <div class="panel-overlay">
              <h2><a href="index.php?p=descriptions&q=<?php $resultc = mysql_num_rows(getcountimpnea()); $getnea2= getimpnewsfromID($resultc-4); while($row = mysql_fetch_array($getnea2)) echo $row['n_id'];  ?>"><?php
              $resultc = mysql_num_rows(getcountimpnea());
              $getnea2= getimpnewsfromID($resultc-4);
			  while($row = mysql_fetch_array($getnea2)) echo '<center>'.  $row['Title'] . '</center>';?></a></h2>
                             
            </div>
          </li>
          
          <li><p><?php 
	        $resultc = mysql_num_rows(getcountimpnea());
	          $getnea2= getimpnewsfromID($resultc-5);
 			while($row = mysql_fetch_array($getnea2)) echo "<img src='".$row['Eikona']."'width=300px height = 150px"; ?></p>
            <div class="panel-overlay">
              <h2><a href="index.php?p=descriptions&q=<?php $resultc = mysql_num_rows(getcountimpnea()); $getnea2= getimpnewsfromID($resultc-5); while($row = mysql_fetch_array($getnea2)) echo $row['n_id'];  ?>"><?php
              $resultc = mysql_num_rows(getcountimpnea());
              $getnea2= getimpnewsfromID($resultc-5);
			  while($row = mysql_fetch_array($getnea2)) echo '<center>'.  $row['Title'] . '</center>';?></a></h2>
                             
            </div>
          </li>

 		<li><p><?php 
	          $resultc = mysql_num_rows(getcountimpnea());
	          $getnea2= getimpnewsfromID($resultc-6);
 			while($row = mysql_fetch_array($getnea2)) echo "<img src='".$row['Eikona']."'width=300px height = 150px"; ?></p>
            <div class="panel-overlay">
              <h2><a href="index.php?p=descriptions&q=<?php $resultc = mysql_num_rows(getcountimpnea()); $getnea2= getimpnewsfromID($resultc-6); while($row = mysql_fetch_array($getnea2)) echo $row['n_id'];  ?>"><?php
              $resultc = mysql_num_rows(getcountimpnea());
              $getnea2= getimpnewsfromID($resultc-6);
			  while($row = mysql_fetch_array($getnea2)) echo '<center>'.  $row['Title'] . '</center>';?></a></h2>
                             
            </div>
          </li>

 		<li><p><?php 
	        $resultc = mysql_num_rows(getcountimpnea());
	          $getnea2= getimpnewsfromID($resultc-7);
 			while($row = mysql_fetch_array($getnea2)) echo "<img src='".$row['Eikona']."'width=300px height = 150px"; ?></p>
            <div class="panel-overlay">
              <h2><a href="index.php?p=descriptions&q=<?php $resultc = mysql_num_rows(getcountimpnea()); $getnea2= getimpnewsfromID($resultc-7); while($row = mysql_fetch_array($getnea2)) echo $row['n_id'];  ?>"><?php
              $resultc = mysql_num_rows(getcountimpnea());
              $getnea2= getimpnewsfromID($resultc-7);
			  while($row = mysql_fetch_array($getnea2)) echo '<center>'.  $row['Title'] . '</center>';?></a></h2>
                             
            </div>
          </li>

 		<li><p><?php 
	         $resultc = mysql_num_rows(getcountimpnea());
	          $getnea2= getimpnewsfromID($resultc-8);
 			while($row = mysql_fetch_array($getnea2)) echo "<img src='".$row['Eikona']."'width=300px height = 150px"; ?></p>
            <div class="panel-overlay">
              <h2><a href="index.php?p=descriptions&q=<?php $resultc = mysql_num_rows(getcountimpnea()); $getnea2= getimpnewsfromID($resultc-8); while($row = mysql_fetch_array($getnea2)) echo $row['n_id'];  ?>"><?php
              $resultc = mysql_num_rows(getcountimpnea());
              $getnea2= getimpnewsfromID($resultc-8);
			  while($row = mysql_fetch_array($getnea2)) echo '<center>'.  $row['Title'] . '</center>';?></a></h2>
                             
 
            </div>
          </li>

 		<li><p><?php 
	         $resultc = mysql_num_rows(getcountimpnea());
	          $getnea2= getimpnewsfromID($resultc-9);
 			while($row = mysql_fetch_array($getnea2)) echo "<img src='".$row['Eikona']."'width=300px height = 150px"; ?></p>
            <div class="panel-overlay">
              <h2><a href="index.php?p=descriptions&q=<?php $resultc = mysql_num_rows(getcountimpnea()); $getnea2= getimpnewsfromID($resultc-9); while($row = mysql_fetch_array($getnea2)) echo $row['n_id'];  ?>"><?php
              $resultc = mysql_num_rows(getcountimpnea());
              $getnea2= getimpnewsfromID($resultc-9);
			  while($row = mysql_fetch_array($getnea2)) echo '<center>'.  $row['Title'] . '</center>';?></a></h2>
                             
        
            </div>
          </li>
 
        </ul>
      </div>
      
      <?php } ?>
    </div>
       
    
   <!-- <h2  align="center"   style="margin-left:658px; background:silver"><strong style="color:#3399FF">Δ</strong>ημοφιλέστερα <strong style="color:#3399FF">ά</strong>ρθρα</h2>
   --> <div class="column">
    <!--<div></div>-->
      <ul class="latestnews">
      
    
          <li  style="background:#F0F0F0;"><?php $GLOBALS['z'] = getpolitics();  
             	while($row = mysql_fetch_array( $GLOBALS['z'])){ echo "<img  src='".$row['Eikona']."'width=100px height = 100px";?>      
             	 <p><strong ><a href="index.php?p=descriptions&q=<?php
                  echo $row['ID'] ;  ?>">
				<?php 
			      echo  "<p style = 'background:#F0F0F0;'>" . $row['Titlos_arthrou']  . "</p>".'<br>' ; ?>          
		 </a><?php ?></strong>
		 
		 <?php        
		 }
		 ?>
		 </p>
		</li>
        <li style="background:#F0F0F0;"><?php $GLOBALS['z'] = getpolitism();  
             	while($row = mysql_fetch_array( $GLOBALS['z'])){ echo "<img src='".$row['Eikona']."'width=100px height = 100px"; ?>

          <p><strong><a href="index.php?p=descriptions&q=<?php
                  echo $row['ID'] ;  ?>">
                  <?php 
			     echo   "<p style = 'background:#F0F0F0;'>" . $row['Titlos_arthrou'] . "</p>".'<br>' ;  ?>   
                  </a></strong>
                  <?php }?>	 
		</p>
        </li>
        <li style="background:#F0F0F0;" class="last"> <?php $GLOBALS['z'] = gettechnology();  
             	while($row = mysql_fetch_array( $GLOBALS['z'])){ echo "<img src='".$row['Eikona']."'width=100px height = 100px"; ?>


          <p><strong><a href="index.php?p=descriptions&q=<?php
                  echo $row['ID'] ;  ?>">
                  <?php 
			       echo   "<p style = 'background:#F0F0F0;'>" . $row['Titlos_arthrou'] . "</p>".'<br>' ;  ?> </a></strong> 
		 <?php  } ?>
		 </p>
        </li>
        <br>
        <?php 

    if (isset($_GET['p'])){
	if ($_GET['p'] == 'descriptions'){
	$GLOBALS['category'] = ($_GET['q']);
	$cat = getnewsfromID($GLOBALS['category']);
	while($row = mysql_fetch_array($cat)){

	?>
<div style="position:relative;width:308px">
<iframe src="http://zodia123.gr/widget6_show.php?width=308&height=350&speed=2000" width="302" height="390" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0"></iframe>
<div style="position:absolute;bottom:10px;left:79px;font-family:'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;font-size:12px;color:#3399ff;font-weight:bold;background-color:f0f0f0;">
Ζώδια από το zodia123.gr
</div></div>
     <?php }}}?>
 </ul>
          </div>
   
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="adblock">
  <!--  <div class="fl_left"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
    <div class="fl_right"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>-->
    <br class="clear" />
  </div>
  <div id="hpage_cats">
    <div class="fl_left">
      <h2><a href="index.php?p=enviroment&c=7&pn=1">Περιβαλλον</a></h2>
      <?php $GLOBALS['z'] = getenvironment();  
             	while($row = mysql_fetch_array( $GLOBALS['z'])){ 
             	echo "<img src='".$row['Eikona']."'width=100px height = 100px"; ?>
             	
             	
           <p><strong><a href="index.php?p=descriptions&q=<?php
                  echo $row['ID'] ;  ?>">  <?php 
			     echo   $row['Titlos_arthrou'] . '<br>' ; ?></a></strong></p>
      <p>   <?php echo $row['Small_text']; ?>                      </p>
      <?php } ?>
    </div>
    <div class="fl_right">
      <h2><a href="index.php?p=technology&c=8&pn=1">τεχνολογια</a></h2>
      <?php $GLOBALS['z'] = gettechnology();  
             	while($row = mysql_fetch_array( $GLOBALS['z'])){ 
             	echo "<img src='".$row['Eikona']."'width=100px height = 100px"; ?>
      
      <p><strong><a href="index.php?p=descriptions&q=<?php
                  echo $row['ID'] ;  ?>">  <?php 
			     echo   $row['Titlos_arthrou'] . '<br>' ; ?></a></strong></p>
      <p>  <?php echo $row['Small_text'];?></p>
      <?php }?>
    </div>
    <br class="clear" />
    <div class="fl_left">
      <h2><a href="index.php?p=health&c=4&pn=1">Υγεια</a></h2>
     <?php $GLOBALS['z'] = gethealth();  
             	while($row = mysql_fetch_array( $GLOBALS['z'])){ 
             	echo "<img src='".$row['Eikona']."'width=100px height = 100px"; ?>
      <p><strong><a href="index.php?p=descriptions&q=<?php
                  echo $row['ID'] ;  ?>">  <?php 
			     echo   $row['Titlos_arthrou'] . '<br>' ; ?></a></strong></p>
      <p>  <?php echo $row['Small_text'];?></p>
      <?php }?>
    </div>
    <div class="fl_right">
      <h2><a href="index.php?p=entertainment&c=9&pn=1">Ψυχαγωγια</a></h2>
      <?php $GLOBALS['z'] = getentertainment();  
             	while($row = mysql_fetch_array( $GLOBALS['z'])){ 
             	echo "<img src='".$row['Eikona']."'width=100px height = 100px"; ?>

      <p><strong><a href="index.php?p=descriptions&q=<?php
                  echo $row['ID'] ;  ?>">  <?php 
			     echo   $row['Titlos_arthrou'] . '<br>' ; ?></a></strong></p>
      <p>  <?php echo $row['Small_text'];?></p>
      <?php }?>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
    <div class="content">
      <div id="hpage_latest">
        <a href="index.php?p=hisreltour&pn=1"><h3 style="color:#3399FF;background-color:#F0F0F0;">ΙΣΤΟΡΙΑ ΘΡΗΣΚΕΙΑ ΚΑΙ ΤΟΥΡΙΣΜΟΣ ΑΝΑ ΧΩΡΑ </h3></a>
        <ul>
          <li><?php $GLOBALS['h'] = gethistory();  
             	while($row = mysql_fetch_array( $GLOBALS['h'])){
             //echo "<img src='".$row['Eikona']."'width=190px height = 130px"; ?>
             	<img style="width:190px;height:130px;" src="<?php echo $row['Eikona']; ?>"/>

            <p><?php 
             	
             	echo  $row['Small_text'] . '<br>' ;
             	?></p>
           <!-- <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve 
			stib ulum quismodo nulla et.</p>-->
            <p class="readmore"><a href="index.php?p=descriptions&q=<?php  echo $row['ID']; ?>">Διάβασε περισσότερα</a></p>
          </li>
          <?php }?>
          <li><?php $GLOBALS['h'] = getreligion();  
             	while($row = mysql_fetch_array( $GLOBALS['h'])){
             	//echo "<img src='".$row['Eikona']."'width=190px height = 130px"; ?>
             	<img style="width:190px;height:130px;" src="<?php echo $row['Eikona']; ?>"/>

            <p><?php 
             	echo  $row['Small_text']; '<br>' ;?></p>
             <!-- <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve 
			stib ulum quismodo nulla et.</p>-->
            <p class="readmore"><a href="index.php?p=descriptions&q=<?php  echo $row['ID']; ?>">Διάβασε περισσότερα</a></p>
          
          </li>
          <?php }?>
          <li class="last"><?php $GLOBALS['h'] = gettourism();  
             	while($row = mysql_fetch_array( $GLOBALS['h'])){
             	//echo "<img src='".$row['Eikona']."'width=190px height = 130px"; ?>
             	<img style="width:190px;height:130px;" src="<?php echo $row['Eikona']; ?>"/>

            <p><?php  
             	
             	echo  $row['Small_text'] . '<br>' ;?></p>
        <!--    <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve 
			stib ulum quismodo nulla et.</p>-->
            <p class="readmore"><a href="index.php?p=descriptions&q=<?php  echo $row['ID'];  ?>">Διάβασε περισσότερα</a></p>
           
          </li>
         <?php }?>
        </ul>
        <br class="clear" />
      </div>
    </div>
    <div class="column">
    <h3><strong></strong></h3>
    <!--  <div class="holder"><a href="#"><img src="images/demo/300x250.gif" alt="" /></a></div>
      <div class="holder"><a href="#"><img src="images/demo/300x80.gif" alt="" /></a></div> -->
     <div class="holder"><a href="#"><?php include('pages/widget.php'); ?></a></div>
         </div>
    <br class="clear" />
  </div>
</div>

<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="footer">
    <div class="footbox">
      <h2>Σχετικά</h2>
      <ul>
      
      <font size="2" color="#3399FF"><li>Το site δημιουργήθηκε για την 
      συνεχή ενημέρωση σε θέματα που αφορούν την  Ελλάδα και το  εξωτερικό για να μην μένεις ποτέ πίσω</li></font>
      </ul>
    </div>
    <div class="footbox">
      <h2>Διαφημίση</h2>
      <ul>
      <font size="2" color="#3399FF"><li>Θέλεις να διαφημίσεις την επιχείρηση σου ή τα προιόντα σου μέσα από το site μας;</li></font>
      <font size="2" color="silver"><li> <a href="index.php?p=promotion" style="color:silver"> κλικ εδώ για περισσότερες πληροφορίες</a></li></font>

     
      </ul>
    </div>
    <div class="footbox">
      <h2>Ειδήσεις</h2>
      <ul>
        <font size="2" color="#66CCFF"></font>
        <li> <font size="2" color="#3399FF"><a href="index.php?p=allnews&pn=1">Διαβάστε όλα τα νέα</a></font></li>
       
      </ul>
    </div>
    <div class="footbox">
      <h2>Όροι χρήσης</h2>
      <ul>
       	<li><a href="index.php?p=licenses" style="font-size:small">Διαβάστε τους όρους χρήσης και την πολιτική απορρήτου</a></li>
      </ul>
    </div>
    <div class="footbox last">
      <h2>Επικοινωνία</h2>
      <ul>
       
       <li><font size="2"><a  href="index.php?p=contact"><input type="image" style="width:25px;height:25px;margin:-5px;" src="images/demo/contact-icon.png">&nbsp;&nbsp;Φόρμα επικοινωνίας</input></a></font></li>
       <li class="last" id="textelephone"><input type="image" id="telephone" src="images/demo/Telephone_icon_blue_gradient.svg.png">&nbsp;&nbsp;&nbsp;&nbsp;</input>6976253479</li>
	
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="socialise">
    <ul>
      <li><a href="https://www.facebook.com/etidings" target="_blank"><img src="images/demo/facebook-logo.png" style="width:100px" alt="" /><span>Facebook</span></a></li>
      <li><a href="#"><img src="images/demo/youtube-circle.png" style="width:100px" alt=""  /><span>Youtube</span></a></li>
      <li class="last"><a href="https://twitter.com/e_tidings?lang=el" target="_blank"><img src="images/demo/twitter-logo.jpg" style="width:100px" alt=""/><span>Twitter</span></a></li>
    </ul>
    <div id="newsletter">
    
      <h2>Ενημερωτικό Δελτίο</h2>
      <p>Θέλεις να ενημερώνεσαι από το e-Tidings;</p>
	
      <form action="index.php?p=register" method="post">
        <fieldset>
          <legend>Digital Newsletter</legend>
          <div class="fl_left">
               <div class="fl_right">
                       </div> 
                       <a href="index.php?p=register"><img src="images/demo/28-512.png" style="width:20px;padding:5px;">κλικ εδώ</img></a> 
         </div>
          
         
        </fieldset>
      </form>
 
     </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col8">
  <div id="copyright">
    <p class="fl_left">Copyright © 2015 - All Rights Reserved - <a href="http://www.e-tidings.com">
	www.e-tidings.com</a></p>
    <p class="fl_right">Developed By <a target="_blank" href="http://aetos.it.teithe.gr/~ibalatso">ibalatso</a> <a target="_blank" href="http://aetos.it.teithe.gr/~rkermizi" title="Kermizidis Rafail">
	rkermizi</a></p>
    <br class="clear" />
  </div>
</div>

</body>
</html>