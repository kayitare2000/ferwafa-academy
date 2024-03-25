<?php
session_start();
require('db_connect.php');

if(!isset($_SESSION['UserName']))
{
    header('Location:index.php'); 
}

?>
<?php
  
   $msg = "";
 
   $target_dir = "uploads/";
   $target_dir_license = "uploads/";
   
   if (isset($_POST['Submit'])) {
       
    $target_file = $target_dir.basename($_FILES["Photo"]["name"]);
    $target_license = $target_dir_license.basename($_FILES["License"]["name"]); 
    
    $uploadOk=1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $licenseFileType = strtolower(pathinfo($target_license,PATHINFO_EXTENSION));
    
     $AcademyName = stripslashes(mysqli_real_escape_string($con,$_POST['AcademyName']));
     $Province = stripslashes(mysqli_real_escape_string($con,$_POST['Province']));
     $District = stripslashes(mysqli_real_escape_string($con,$_POST['District']));
     $Sector = stripslashes(mysqli_real_escape_string($con,$_POST['Sector']));
     $Cell = stripslashes(mysqli_real_escape_string($con,$_POST['Cell']));
     $Contact = stripslashes(mysqli_real_escape_string($con,$_POST['Contact']));
     $AcademyCoach = stripslashes(mysqli_real_escape_string($con,$_POST['AcademyCoach']));
     $applicant_phone = ltrim($Contact, "0");
     $Password = md5($applicant_phone); 
     
     
     $check = "SELECT * FROM academy WHERE AcademyName='".$AcademyName."'";    
     $checkquery = $con->query($check);  
     $numcheck = $checkquery->num_rows;
     if ($numcheck > 0)
     {
         
         echo "<script type='text/javascript'>alert('Academy Name is Already Registered!');
                     location='academy_registration.php';   
           </script>";
     }
     
     else
     {
         
             $check = getimagesize($_FILES["Photo"]["tmp_name"]);
             $photo_name = $_FILES["Photo"]["name"];
             
             $check1 = getimagesize($_FILES["License"]["tmp_name"]);
             $license_name = $_FILES["License"]["name"];
     
               if($_FILES["Photo"]["size"] > 5000000)
             {
                 echo "<script>alert('Image is Too large')</script>";
                
                # $uploadOk = 0;
             }
           else
              {
               if($imageFileType == "jpg" || $imageFileType =="png" || $imageFileType =="jpeg" || $imageFileType == "gif")
                  {
                   if($licenseFileType == "jpg" || $licenseFileType =="png" || $licenseFileType =="jpeg" || $licenseFileType == "gif" || $licenseFileType == "pdf" )
                  {
                   
                   if (move_uploaded_file($_FILES["Photo"]["tmp_name"],$target_file) AND move_uploaded_file($_FILES["License"]["tmp_name"],$target_license) )  
                     {
                         
                                    //  $sql = "INSERT INTO academy  VALUES ('','$AcademyName', '$Province','$District','$Sector', '$Cell', '$Contact', '$AcademyCoach','$target_file','$target_license',$Password')";
                                        $sql = "INSERT INTO academy VALUES ('', '$AcademyName', '$Province', '$District', '$Sector', '$Cell', '$Contact', '$AcademyCoach', '$target_file', '$target_license', '$Password')";

                                     if ($con->query($sql) === TRUE)
                                         {
                                             echo "<script type='text/javascript'>alert('Academy Registered Succesfully!'); 
                                                     location='academy.php';    
                                                  </script>";
 
                                         } 
                                     else 
                                         {
                                                 echo "Error: " . $sql . "<br>" . $con->error;
                                            }
                     }
                     
                  } 
                  else
                  {
                      echo "<script>alert('License only accepts PDF, PNG,JPG, JPEG and GIF')</script>";
                  }
                  
                  }
 
                     
                else
                  {
                      echo "<script>alert('Photo accepts Only  JPG, JPEG,PNG,GIF ')</script>";
                  }
               
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
            <h1 style="margin:0px;padding:0px;"> <center>FOOTBALL CENTRE REGISTRATION <center></h1>
				<div class="container">
                    <div class="row">
                    <form action="" Method="POST" enctype="multipart/form-data" >    
                        <div class="col-md-6">
                                <label>Football Center Name: </label>      
                            <input type="text" name="AcademyName" class="form-control" placeholder="Enter Center Name" required>
                            <label>Football Coach: </label>
                            <input type="text" name="AcademyCoach" class="form-control" placeholder="Enter Coach Name"  required> 
                            <label>Photo of Coach: </label>
                            <input type="file" name="Photo" class="form-control" required>
                            <label>License: </label>
                            <input type="file" name="License" class="form-control" required>
                            <label>Province: </label>
                            <input type="text" name="Province" class="form-control" placeholder="Enter Province" pattern='[A-Za-z]{2,}'required>
                        </div>   

                        <div class="col-md-6">
                        <label>District: </label>
                     <input type="text" name="District" class="form-control" placeholder="Enter District" pattern='[A-Za-z]{2,}'required>
					 <label>Sector: </label>
                     <input type="text" name="Sector" class="form-control" placeholder="Enter Sector" pattern='[A-Za-z]{2,}'required>
					 <label>Cell: </label>
                     <input type="text" name="Cell" class="form-control" placeholder="Enter Cell" pattern='[A-Za-z]{2,}'required> 
                     <label>Contact: </label>
                     <input type="text" name="Contact" class="form-control" placeholder="Contact" pattern='[0-9]{10}'required> 
                     <label></label>
                     <br/>
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


<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
		responsive: true,
        buttons: [
            'copyHtml5',
            'csvHtml5',   
        ]
    } );
} );
</script>
</body>


</html>