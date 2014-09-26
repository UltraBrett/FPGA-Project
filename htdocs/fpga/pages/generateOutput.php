<?php 

							print("Here");
							/*
							* Author: Vincent Giannone
							* Date: 12/31/2013
							* File: program.php
							* 
							* 
							* 
							* 
							* 
							*/
							/*
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
							//print("Executing..<br>");
							
							// Change the allowed maximum execution time to 300 seconds (5 minutes) 
							ini_set('max_execution_time', 300);
							// Save the current working directory path
							$save_cwd = getcwd();
							// Change the current working directory to the project to be programmed
							chdir("../projects/users/" . $username . "/" . $projectToBeProgramed);
							
							// Sets the header of the HTML file 
								header('Content-Encoding: text/html;');
								// Sets the time limit a script can run without a fatal error being returned..
								// 30 seconds it the default
								set_time_limit(100);
								
								// 
								if (ob_get_level() == 0) 
									ob_start();
								
								// 
								$handle = popen($projectToBeProgramed . ".bat", "r");
								
								// 
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
								
								// Change the ucrrent working directory to the saved directory
						chdir($save_cwd);
						*/	
							
							
							
						?>