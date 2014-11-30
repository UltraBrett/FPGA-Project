<?php
	$connect = mysql_connect("localhost", "root","") or die("Couldn't Connect");
	mysql_select_db("brittlemess") or die("Couldn't find DB");
	$query = mysql_query("SELECT * FROM queue");
	while($output = mysql_fetch_assoc($query)){
		$beingServed = $output['BeingServed'];
	}
	mysql_close();
?>

return <?php echo $beingServed ?>;