    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    
    <html>
        <head>
        <title>FPGA Server</title>

        <meta name="description" content="Designed and developed by Codify Design Studio - codifydesign.com" />
        <link rel="stylesheet" type="text/css" href="../stylesheet.css" />
            
        </head>
        
        <body>
            <div class="container"> 
                <div class="bannerArea">			
                    <div class="toplogo"><a href="../index.php"><img src="../images/Xilinx-logo.jpg" width="365" height="90" border="0" /></a></div>
                </div>
                <div class="contentArea">
                    <ul class="leftnavigation">
						<li><a href="../index.php" >Login</a></li>
                        <li><a href="#" >Project Information</a></li>
						<li><a href="#" >Board and Console</a></li>
						<li><a href="#" >Documentation</a></li>
                    </ul>
                    <div class="content">
                        <div class="contentleft">
                        
                            <!-- Page description -->
                            <h1>Incorrect User Information. Either:</h1>
                            <ul>
								<li>Username already exists</li>
								<li>A field was left empty</li>
								<li>Must have a registered FGCU email account</li>
							</ul>
							<br>
							
                            <!-- Add new user fields begin.. -->
                            <form  method="post" action="../scripts/addUser.php">
								Enter Username: <input type="text" id="username" name="username"><br>
								Enter Password:&nbsp <input type="password" id="password" name="password"><br>
								Enter Email:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="email" id="email" name="email"><br>
								<br>
								<input type="submit" value="Submit"> &nbsp &nbsp <a href="../pages/newUser.php" style="text-decoration: none">New User</a>
								<br>
								<br>
							</form>
                            <!-- Add new user fields end.. -->
							
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
