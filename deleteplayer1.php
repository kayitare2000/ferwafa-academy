<?php
require('db_connect.php');
if(isset($_GET['id'])) 
	{
		echo $Id=$_GET['id'];
		
		$delete=mysqli_query($con,"DELETE FROM children WHERE Id='$Id'");
		if($delete==TRUE)
		{
			echo '<script>alert("Player deleted Successfully!!!")
		               window.location = "players_through_admin.php"</script>';
		} 
		
		else
		{
			echo '<script>alert("Deleting Player Failed!!!")
		                   window.location = "players_through_admin.php"</script>';
		}
	}
?>