<?php

    $uid = $_POST['userId'];
	//baboo remembers what you did
	$connect = mysql_connect("localhost", "root","") or die("Couldn't Connect");
	mysql_select_db("brittlemess") or die("Couldn't find DB"); 
	$query = mysql_query("INSERT INTO baboo (RagequitId) VALUES ('" . $uid . "')");
	
	
?>