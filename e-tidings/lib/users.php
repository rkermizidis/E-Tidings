<?php
function insertUser($fname, $email) {
		$result = mysql_query("insert into usersfornewsletter " .
							  "set Fname = '$fname'," .
								  
								  "Email = '$email';");
		if (!$result) {
			echo(mysql_error());
			exit();
		}	
		return $result;		
		
		
	}
	
function insertnews($titlos,$small_text,$keimeno,$eikona,$category,$url,$source) {
		$result = mysql_query("insert into nea " .
					          "set Titlos_arthrou='$titlos'," .
							  "Small_text = '$small_text'," .
							  "Keimeno='$keimeno'," .
							  "Eikona='$eikona'," .
							   "Category = '$category'," .
							    "url = '$url'," . 
							    "source = '$source';"    );

							    
							 
		if (!$result) {
			echo(mysql_error());
			exit();
		}	
		return $result;		
	}
	

function insertforimage($i_id,$imagei,$i_cati,$videov) {
		$result = mysql_query("insert into images " .
					          "set i_ID='$i_id'," .
							  "image = '$imagei'," .
							  "i_cat='$i_cati'," .
							  "video='$videov';");
		if (!$result) {
			echo(mysql_error());
			exit();
		}	
		return $result;		
	}
	
	
	
?>	
	