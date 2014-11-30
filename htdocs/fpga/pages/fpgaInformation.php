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
                        <li><a href="userMain.php" >Project Information</a></li>
                        <li><a href="program.php" >Board and Console</a></li>
						<li><a href="fpgaInformation.php" >Documentation</a></li>
                    </ul>
                    <div class="content">
                        <div class="contentleft">
                        
                            <!-- Page description -->
                            <h1>Documentation</h1>
							
							<h2>User Manuals</h2>
							<a href="../documents/Vincent Giannone FPGA User Manual.pdf" target="myiframe">Vincent Giannone FPGA User Manual</a><br><br>
							<a href="../documents/Porter & Kovtunenko FPGA User Manual.pdf" target="myiframe">Porter & Kovtunenko FPGA User Manual</a><br><br>
							
							<br>
							<h2>Digilent Atlys Information</h2>
							<a href="../documents/Atlys Board Reference Manual.pdf" target="myiframe">Atlys Board Reference Manual</a><br><br>
							
							<br>
							<h2>Spartan-6 Information</h2>
							<a href="../documents/Spartan 6 FPGA Configuration User Guide.pdf" target="myiframe">Spartan 6 FPGA Configuration User Guide</a><br>
							
							<!-- Comment Begin.. -->
							<br>
							<iframe name = "myiframe" style="height:250px;width:700px;"></iframe>
							<br>
							<br>
                            <!-- Comment End.. -->
      
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

    <script>
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
