<?php
session_start();
require('db_connect.php');

if(!isset($_SESSION['AcademyName']))
{
    header('Location:index.php');  
}



if (isset($_POST['Change'])) {
 
  $Old = stripslashes(mysqli_real_escape_string($con,$_POST['Old'])); 
  $New = stripslashes(mysqli_real_escape_string($con,$_POST['New']));
  $New1 = stripslashes(mysqli_real_escape_string($con,$_POST['New1']));
  
  $oldhashed = md5($Old);
  $new_password = md5($New);
  
    
$check_db = "SELECT * FROM academy WHERE AcademyName='".$_SESSION['AcademyName']."'";
$db_query = $con->query($check_db);
$details = $db_query->fetch_assoc();

$db_password = $details['Password'];

if($oldhashed==$db_password)
{
    if($New==$New1)
    {
        $update = "UPDATE academy SET Password ='".$new_password."' WHERE AcademyName='".$_SESSION['AcademyName']."'";
        $update_query = $con->query($update);
        if($update_query)
        {
            echo "<script>alert(' Password Updated Succesfully ')</script>";
        }
        else
        {
            echo "<script>alert('Failure To Update Password')</script>";
        }
    }
    else
    {
        echo "<script>alert('New Password doesn't match retyped Password)</script>";
    }
}
else
{
    echo "<script>alert('Old Password is Incorrect')</script>";  
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
		

			<?php include('navacademy.php'); ?> 
		
		
		<div class="tg-sliderbox" style="height:30%">
			
			<div class="tg-imglayer">
           
            </div> 
		
		</div>
		
		<main id="tg-main" class="tg-main tg-haslayout">

			<section class="tg-main-section tg-haslayout">
            <h1 style="margin:0px;padding:0px;"> <center> <?php echo $_SESSION['AcademyName']; ?> CHANGE PASSWORD  <center></h1> 
				<div class="container">
                    <div class="row">
                    <form action="" Method="POST">    
                        <div class="col-md-6">
                                    <label>Old Password: </label>     
                                <input type="text" name="Old" class="form-control" placeholder="Old Password"  required>
                                <label>New Password: </label>
                                <input type="text" name="New" class="form-control" placeholder="New Password" required>
                                <label>Retype Password: </label>
                                <input type="text" name="New1" class="form-control" placeholder="Retype Password" required>
                               
                                
                        </div>   
                        
                        <div class="col-md-6">
                            
                            <input type="Submit" name="Change" class="btn btn-danger" value="Change Password">
                        </div>

                        
                     
					
             </form>
                    </div>
                
                  
				</div>
			</section>
			

			

			

		</main>
		
		
		<footer id="tg-footer" class="tg-footer tg-haslayout">
			
			<div class="tg-footerbar">
				<div class="container">
					<span class="tg-copyright"><a target="_blank" href="">FERWAFA DEVELOPMENT</a></span>
					
				</div>
			</div>
		</footer>

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