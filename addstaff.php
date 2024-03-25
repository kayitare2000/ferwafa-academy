<?php
session_start();
require('db_connect.php');

if(!isset($_SESSION['UserName']))
{
    header('Location:index.php'); 
}

?>
<?php
  
   
   if (isset($_POST['Submit'])) {
       
   
    
     $Status = stripslashes(mysqli_real_escape_string($con,$_POST['Status']));
     $UserName = stripslashes(mysqli_real_escape_string($con,$_POST['UserName']));
     $Password = stripslashes(mysqli_real_escape_string($con,$_POST['Password']));
     $Email = stripslashes(mysqli_real_escape_string($con,$_POST['Email']));

     $password = md5($Password);
     
     
     $check = "SELECT * FROM accounts WHERE UserName='".$UserName."'";    
     $checkquery = $con->query($check);  
     $numcheck = $checkquery->num_rows;
     if ($numcheck > 0)
     {
         
         echo "<script type='text/javascript'>alert('User Name is Already in Use!');
                     location='addstaff.php';    
           </script>";
     }
     
     else
     {
         
            $sql = "INSERT INTO accounts  VALUES ('','$UserName', '$password','$Status','$Email')";
                                     if ($con->query($sql) === TRUE)  
                                         {
                                             echo "<script type='text/javascript'>alert('User added Succesfully!'); 
                                                     location='viewstaff.php';    
                                                  </script>";
 
                                         } 
                                     else 
                                         {
                                                 echo "Error: " . $sql . "<br>" . $con->error;
                                            }
         
     }
   }
 
 
 
 $con->close();	
 
  
  
 ?>
<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>FERWAFA DEVELOPMENT</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" href="css/swiper.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/customScrollbar.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="style.css" href="dataTables.bootstrap5.min.css">  
    <link rel="stylesheet" href ="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">
<link rel="stylesheet" href ="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>

	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		

			<?php include('nav2.php'); ?> 
		
		
		<div class="tg-sliderbox" style="height:30%">
			
			<div class="tg-imglayer">
           
            </div> 
		
		</div>
		
		<main id="tg-main" class="tg-main tg-haslayout">

			<section class="tg-main-section tg-haslayout">
            <h1 style="margin:0px;padding:0px;"> <center>ADD STAFF <center></h1>
				<div class="container">
                    <div class="row">
                    <form action="" Method="POST">    
                        <div class="col-md-6">
                            <label>UserName: </label>      
                            <input type="text" name="UserName" class="form-control" placeholder="Enter Center Name" required>
                            <label>Password: </label>
                            <input type="Password" name="Password" class="form-control" placeholder="***********"  required> 
                            <label>Email: </label>
                            <input type="email" name="Email" class="form-control" required placeholder="Enter Email"> 
                            
                        </div>   

                        <div class="col-md-6">
                        <label>Status: </label>
                        <select name="Status" class="form-control" required>
                            <option value="">
                                -- Select Role --
                            </option>
                            <option value="admin"> Admin </option>
                            <option value="staff"> Staff </option>
                        </select>
                     
                     <br/> <br/>
                     <input type="Submit" name="Submit" value="Register" class="btn btn-Success" style="color:#fff;background:black;"> 
                     </br/>
                        </div>
                     
					
             </form>
                    </div>
                
                  
				</div>
			</section>
			

			

			

		</main>
		
		
        <?php include('footer.php'); ?>


	</div>

	<div class="tg-searchbox">
		<a id="tg-close-search" class="tg-close-search" href="javascript:void(0)"><span class="fa fa-close"></span></a>
		<div class="tg-searcharea">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<form class="tg-form-search">
							<fieldset>
								<input type="search" class="form-control" placeholder="keyword">
								<i class="icon-icon_search2"></i>
							</fieldset>
						</form>
						<p>Start typing and press Enter to search</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/vendor/jquery-library.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/customScrollbar.min.js"></script> 
	<script src="js/owl.carousel.js"></script>
	<script src="js/isotope.pkgd.js"></script>
	<script src="js/prettyPhoto.js"></script>
	<script src="js/swiper.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/countTo.js"></script>
	<script src="js/appear.js"></script>
	<script src="js/main.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>   
<script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>  
<script type="text/javascript" src="dataTables.bootstrap5.min.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script> 



</body>


</html>