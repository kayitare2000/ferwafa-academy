<?php 
session_start();
    include_once("db_connect.php"); 
   
    
if(!isset($_SESSION['UserName']))
{
    header('Location:index.php'); 
}

  if (isset($_POST['Submit'])) {
  
	$AcademyName = mysqli_real_escape_string($con,$_POST['AcademyName']);
	$Province = mysqli_real_escape_string($con,$_POST['Province']);
	$District = mysqli_real_escape_string($con,$_POST['District']);
	$Sector = mysqli_real_escape_string($con,$_POST['Sector']);
	$Cell = mysqli_real_escape_string($con,$_POST['Cell']);
	$Contact = mysqli_real_escape_string($con,$_POST['Contact']);
	$AcademyCoach = mysqli_real_escape_string($con,$_POST['AcademyCoach']);
	$Id = mysqli_real_escape_string($con,$_POST['Id']);
   

	$check = "SELECT * FROM academy WHERE AcademyName='".$AcademyName."'";    
	$checkquery = $con->query($check);  
	$numcheck = $checkquery->num_rows;
	if ($numcheck > 1)
	{
		
		echo "<script type='text/javascript'>alert('Academy Name is Already Registered!');
					location='academy_registration.php';   
		  </script>";
	}
	else 
	{      
		
	
			$sql = "Update academy  SET AcademyName='$AcademyName', Province='$Province', District='$District', Sector='$Sector', Cell='$Cell', Contact='$Contact', Coach='$AcademyCoach' WHERE Id='".$Id."'";
			if ($con->query($sql) === TRUE)
				{

							echo "<script type='text/javascript'>alert('Academy Information Edited Succesfully!'); 
									location='academy.php';   
								 </script>";

				} 
			else 
				{
					echo "Error: " . $sql . "<br>" . $con->error;
				}
        }
		

	}
	
  if (isset($_POST['Upload'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir.basename($_FILES["Photo"]["name"]);
        $uploadOk=1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["Photo"]["tmp_name"]);
        $photo_name = $_FILES["Photo"]["name"];
        $Id=$_POST['Id'];
      
     
          
          if($_FILES["Photo"]["size"] > 5000000)
            {
                echo "<script>alert('Image is Too large')</script>";
               
               # $uploadOk = 0;
            }
          else
             {
              if($imageFileType == "jpg" || $imageFileType =="png" || $imageFileType =="jpeg" || $imageFileType == "gif")
                 {

                    if (move_uploaded_file($_FILES["Photo"]["tmp_name"],$target_file)) 
                    {
                        
                        $sql = " UPDATE academy SET Photo = '$target_file' WHERE Id='$Id'";
	                    if ($con->query($sql) === TRUE)
				            {
                                 echo "<script type='text/javascript'>alert('Coach Photo Changed Succesffuly!');
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
                     echo "<script>alert('Only JPG, JPEG,PNG,GIF Files are allowed')</script>";
                 }
              
             }

        } 

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
            <h1 style="margin:0px;padding:0px;"> <center> EDIT ACADEMY DATA  <center></h1>
				<div class="container">
                    <div class="row">
                    <?php

if(isset($_GET['id']))
{

     $Id = $_GET['id']; 
    $delete=mysqli_query($con,"SELECT * FROM academy WHERE Id='$Id'");
    $child =mysqli_fetch_array($delete);
    

?>	
                    <div class="col-md-6">     
            <form action="" Method="POST" enctype="multipart/form-data" >       
                     <label>Football Center Name: </label>      
                     <input type="text" name="AcademyName" class="form-control" value="<?php echo $child['AcademyName'];?>" placeholder="Enter Academy Name" required>
                     <input type="hidden" name="Id" value="<?php echo $Id;?>">
                     <label>Academy Coach: </label>
                     <input type="text" name="AcademyCoach" class="form-control" value="<?php echo $child['Coach'];?>" placeholder="Enter Coach Name" required> 
                     <label>Province: </label>
                     <input type="text" name="Province" class="form-control" value="<?php echo $child['Province'];?>" placeholder="Enter Province" required>
					 <label>District: </label>
                     <input type="text" name="District" class="form-control" value="<?php echo $child['District'];?>" placeholder="Enter District" required>
					 <label>Sector: </label>
                     <input type="text" name="Sector" class="form-control" value="<?php echo $child['Sector'];?>" placeholder="Enter Sector" required>
					 <label>Cell: </label>
                     <input type="text" name="Cell" class="form-control" value="<?php echo $child['Cell'];?>" placeholder="Enter Cell" required> 
                     <label>Contact: </label>
                     <input type="text" name="Contact" class="form-control" value="<?php echo $child['Contact'];?>" placeholder="Contact" required> 
                     
                     <input type="Submit" name="Submit" value="Edit" class="btn btn-success"> 
             </form>    
        </div>

<?php
}
?>


        <div class="col-md-6">
                <img src="<?php echo $child['Photo']; ?>" width="100%" alt="No Pic">
                <form METHOD="POST" enctype="multipart/form-data" action="" >
			      <label>Upload New Coach Photo: </label>
					  <input type="file" name="Photo" class="form-control" required> 
					   <input type="hidden" name="Id" class="form-control" value="<?php echo $Id; ?>" >
					   <input type="Submit" value="Upload" name="Upload" class="btn btn-success">   
			      
			  </form>
			</div> <div class="col-md-3">      

        </div>

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