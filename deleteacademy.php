<?php
	session_start();
	include('db_connect.php');
if(!isset($_SESSION['UserName']))
{
    header('Location:index.php'); 
}
else
{
    

if(isset($_GET['id']))
	{
		 $Id=$_GET['id'];
		
		$delete=mysqli_query($con,"DELETE FROM academy WHERE Id='$Id'");
		if($delete==TRUE)
		{
			echo '<script>alert("Academy deleted Successfully!!!")
		               window.location = "academy.php"</script>';
		} 
		
		else
		{
			echo '<script>alert("Deleting Academy Failed!!!")
		                   window.location = "acadedmy.php"</script>';
		}
	}
}	
?>