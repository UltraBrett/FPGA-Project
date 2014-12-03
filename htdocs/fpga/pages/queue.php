<!--
Author: Brett Stanaland
		
The purpose of this script is to create a queue
system so that only one user may log into the web
page and access the board at a time.-->

<html>
    <head>
		<meta charset="utf-8">
    	<title>Queue</title>
		
    </head>
    <body>
    	Please wait, you are in the queue to use the board.
    </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>

     window.onload = function () {
		
		<?php 
            //gets new id and current user id from db
	    $connect = mysql_connect("localhost", "root","") or die("Couldn't Connect");
	    mysql_select_db("brittlemess") or die("Couldn't find DB");
		
	    $query = mysql_query("SELECT * FROM queue");
	    while($output = mysql_fetch_assoc($query)){
			$userId = $output['NextId'];
			$beingServed = $output['BeingServed'];
        }
		
		$newId = $userId + 1;
		$query = mysql_query("UPDATE queue SET NextId = '" . $newId . "'");
		if($userId == $beingServed){
			header("location:../pages/userMain.php");
		}
        ?>   
		
	}
	
	window.setInterval(function(){
		var userId = <?php echo $userId ?>;
		
		$.ajax({
			method: 'get',
			url: "../scripts/checkServed.php",
			success: function(result)
			{
				
			   if(result == userId){
				
					window.location.assign("http://69.88.163.56/fpga/pages/userMain.php");
			   }
			}
		});
	}, 3000);
	
	window.addEventListener("beforeunload", function (e) {
		$.ajax({
			type: 'post',
			url: '../scripts/baboo',
			data: {
				Id: <?php echo $userId ?>
			}
		});
	});
</script>