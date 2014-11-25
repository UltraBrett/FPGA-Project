<?php

	/*
	*	Author: Brett Stanaland
	*	The purpose of this script is to simulate a queue
	*	system so that only one user may log into the web
	*	page and access the board at a time.
	*
	*/

	//gets new id and current user id from db
	chown("FPGAServer.sqlite", "Administrator");
	chmod("FPGAServer.sqlite", 0777);
	$dbh = new PDO("sqlite:FPGAServer.sqlite");
	$query = 'SELECT "NextId", "BeingServed" FROM "Queue"';
	$result = $dbh->query($query);
	$output = $result->fetch();

	$userId = $output['NextId'];
	$beingServed = $output['BeingServed'];

	$query = 'UPDATE "Queue" SET "UserId" = "' . ++$userId . '"  ';
	$dbh->exec($query);

	while($userId != $output['BeingServed']){
		$query = 'SELECT "BeingServed" FROM "Queue"';
		$result = $dbh->query($query);
		$output = $result->fetch();
	}
	
	header("location:../pages/mainPage.php");
	
?>