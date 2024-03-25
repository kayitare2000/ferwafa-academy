<?php
session_start();
require('db_connect.php');

if(!isset($_SESSION['UserName']))
{
    header('Location:index.php'); 

}
$Id = $_GET['id'];
$check = "SELECT * FROM applications WHERE Id='".$Id."'";
$checkquery = $con->query($check); 
$host = $_SERVER['HTTP_HOST'];
if ($checkquery) {
    $query_test = $checkquery->fetch_assoc();
    
    if ($query_test) {
        $application_status = $query_test['Status'];
        $applicant_email = $query_test['Email'];
        $applicant_phone_input_field = $query_test['Contact'];
        $applicant_phone = ltrim($applicant_phone_input_field, "0");
        $AcademyName = $query_test['AcademyName'];
        $password = md5($applicant_phone);
        //echo "Yes";
    } else {
        echo "No application found with the provided Id.";
    }
} else {
    echo "Error executing the query: " . $con->error;
}

?>
<?php
  
   $msg = "";
 
   $target_dir = "uploads/";
   
   if(isset($_POST['Approve']))
   {  
        $approve = "Update applications SET Status ='Approved' WHERE Id='".$Id."' ";
        if ($con->query($approve) === TRUE)
        {

            if($host =='localhost')
            {
                     $add_password = "Update academy SET Password = '$password' WHERE AcademyName='".$AcademyName."' ";
                     $con->query($add_password);
                     echo "<script>alert('Approved and License has been granted to Academy')</script>";
            }
            else
            {
             $subject = "Congratulations - Application Approved";
             $message = "After carefull consideration of Submitted Documents, We wish to Inform you that your Application has been Approved.";
             $headers = "From: no-reply@ferwafadevelopment.com"; 

            if(mail($applicant_email, $subject, $message, $headers)) 
               {
                     $add_password = "Update academy SET Password = '$password' WHERE AcademyName='".$AcademyName."' ";
                     $con->query($add_password);
                     echo "<script>alert('Approved and License has been granted to Academy')</script>";
                }
           }
        }
        else
        {
            echo "<script>alert('Error in Approving and Granting License')</script>";
        }
   }
   
   if(isset($_POST['Decline'])) 
   { 
        $approve = "Update applications SET Status ='Denied' WHERE Id='".$Id."' ";
        if ($con->query($approve) === TRUE)
        {
            if($host == 'localhost')
            {
            echo "<script>alert('Application has Been denied. Kindly contact us for further details.')</script>";  
            }
            else
            {
             $subject = "Application Declined";
             $message = "We wish to Inform you that your Application has been denied. Kindly contact us for Further details";
             $headers = "From: no-reply@ferwafadevelopment.com"; 

            if(mail($applicant_email, $subject, $message, $headers)) 
               {
                     echo "<script>alert('Application has been denied')</script>";
               }
          }
        } 
        else
        {
            echo "<script>alert('Error ')</script>";
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
<?php



?>
			<section class="tg-main-section tg-haslayout">
            
				<div class="container">
                    <div class="row">
                        <?php
                        if($application_status=='')
                        {
                        ?>
                        
                        <h1 style="margin:0px;padding:0px;"> <center> TAKE ACTION ON APPLICATION  <?php echo $Id; ?>  <center></h1>
                    <form action="" Method="POST" enctype="multipart/form-data" >    
                        <div class="col-md-6">
                            <input type="Submit" name="Approve" value="Approve and Grant License" class="btn btn-Success" style="color:#fff;background:green;">     
                        </div>   

                        <div class="col-md-6">
                        
                     <input type="Submit" name="Decline" value="DECLINE APPLICATION" class="btn btn-Success" style="color:#fff;background:red;"> 
                     </br/>
                        </div>
                     
					
             </form>
                    <?php
                            
                        }
                        else
                        { 
                    ?>
                       <h1 style="color:red;"> DECISION HAS  BEEN TAKEN ON THIS APPLICATION </h1>
                    <?php
                        }
                        
                    ?>
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