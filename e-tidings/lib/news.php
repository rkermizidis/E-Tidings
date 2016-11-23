<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-7" />

<?php
function gettitle(){

	$c = $_GET['q'];
	$query = getnewsfromID($c);
   while($row = mysql_fetch_array($query)) 
   return  $row['Titlos_arthrou'];
}

function gettitlefromimp(){

	$c = $_GET['q'];
	$query = getimpnewsfromID($c);
   while($row = mysql_fetch_array($query)) 
   return  $row['Title'];
}



function dateandtime(){


$s = date("D");
$d = date("d");
$m = date("m");
$y = date("y");
	
	switch($s){
		
		case "Mon" : $day = "Δευτέρα,"; break;
		case "Tue" : $day = "Τρίτη,"; break;
		case "Wed" : $day = "Τετάρτη,"; break;
		case "Thu" : $day = "Πέμπτη,"; break;
		case "Fri" : $day = "Παρασκευή,"; break;
		case "Sat" : $day = "Σάββατο,"; break;
		case "Sun" : $day = "Κυριακή,"; break;
		
		}

	
	$day_array = array("Δευτέρα,","Τρίτη,","Τετάρτη,","Πέμπτη,","Παρασκευή,","Σάββατο,","Κυριακή,");
	$month_array = array('01'=>'Ιανουαρίου','02'=>'Φεβρουαρίου','03'=>'Μαρτίου','04'=>'Απριλίου','05'=>'Μαϊου','06'=>'Ιουνίου','07'=>'Ιουλίου','08'=>'Αυγούστου','09'=>'Σεπτεμβρίου','10'=>'Οκτωβρίου','11'=>'Νοεμβρίου','12'=>'Δεκεμβρίου');
	
	echo  date($day. " "  .$d." " .$month_array[$m]. " " ."20"."y");


}



$counter  = mysql_num_rows(getnews());
function insertimpnews($titlos,$small_text,$keimeno,$eikona,$category,$counter,$url,$source) {
		$result = mysql_query("insert into importantnews " .
					          "set Title='$titlos'," .
							  "Small_text = '$small_text'," .
							  "Text='$keimeno'," .
							  "Eikona='$eikona'," .
							  "n_id='$counter'," .
							  "url='$url'," .
							   "source='$source'," .
							   "Category = '$category';");
		if (!$result) {
			echo(mysql_error());
			exit();
		}	
		return $result;		
	}







function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function getpage($id){

	$p = mysql_num_rows(mysql_query("select * from nea where nea.ID= {$id}" ));
	
	if (!$p ) {
			echo(mysql_error());
			exit();
		}
		return $p; 
	}





function gettitlefromlinks(){

	$c = $_GET['p'];
	
  	
    if ($c == 'weather')
   		$c =  "Καιρός - e-Tidings";
   else
    if ($c == 'footballlive')
		$c = "Αγώνες ποδοσφαίρου live - e-Tidings";
   else
    if ($c == 'ekloges')
  		$c =  "Αποτελέσματα εκλογών - e-Tidings";
   else
 	if ($c == 'loginform')
 	    $c = "Πραγματοποίησε είσοδο - e-Tidings";
 	else
 	if ($c == 'register')
 	    $c = "Ενημερωτικό Δελτίο - e-Tidings";
 	else   
 	if ($c == 'search')
 	    $c = "Αναζήτηση - e-Tidings";
    else
    if ($c == 'allnews'){
    $c = "Δείτε όλα τα νέα" . " " . "- e-Tidings";
    	
      } else
    if ($c == 'licenses')
    	$c = "Όροι χρήσης | Πολιτική απορρήτου - e-Tidings";
    else
    
    if ($c == 'hisreltour')
    	 $c = "Ιστορία Θρησκεία και Τουρισμός " .  " " . "| e-Tidings";

    
   else
   	if ($c == 'contact')
   		$c = "συμπληρώστε την φόρμα επικοινωνίας - e-Tidings";
   else
    
   	if ($c == 'promotion')
   		$c = "Διαφήμιση - e-Tidings";
   		
   	if ($c == 'loginformadmin')
   		$c = "Πραγματοποίησε είσοδο - e-Tidings";;


  
   return $c;



}




