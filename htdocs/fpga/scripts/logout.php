<?php
	//connects to db
	$connect = mysql_connect("localhost", "root","") or die("Couldn't Connect");
	mysql_select_db("brittlemess") or die("Couldn't find DB");
		
	//gets the being served id
	$query = mysql_query("SELECT * FROM queue");
	while($output = mysql_fetch_assoc($query)){
		$beingServed = $output['BeingServed'];
		$userId = $output['NextId'];
	}   

	$beingServed++;

	//Lana
	//Lanaaaa
	//LANAAAAAAAAAAAAA
	//HE REMEMBERS ME
	$query = mysql_query("SELECT * FROM baboo");
	while($output = mysql_fetch_assoc($query)){
		
		$ragequitId = $output['RagequitId'];
		if($ragequitId != null){
			if($ragequitId < $beingServed){				
				$query = mysql_query("DELETE FROM baboo WHERE RagequitId <= '" . $beingServed . "'");
			}
			if($ragequitId == $beingServed){
				$query = mysql_query("DELETE FROM baboo WHERE RagequitId <= '" . $beingServed . "'");
				$beingServed++;
			}
		}
	}
	
	if($beingServed > $userId){
		$beingServed = $userId;
		}

	$query = mysql_query("UPDATE queue SET BeingServed = '" . $beingServed . "'");
?>