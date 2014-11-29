<?php
	/*
	* Author: Vincent Giannone
	* Date: 12/31/2013
	* File: login.php
	* 
	* This script is called from the index and incorrectLogin pages. It is the action of the user
	* user name and password form. This script checks if both fields contain data, connects to a 
	* database, checks if there is a correct combination of the username and password entered, and 
	* refreshs to the appropriate page depending on that combination being true or false. If the 
	* username and password combination are correct, a SESSION is started for that user assiging
	* their user name to the global $_SESSION['username'].
	*/

	print("Checking login information!<br>");
	
	// Check if BOTH username and password are in the fields. IF AND ONLY IF both values are not empty
	// execute this block of code. $_POST['username'] and $_POST['password'] are global and receive 
	// values from either the index or incorrectLogin pages.
	if($_POST['username'] != '' && $_POST['password'] != ''){
		// If the username and password are in the fields, take the date
		// from POST and assign to PHP variables
		print("Reading form data from POST!<br>");
		$username = $_POST['username'];
		$password = $_POST['password'];
		print("<br>Username POST: " . $username);
		print("<br>Password POST: " . $password);
		print("<br>");
		
		// Connect to the database using a PDO (PHP Data Object)
		$dbh = new PDO("sqlite:FPGAServer.sqlite");
		$query = 'SELECT "Username", "Password" FROM "User" WHERE "Username" = "' . $username . '" AND Password = "' . $password . '"';
		$result = $dbh->query($query);
		$output = $result->fetch();
		
		// User name is printed to the web browser. This is helpful for debugging when checking the output
		// from the database.
		//print("<br>Username sql: " . $output['Username']);
		//print("<br>Password sql: " . $output['Password']);
		//print("<br>");
		
		// Check if the password is correct
		if($output['Password'] == $password){
			// If the username and password execute this block
			print("Correct password!<br>");
			
			// Since it is a succesful login, start a session
			session_start();
			// Assign session variables
			$_SESSION['username'] = $username;			
			
			// refresh to the main page
			header("location:../pages/queue.php");
			//print('<META http-equiv="refresh" content="0;URL=../pages/userMain.php">');
		} else {
			// If the username and password is incorrect execute this block
			//print("Incorrect password!<br>");
			die("incorrect user/password");
			
			// Refresh to the page incorrectLogin.php
			//header("location:../pages/incorrectLogin.php");
			//print('<META http-equiv="refresh" content="0;URL=../pages/incorrectLogin.php">');
		}
		
		// NULL connection to database
		$dbh = null;
	} else {
		// If BOTH username and password are not in the fields execute this block
		die("Both values shouls be submitted!<BR>");
		//print("Both values should be submitted!<br>");
		
		// Refresh to the page incorrectLogin.php
		//header("location:../pages/incorrectLogin.php");
		//print('<META http-equiv="refresh" content="0;URL=../pages/incorrectLogin.php">');
	}
?>

