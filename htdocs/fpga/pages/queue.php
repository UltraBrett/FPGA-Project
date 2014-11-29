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
	    chown("FPGAServer.sqlite", "Administrator");
	    chmod("FPGAServer.sqlite", 0777);
	    $dbh = new PDO("sqlite:FPGAServer.sqlite");
	    $query = 'SELECT "NextId", "BeingServed" FROM "Queue"';
	    $result = $dbh->query($query);
	    $output = $result->fetch();

	    $userId = $output['NextId'];
	    $beingServed = $output['BeingServed'];

	    $query = 'UPDATE "Queue" SET "UserId" = "' . ++$userId . '"  ';
	    $dbh->exec($query);

    	    while($userId != $output['BeingServed']){
    		$query = 'SELECT "BeingServed" FROM "Queue"';
    		$result = $dbh->query($query);
    		$output = $result->fetch();
    	    }
	
	    header("location:../pages/userMain.php");
        ?>
    });

    function Ragequit(){
        <?php
            //baboo remembers what you did
            chown("FPGAServer.sqlite", "Administrator");
	    chmod("FPGAServer.sqlite", 0777);
	    $dbh = new PDO("sqlite:FPGAServer.sqlite");
	    $query = 'SELECT "Baboo" FROM "Queue"';
	    $result = $dbh->query($query);
	    $output = $result->fetch();

            $baboo = $output['Baboo'] + $userId + ",";

            $query = 'UPDATE "Queue" SET "Baboo" = "' . $baboo . '"  ';
	    $dbh->exec($query);
        ?>
    }
</script>