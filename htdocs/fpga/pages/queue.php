<!--
Author: Brett Stanaland
		
The purpose of this script is to create a queue
system so that only one user may log into the web
page and access the board at a time.-->

<html>
    <head>
    	<title>Queue</title>
    </head>
    <body onunload="Ragequit()">
    	Please wait, you are in the queue to use the board.
    </body>
</html>

<script>
    $(document).ready(function () {
        <?php 
            //gets new id and current user id from db
	    $connect = mysql_connect("localhost", "brittlemess","password") or die("Couldn't Connecy");
	    mysql_select_db("brittlemess") or die("Couldn't find DB");
		    OR
	    include("scripts/includes/database.php");
	    $query = mysql_query("SELECT * FROM Queue");
	    while($output = mysql_fetch_assoc($query)){
		$userId = $output['NextId'];
		$beingServed = $output['BeingServed'];
            }

	    $query = mysql_query("UPDATE Queue SET UserId = '" . ++$userId . "'");

    	    while($userId != $beingServed){
    		$query = mysql_query("SELECT * FROM Queue");
	    	while($output = mysql_fetch_assoc($query)){
		    $beingServed = $output['BeingServed'];
		}
    	    }
	
	    header("location:../pages/userMain.php");
        ?>
    });

    function Ragequit(){
        <?php
            //baboo remembers what you did
            $connect = mysql_connect("localhost", "brittlemess","password") or die("Couldn't Connecy");
	    mysql_select_db("brittlemess") or die("Couldn't find DB");
		    OR
	    include("scripts/includes/database.php");
	    $query = mysql_query("SELECT * FROM Queue");
	    while($output = mysql_fetch_assoc($query)){
		$baboo = $output['Baboo'] + $userId + ",";
            }    

            $query = mysql_query("UPDATE Queue SET Baboo = '" . $baboo . "'");
	    $dbh->exec($query);
        ?>
    }
</script>