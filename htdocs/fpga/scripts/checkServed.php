<?php

  $connect = mysql_connect("localhost", "root","") or die("Couldn't Connect");
	mysql_select_db("brittlemess") or die("Couldn't find DB");
		
	//gets the being served id
	$query = mysql_query("SELECT * FROM queue");
	while($output = mysql_fetch_assoc($query)){
		$beingServed = $output['BeingServed'];
	}   
	
	echo $beingServed;
 
?>