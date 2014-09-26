<?php
	/*
	* Author: Vincent Giannone
	* Date: 12/31/2013
	* File: addUser.php
	* 
	*  
	* 
	* 
	* 
	*/
	
	print("Adding new user!<br>");
	
	// Check if BOTH username and password are in the fields
	if($_POST['username'] == '' || $_POST['password'] == '' || $_POST['email'] == ''){
		// If either of the fields are empty, refresh to this page. 
		print("All fields must have user data!<br>");
		header("location:../pages/incorrectnewUser.php");
		//print('<META http-equiv="refresh" content="0;URL=../pages/incorrectnewUser.php">');
	} else {
		// If both fields have data, connect to database  
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		
		print("Username: " . $username . "<br>");
		print("Password: " . $password . "<br>");
		print("email: " . $email . "<br>");
		
		// Access the database
		chown("FPGAServer.sqlite", "Administrator");
		chmod("FPGAServer.sqlite", 0777);
		$dbh = new PDO("sqlite:FPGAServer.sqlite");
		$query = 'SELECT "Username" FROM "User" WHERE "Username" = "' . $username . '"';
		$result = $dbh->query($query);
		$output = $result->fetch();
		
		// Check if the UserName already exists
		if($output['Username'] == '') {
			
			// Check if the email entered has an FGCU address
			$found1 = strpos($email, "@eagle.fgcu.edu");
			$found2 = strpos($email, "@fgcu.edu");
			// Check if strpos returns true for the email address 
			if($found1 || $found2) {
				// If the username does not already exist
				print("Adding user information to database!<br>");
				
				try {	
					$query = 'INSERT INTO "User" ("Username", "Password", "Email") VALUES ("' . $username . '", "' . $password . '", "' . $email . '")';
					$dbh->exec($query);
				} catch (PDOException $e) {
					print("Error:<br>");
					print $e->getMessage ();
				}
				
				
				// Since a user has been added succesfully, start a session
				// Assign session variables
				session_start();
				$_SESSION['username'] = $username;	
				
				// Make a directory for this user where projects can be stored
				print("Making a directory for this user!<br>");
				mkdir("../projects/users/" . $username, 0777, true);
				
				// refresh to the main page
				header("location:../pages/userMain.php");
				//print('<META http-equiv="refresh" content="0;URL=../pages/userMain.php">');
			} else {
				// If the email address does not have "@eagle.fgcu.edu" OR "@fgcu.edu"
				print("Most have an FGCU email account<br>");
				header("location:../pages/incorrectnewUser.php");
				//print('<META http-equiv="refresh" content="0;URL=../pages/incorrectnewUser.php">');
			}
		} else {
			// If the username already exists in the database, refresh to this page.
			print("Username already exists<br>");
			header("location:../pages/incorrectnewUser.php");
			//print('<META http-equiv="refresh" content="0;URL=../pages/incorrectnewUser.php">');
		}
		
		// Destroy connection with database
		$dbh = null;
	}
	
?>

