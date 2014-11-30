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
		
        </head>
        
        <body onunload="Logout()">
            <div class="container"> 
                <div class="bannerArea">			
                    <div class="bannernav"><?php print("User: " . $username); ?> | <a href="../index.php" onclick="Logout()" style="text-decoration: none">Logout</a></div>
                    <div class="toplogo"><a href="#"><img src="../images/Xilinx-logo.jpg" width="365" height="90" border="0" /></a></div>
                </div>
                <div class="contentArea">
                    <ul class="leftnavigation">
						<li><a href="../index.php" >Login</a></li>
						<li><a href="userMain.php" onclick="TabSwitch() >Project Information</a></li>
                        <li><a href="program.php" onclick="TabSwitch() >Board and Console</a></li>
						<li><a href="fpgaInformation.php" onclick="TabSwitch() >Documentation</a></li>
                    </ul>
					
                    <div class="content">
                        <div class="contentleft">
                        
                            <!-- Page description -->
                            <h1><?php print($username); ?>'s Project Information:</h1>
							
							<!-- Upload file form begin -->
							
							<h2>Add a new project:</h2> 
							<h2><b>Must be same name as BOTH the VHDL and UCF files:</b>
							<form action="../scripts/newProject.php" method="post" enctype="multipart/form-data">
								Project Name: <input name="projectName" type="text" /><br />
								Upload a VHDL file: <input name="vhdl" type="file" /><br />
								Upload a UCF file: <input name="ucf" type="file" /><br />
								<input type="submit" value="Upload" /> <b>It will appear in list below!</b>
							</form>
							<!-- Upload file form end -->

							<!-- Existing project scroll bar begin -->
							<br>
							<h2>Choose an existing project from the list below:</h2>
							<div style="height:120px;width:120px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
								<form action="program.php" method="post">
									<?php 
										// Display the name of each project that a user has submitted
										$userProjects =  scandir("../projects/users/" . $username . "/");
										foreach ($userProjects as &$project){
											if($project != "." && $project != "..")
												echo '<input type="radio" name= "projects" value="' . $project . '">' . $project . '<br>';
										}	
									?>
							</div>
									</br>
									<input type="submit" name="submit" value="Submit"><b> Click submit to upload selected project to FPGA!</b>
								</form>
							<br>
                            <!-- Existing project scroll bar end -->
							
                        </div>
						
						
						<div class="contentright">
							<a onclick ="javascript:Display('Guidelines')" href="javascript:;" style='text-decoration:none'>Show/Hide Input Guidelines<br><br></a>

							<div class="mid" id="Guidelines" style="DISPLAY: show" >
								<h2><b>- You have 2 options:</b>
									</br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									<b>- Add a new project</b>
									</br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									<b>- Use an existing project</b></h2>
									</br>
									<h2><b>- If you would like to add a new project, only ONE VHDL and ONE UCF file are accepted. The UCF file must 
									only refer to pin locations available on the Spartan-6 package xc6slx45-csg324-3.
									</br>- BOTH the VHDL file, UCF file, AND the project name must BE THE SAME.</h2>
								<br><br>
							</div>

							<script language="JavaScript">
							    function Display(id) {
							        if (document.getElementById(id).style.display == 'none') {
							            document.getElementById(id).style.display = 'block';
							        }
							        else {
							            document.getElementById(id).style.display = 'none';
							        }
							    }

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

	function TabSwitch(){
		<?php
		$connect = mysql_connect("localhost", "root","") or die("Couldn't Connect");
	    mysql_select_db("brittlemess") or die("Couldn't find DB");
		
		$query = mysql_query("SELECT * FROM queue");
	    	while($output = mysql_fetch_assoc($query)){
				$beingServed = $output['BeingServed'];
            }
			$beingServed--;
			$query = mysql_query("UPDATE queue SET BeingServed = '" . $beingServed . "'");
		?>
	}
							</script>
						</div>
						
						
                     </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="footerArea">
                    <div class="copyright">&copy; Florida Gulf Coast University. FPGA Server. All rights reserved.</div>
                </div>		
            </div>
        </body>
    </html>
