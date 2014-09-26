<?php
	/*
	* Author: Vincent Giannone
	* Date: 12/31/2013
	* File: newProject.php
	* 
	* This file creates a project for the user.
	* 
	* 
	*/
	
	print("Creating a new project!<br>");
	
	// Start session
	session_Start();
	// Find the username and projectname submitted from the user
	$username = $_SESSION['username'];	
	$projectName = $_POST['projectName'];
	
	// Used for debugging
	print("Project name: " . $projectName . "<br>");
	
	// Save the path of the users project directory in a variable. This directory path
	// will be used often in this script. 
	$directory = "../projects/users/" . $username . "/" . $projectName;
	// Make this directory
	mkdir($directory, 0777, true);
	
	// Create the destination path of each file to the newly created directory
	$vhdl_Dest = "../projects/users/" . $username . "/" . $projectName . "/" . $_FILES['vhdl']['name'];
	$ucf_Dest = "../projects/users/" . $username . "/" . $projectName . "/" . $_FILES['ucf']['name'];
	
	// Move files from the temp directory to the destination 
	move_uploaded_file($_FILES['vhdl']['tmp_name'], $vhdl_Dest);	
	move_uploaded_file($_FILES['ucf']['tmp_name'], $ucf_Dest);
	
	// ----------------------- Begin Creating Project Directories and Files ------------------------
	
	// Format the project directory with the necessary files and directories to run the project.
	// All of the templates of the files created can be seen in the projectTemplate folder. All files
	// are included except for the .vhdl and .ucf files. These files are supplied by the user.
	// These files MUST have the same name as the project.
	
	// The following directory tree is created where the root is xst
	mkdir($directory . "/xst", 0777, true);
	mkdir($directory . "/xst/dump.xst", 0777, true);
	mkdir($directory . "/xst/dump.xst/" . $projectName . ".xst", 0777, true);
	mkdir($directory . "/xst/projnav.tmp", 0777, true);
	mkdir($directory . "/xst/work", 0777, true);
	
	// This file does not need its contents changed when copied. Just its name. 
	copy("../projects/projectTemplate/template.ut", $directory . "/" . $projectName . ".ut");
	
	// These files need there contents changed when copied. template.xst, template.bat, template.prj
	
	// Copy and change contents of template.bat according to $projectName
	copy("../projects/projectTemplate/template.bat", $directory . "/" . $projectName . ".bat");
	// Change the contents of the file. The project in this file is called "template". It must be 
	// replaced with $projectName. To change the files contents: read contents of file into a string 
	$str = file_get_contents($directory . "/" . $projectName . ".bat");
	// Replace each instance of "template" with $projectName in the string
	$str = str_replace("template", $projectName, $str);
	// Write the string back to the file template.bat
	file_put_contents($directory . "/" . $projectName . ".bat", $str);
	
	// Copy and change contents of template.xst according to $projectName
	copy("../projects/projectTemplate/template.xst", $directory . "/" . $projectName . ".xst");
	// Change the contents of the file. The project in this file is called "template". It must be 
	// replaced with $projectName. To change the files contents: read contents of file into a string 
	$str = file_get_contents($directory . "/" . $projectName . ".xst");
	// Replace each instance of "template" with $projectName in the string
	$str = str_replace("template", $projectName, $str);
	// Write the string back to the file template.xst
	file_put_contents($directory . "/" . $projectName . ".xst", $str);
	
	// Copy and change contents of template.prj according to $projectName
	copy("../projects/projectTemplate/template.prj", $directory . "/" . $projectName . ".prj");
	// Change the contents of the file. The project in this file is called "template". It must be 
	// replaced with $projectName. To change the files contents: read contents of file into a string 
	$str = file_get_contents($directory . "/" . $projectName . ".prj");
	// Replace each instance of "template" with $projectName in the string
	$str = str_replace("template", $projectName, $str);
	// Write the string back to the file template.prj
	file_put_contents($directory . "/" . $projectName . ".prj", $str); 
	
	// ----------------------- End Creating Project Directories and Files ------------------------
	
	// refresh to the main page
	header("location:../pages/userMain.php");
	//print('<META http-equiv="refresh" content="0;URL=../pages/userMain.php">');
?>

