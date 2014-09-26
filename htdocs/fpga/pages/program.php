<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    
<html>
    <head>
    <title>FPGA Server</title>
        
    <meta name="description" content="Webpage layout by Codify Design Studio - codifydesign.com" />
    <link rel="stylesheet" type="text/css" href="../stylesheet.css" />
	
	<?php 
		// Session start must be called at each page in order to use session variables 
		// and other information across multiple pages.
		session_Start();	
		$username = $_SESSION['username'];
	?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script>
		/*
		 * This script places the scrollbar of the div to the bottom in 250ms intervals. 
		 * On the event of the scroll bar moving, the time interval will stop, haulting 
		 * the execution of scrollDown()
		*/ 
		
		// This function will scroll the overflow scrollbar down
		var count = 0;
		function scrollDown() {
			// Change this value of count based on the average amount of time it takes for 
			// a project to synthesize
			if(count < 250) {
				// Scroll to bottom
				$( "div.container2" ).scrollTop( $('div.container2')[0].scrollHeight);
			} 

			// Increment count by 1
			count = count + 1;
		}
		
		// Call scrollDown in intervals of 250ms
		var refreshId = setInterval(scrollDown, 250);
		
	</script>
	
    </head>
        
    <body id="mydiv">
        <div class="container"> 
            <div class="bannerArea">			
                <div class="bannernav"><?php print("User: " . $username); ?> | <a href="../index.php" style="text-decoration: none">Logout</a></div>
                <div class="toplogo"><a href="#"><img src="../images/Xilinx-logo.jpg" width="365" height="90" border="0" /></a></div>
            </div>
            <div class="contentArea">
                <ul class="leftnavigation">
					<li><a href="../index.php" >Login</a></li>
                    <li><a href="userMain.php" >Project Information</a></li>
                    <li><a href="program.php" >Board and Console</a></li>
					<li><a href="fpgaInformation.php" >Documentation</a></li>
                </ul>
					
                <div class="content">
						
					<div class="contentleft">
					
						<!-- Part 1 description -->
						<h1>Board in Lab</h1>
						
						<!-- Webcam object begin -->
						<iframe width="650" height="610"
							src="http://69.88.163.56:8080/">
						</iframe>
						<!-- Part 2 description -->
						
						
						<h1>Console</h1>
						
						<!-- Console Begin -->
						<?php 
							/*
							* Author: Vincent Giannone
							* Date: 12/31/2013
							* File: program.php
							*/
							
							//print("Programing the board!<br>");
							$projectToBeProgramed = '';
							// Checks which radio was selected 
							if (isset($_POST['submit'])) {
								if (!empty($_POST['projects'])) {
									// Display the name of each project that a user has submitted
									$userProjects =  scandir("../projects/users/" . $username . "/");
									foreach ($userProjects as &$project){
										if ($_POST['projects'] == $project) { 
											$projectToBeProgramed = $project;
										}
									}
								} 
							} 
							
							// Used for debugging
							//print("This user: " . $username . "<br>");
							//print("Selected this project: " . $projectToBeProgramed . "<br>");
							// Call to the batch file to program the FPGA board! 
							// Execute the projects batch file which programs the FPGA board
							///print("Executing..<br>");
							
							// Change the allowed maximum execution time to 300 seconds (5 minutes) 
							ini_set('max_execution_time', 300);
							// Save the current working directory path
							$save_cwd = getcwd();
							// Change the current working directory to the project to be programmed
							chdir("../projects/users/" . $username . "/" . $projectToBeProgramed);
						?>
						<div class = "container2" id = "container2" style="height:250px;width:725px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
							<?php
								// Sets the header of the HTML file 
								header('Content-Encoding: text/html;');
								// Sets the time limit a script can run without a fatal error being returned..
								// 30 seconds it the default
								set_time_limit(100);
								
								if (ob_get_level() == 0) 
									ob_start();
								
								$handle = popen($projectToBeProgramed . ".bat", "r");
								
								while(!feof($handle)) {

									$buffer = fgets($handle);
									$buffer = trim(htmlspecialchars($buffer));

									echo $buffer . "<br />";
									echo str_pad('', 4096);    

									ob_flush();
									flush();
								}
								
								pclose($handle);
								ob_end_flush();
							?>
						</div>
						<br>
						<!-- Console End -->
						
					</div>
					<?php	
						// Change the ucrrent working directory to the saved directory
						chdir($save_cwd);
					?>
					
				</div>
                <div style="clear:both;" id = "load1"></div>
            </div>
            <div class="footerArea" id = "load2">
                <div class="copyright">&copy; Florida Gulf Coast University. FPGA Server. All rights reserved.</div>
            </div>		
        </div>
    </body>
</html>
