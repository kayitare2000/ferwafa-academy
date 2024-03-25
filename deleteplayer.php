<?php
	session_start();
    include('db_connect.php');
  

if(isset($_GET['id'])) 
	{
		 $Id=$_GET['id'];
		
		$delete=mysqli_query($con,"DELETE FROM children WHERE Id='$Id'");
		if($delete==TRUE)
		{
			echo '<script>alert("Player deleted Successfully!!!")
		               window.location = "academypage.php"</script>';
		} 
		
		else
		{
			echo '<script>alert("Deleting Player Failed!!!")
		                   window.location = "academypage.php"</script>';
		}
	}
	
?>