function gettitlefromdesc(){


$c = $_GET['q'];
$query = getnewsfromID($c);
while($row = mysql_fetch_array($query)) 
return  getcat($row['category']);




}
function gettitle2(){
	
	$GLOBALS['categor']= $_GET['c'];
	$query = getnewsfromcategory($GLOBALS['categor']);
    while($row = mysql_fetch_array($query)) 
   

	$GLOBALS['myfun'] = getcat($row['category']);
	return  $GLOBALS['myfun'];
}

function getnewsfromIDIm($id){

	$query = mysql_query("select * from nea where ID = {$id} ");


	if (!$query ) {
			echo(mysql_error());
			exit();
		}
		return $query ; 
	}


function getnewsfromID($id){

	$query = mysql_query("select * from nea where ID = {$id} ");


	if (!$query ) {
			echo(mysql_error());
			exit();
		}
		return $query ; 
	}

function getimpnewsfromID($id){

	$query = mysql_query("select * from importantnews where ID = {$id} ");


	if (!$query ) {
			echo(mysql_error());
			exit();
		}
		return $query ; 
	}
	
	
	
	

function getnewsfromcategory($category) {
		$result = mysql_query("select * " .
							  "from nea ".
							  " where category =".$category);
		if (!$result) {
			echo(mysql_error());
			exit();
		}
		return $result; 
	}
	
	
	
	
	function insertimages($n_id,$eikona){
	$result = mysql_query("insert into images " .
					          "set i_ID='$n_id'," .
							  "image= '$eikona';");
	
		if (!$result) {
			echo(mysql_error());
			exit();
		}
		return $result; 
	}
	

		
	function insertvideo($n_id,$video){
	$result = mysql_query("insert into videos " .
					          "set N_ID='$n_id'," .
							  "Video= '$video';");
	
		if (!$result) {
			echo(mysql_error());
			exit();
		}
		return $result; 
	}


	
	

function getimagefromID($id){

		$result = mysql_query("select * from nea,images where nea.ID = images.i_ID and images.i_ID= {$id} ");
		
		if (!$result) {
			echo(mysql_error());
			exit();
		}
		return $result; 

}	
	
function getnews(){

	$query = mysql_query("select * from nea");
	if (!$query) {
			echo(mysql_error());
			exit();
		}
		return $query; 

}
function getTitleRandom(){

	$query = mysql_query("SELECT *  FROM nea  ORDER BY RAND() limit 1 ");
	if (!$query) {
			echo(mysql_error());
			exit();
		}
		return $query; 

}

function getenvironment(){

	$query = mysql_query("SELECT * FROM nea   where nea.category = 7 ORDER BY RAND() limit 1  ");
	if (!$query) {
			echo(mysql_error());
			exit();
		}
		return $query; 

}

function getpolitics(){

	$query = mysql_query("SELECT * FROM nea   where (nea.category = 2 or nea.category = 1) and nea.counter>=5 order by rand()  limit 1 ");
	if (!$query) {
			echo(mysql_error());
			exit();
		}
		return $query; 

}

function getpolitism(){

	$query = mysql_query("SELECT * FROM nea   where nea.category = 3 and nea.counter>=5  order by rand() limit 1  ");
	if (!$query) {
			echo(mysql_error());
			exit();
		}
		return $query; 

}




function gettechnology(){

	$query = mysql_query("SELECT * FROM nea   where nea.category = 8 and nea.counter>=5 order by rand() limit 1 ");
	if (!$query) {
			echo(mysql_error());
			exit();
		}
		return $query; 

}

function getentertainment(){

	$query = mysql_query("SELECT * FROM nea where nea.category = 9 ORDER BY RAND() limit 1  ");
	if (!$query) {
			echo(mysql_error());
			exit();
		}
		return $query; 

}

function gethealth(){

	$query = mysql_query("SELECT * FROM nea   where nea.category = 4 ORDER BY RAND() limit 1  ");
	if (!$query) {
			echo(mysql_error());
			exit();
		}
		return $query; 

}


function gethistory(){

	$query = mysql_query("SELECT * FROM nea   where nea.category = 10 ORDER BY rand() limit 1   ");
	if (!$query) {
			echo(mysql_error());
			exit();
		}
		return $query; 

}

