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
	        if (count < 250) {
	            // Scroll to bottom
	            $("div.container2").scrollTop($('div.container2')[0].scrollHeight);
	        }

	        // Increment count by 1
	        count = count + 1;
	    }

	    // Call scrollDown in intervals of 250ms
	    var refreshId = setInterval(scrollDown, 250);

		function Logout() {
            <?php
            //connects to db
            $connect = mysql_connect("localhost", "root","") or die("Couldn't Connect");
	    	mysql_select_db("brittlemess") or die("Couldn't find DB");
			
			$query = mysql_query("SELECT * FROM queue");
	    	while($output = mysql_fetch_assoc($query)){
				$beingServed = $output['BeingServed'];
            }   

			$beingServed++;
	
			//Lana
			//Lanaaaa
			//LANAAAAAAAAAAAAA
			//HE REMEMBERS ME
	    	$query = mysql_query("SELECT * FROM baboo");
	    	while($output = mysql_fetch_assoc($query)){
				$ragequitId = $output['RagequitId'];
				if($ragequitId <= $beingServed)
				$beingServed++;
				$query = mysql_query("DELETE FROM baboo WHERE RagequitId <= '" . $beingServed . "'");
            }    

           
            //increments by 1
            $query = mysql_query("UPDATE queue SET BeingServed = '" . $beingServed . "'");
            ?>
	}
	</script>
	<script language="JavaScript" type="text/javascript">
			function executeCommands(inputparams)
			{
			<?php
				$output = null;
				$n = exec('C:\\DAS.exe', $output);
				?>
			}
	</script>
	
    </head>
        
    <body id="mydiv" onunload="Logout()">
        <div class="container"> 
            <div class="bannerArea">			
                <div class="bannernav"><?php print("User: " . $username); ?> | <a href="../index.php" onclick="Logout()" style="text-decoration: none">Logout</a></div>
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
						
						<!-- Extended I/O section -->
						<h3>Remote Switches & Buttons  -  click to set, view effect on webcam.</h3>
						<img src="../images/switchbuttons_panel.jpg" width="566" height="120" border="0" usemap="#map" />
						<map name="map">
						<!--href="javascript:;" prevents the userclick from going to top of page like href="#" -->
						<!-- fools browser into thinking there is some java to do instead of reload -->
						<area shape="rect" coords="29,67,44,97" alt="sw0" href="javascript:;" onclick="var img = new Image(); img.src = 'cgi-bin/printenv.pl'" />
						 
						
						<area shape="rect" coords="65,67,80,97" alt="sw1" href="javascript:;" />
						<area shape="rect" coords="101,67,116,97" alt="sw2" href="javascript:;" />
						<area shape="rect" coords="137,67,152,97" alt="sw3" href="javascript:;" />
						<area shape="rect" coords="173,67,188,97" alt="sw4" href="javascript:;" />
						<area shape="rect" coords="209,67,224,97" alt="sw5" href="javascript:;" />
						<area shape="rect" coords="245,67,260,97" alt="sw6" href="javascript:;" />
						<area shape="rect" coords="281,67,296,97" alt="sw7" href="javascript:;" />
						<area shape="rect" coords="280,24,295,54" alt="sw8" href="javascript:;" />
						<area shape="rect" coords="244,24,259,54" alt="sw9" href="javascript:;" />
						<area shape="rect" coords="208,24,223,54" alt="sw10" href="javascript:;" />
						<area shape="rect" coords="172,24,187,54" alt="sw11" href="javascript:;" />
						<area shape="rect" coords="136,24,151,54" alt="sw12" href="javascript:;" />
						<area shape="rect" coords="100,24,115,54" alt="sw13" href="javascript:;" />
						<area shape="rect" coords="64,24,79,54" alt="sw14" href="javascript:;" />
						<area shape="rect" coords="28,24,43,54" alt="sw15" href="javascript:;" />
						<area shape="rect" coords="536,50,553,67" alt="btn0" href="lnkhere" />
						<area shape="rect" coords="506,50,523,67" alt="btn1" href="javascript:;" />
						<area shape="rect" coords="476,50,493,67" alt="btn2" href="javascript:;" />
						<area shape="rect" coords="446,50,463,67" alt="btn3" href="javascript:;" />
						<area shape="rect" coords="416,50,433,67" alt="btn4" href="javascript:;" />
						<area shape="rect" coords="386,50,403,67" alt="btn5" href="javascript:;" />
						<area shape="rect" coords="356,50,373,66" alt="btn6" href="javascript:;" />
						<area shape="rect" coords="326,50,343,67" alt="btn7" href="javascript:;" />
						<area shape="rect" coords="536,24,553,41" alt="btn8" href="javascript:;" />
						<area shape="rect" coords="506,24,523,41" alt="btn9" href="javascript:;" />
						<area shape="rect" coords="476,24,493,41" alt="btn10" href="javascript:;" />
						<area shape="rect" coords="446,24,463,41" alt="btn11" href="javascript:;" />
						<area shape="rect" coords="416,24,433,41" alt="btn12" href="javascript:;" />
						<area shape="rect" coords="386,24,403,41" alt="btn13" href="javascript:;" />
						<area shape="rect" coords="356,24,373,41" alt="btn14" href="javascript:;" />
						<area shape="rect" coords="326,24,343,40" alt="btn15" href="javascript:;" />
						<area shape="rect" coords="323,84,410,105" alt="DialogButtonLeft" href="javascript:;" />
						<area shape="rect" coords="467,84,554,105" alt="dialogbuttonRight" href="javascript:;" />
						</map>
						Note: you must include the IOExpansion component in your project to use these.<br/>
						<br/>
						<br/>
						

						
						
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