function getreligion(){

	$query = mysql_query("SELECT * FROM nea   where nea.category = 11 ORDER BY rand() limit 1   ");
	if (!$query) {
			echo(mysql_error());
			exit();
		}
		return $query; 

}
function gettourism(){

	$query = mysql_query("SELECT * FROM nea   where nea.category = 12 ORDER BY rand() limit 1   ");
	if (!$query) {
			echo(mysql_error());
			exit();
		}
		return $query; 

}







function getcountnea(){

	$query =  mysql_query("SELECT * FROM nea");
	if (!$query){
	echo (mysql_error);
	exit();
	}
	return $query;
	
	}
	
	function getcountimpnea(){

	$query =  mysql_query("SELECT * FROM importantnews");
	if (!$query){
	echo (mysql_error);
	exit();
	}
	return $query;
	
	}
	

	
	
	
function getcategory($c){


$query = mysql_query("select * from nea where category = ".$c);

if (!$query){
	echo (mysql_error);
	exit();
	}
	return $query;


}

function getDateandHour($c_date){
	
	$day_num = date("D",$c_date);
	$month_num =date("n", $c_date);
	
	
	switch($day_num){
		
		case "Mon" : $day = "Δευτέρα"; break;
		case "Tue" : $day = "Τρίτη"; break;
		case "Wed" : $day = "Τετάρτη"; break;
		case "Thu" : $day = "Πέμπτη"; break;
		case "Fri" : $day = "Παρασκευή"; break;
		case "Sat" : $day = "Σάββατο"; break;
		case "Sun" : $day = "Κυριακή"; break;
		
		}
		$month_array = array('1'=>'Ιανουαρίου','2'=>'Φεβρουαρίου','3'=>'Μαρτίου','4'=>'Απριλίου','5'=>'Μαϊου','6'=>'Ιουνίου','7'=>'Ιουλίου','8'=>'Αυγούστου','9'=>'Σεπτεμβρίου','10'=>'Οκτωβρίου','11'=>'Νοεμβρίου','12'=>'Δεκεμβρίου');
		if (date('H',$c_date)<12)
		return ("Δημοσ."." ".date($day.", j ".$month_array[$month_num]." Y",$c_date) . " " . date('H:i',$c_date) .' '. 'π.μ.');
		else
		if (date('H',$c_date)>=12)
		return ("Δημοσ."." ".date($day.", j ".$month_array[$month_num]." Y",$c_date) . " " . date('H:i',$c_date) .' ' .'μ.μ.');

	}
	
function getcat($cat){


		$cat_array = array('1'=>'Ελλάδα','2'=>'Κόσμος','3'=>'Πολιτισμός','4'=>'Υγεία','5'=>'Παιδεία','6'=>'Αθλητισμός','7'=>'Περιβάλλον','8'=>'Τεχνολογία','9'=>'Διασκέδαση','10'=>'Ιστορία','11'=>'Θρησκεία','12'=>'Τουρισμός');
		
		
		return $cat_array[$cat];
	


}
function getDate2($c_date_d){
	
	$day_num = date("D",$c_date_d);
	$month_num =date("n", $c_date_d);
	
	
	switch($day_num){
		
		case "Mon" : $day = "Δευτέρα"; break;
		case "Tue" : $day = "Τρίτη"; break;
		case "Wed" : $day = "Τετάρτη"; break;
		case "Thu" : $day = "Πέμπτη"; break;
		case "Fri" : $day = "Παρασκευή"; break;
		case "Sat" : $day = "Σάββατο"; break;
		case "Sun" : $day = "Κυριακή"; break;
		
		}
		$month_array = array('1'=>'Ιανουαρίου','2'=>'Φεβρουαρίου','3'=>'Μαρτίου','4'=>'Απριλίου','5'=>'Μαϊου','6'=>'Ιουνίου','7'=>'Ιουλίου','8'=>'Αυγούστου','9'=>'Σεπτεμβρίου','10'=>'Οκτωβρίου','11'=>'Νοεμβρίου','12'=>'Δεκεμβρίου');
		
		return (date($day.", j ".$month_array[$month_num]." Y",$c_date_d)); 
	}
	
	function insertcomment($name,$mail,$comment){
	$result = mysql_query("insert into comments " .
					          "set Name='$name'," .
							  "email='$mail'," . 
							  "Textc = $comment';");

	if (!$result) {
			echo(mysql_error());
			exit();
		}	
		return $result;		
	}
	

?>