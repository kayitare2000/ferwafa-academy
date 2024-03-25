<?php 
session_start();
require('db_connect.php');
?>
<!doctype html>

<?php
			$sql_query1 = "SELECT * FROM children "; 
			$resultset1 = $con->query($sql_query1) or die("database error:". mysqli_error($con));
            $players = $resultset1->num_rows;

			$sql_query = "SELECT * FROM academy ";
			$resultset = $con->query($sql_query) or die("database error:". mysqli_error($con));
            $academies = $resultset->num_rows;
            
            $coach_query = "SELECT Coach FROM academy WHERE Coach !=''";
			$resultcoach = $con->query($coach_query) or die("database error:". mysqli_error($con));
            $coach_num = $resultcoach->num_rows;

?>

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
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	

</head>
<body>
	
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		

			<?php include('nav.php'); ?> 
		
		
		<div class="tg-sliderbox">
			
			<div class="tg-imglayer">
				<img src="images/bg-pattran.png" alt="image desctription">
			</div>
			<div id="tg-home-slider" class="tg-home-slider tg-haslayout">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="container">
							
							<div class="tg-slider-content">
							<h1>FERWAFA ACADEMY  <span> LICENSING PLATFORM</span></h1>
								<div class="tg-btnbox">
									<h2>EST JUN 1972</h2>
									
									<a class="tg-btn" href="apply.php" ><span>APPLY</span></a>
																</div>
							</div>
						</div>
					</div>
					<div class="swiper-slide"> 
						<div class="container">
							<figure class="floating">
								<img src="images/slider/img-01.png" alt="image description">
							</figure>
							<div class="tg-slider-content">
								<h1>FERWAFA ACADEMY  <span>LICENSING PLATFORM</span></h1>
								<div class="tg-btnbox">
									<h2>EST JUN 1972</h2> 
									
									
									<a class="tg-btn" href="apply.php" ><span>APPLY</span></a>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<div class="tg-btn-next">
					<span>next</span>
					<span class="fa fa-angle-down"></span>
				</div>
				<div class="tg-btn-prev">
					<span>prev</span>
					<span class="fa fa-angle-down"></span>
				</div>
			</div>
		</div>
		
		<main id="tg-main" class="tg-main tg-haslayout">
			
			<section class="tg-main-section tg-haslayout" id="about-us">
				<div class="container">
					<div class="tg-section-name">
						<h2>About FERWAFA</h2>
					</div>
					<div class="col-sm-11 col-xs-11 pull-right">
						<div class="row">
							<div class="tg-aboutussection">
								<div class="row">
									<div class="col-md-4 col-sm-12 col-xs-12">
										<figure>
											<img src="images/fer.png" alt="image description" width="20%">
										</figure>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<div class="tg-contentbox">
											<div class="tg-section-heading"><h2>FERWAFA</h2></div>
											<div class="tg-description">
												<p>Rwandese Federation of Association Football (FERWAFA) was founded in 1972 and became a FIFA and FIFA affiliate in 1978. From the above setting, Ferwafa operates within the framework of the FIFA/CAF regulations; holding itself to respect them and its members to comply with its own statute and the directives/decisions from FIFA/CAF. FERWAFA’s motto is “Unity, Discipline and Victory”,</p>
											</div>
											<div class="tg-btnbox">
												<a class="tg-btn" href="https://www.ferwafa.rw/"><span>read more</span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<h1><center>Statistics</center></h1>
		    

			<section class="tg-main-section tg-haslayout tg-bgdark" id="Statistics">

				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<div class="tg-statistics">
								<div class="tg-statistic tg-goals">
									<span class="tg-icon icon-Icon2"></span>
									<h2><span class="tg-statistic-count" data-from="0" data-to="<?php echo $academies;?>" data-speed="8000" data-refresh-interval="50"><?php echo $academies; ?></span></h2>
									<h3>Academies</h3>
								</div>
								<div class="tg-statistic tg-activeplayers">
									<span class="tg-icon icon-Icon1"></span>
									<h2><span class="tg-statistic-count" data-from="0" data-to="<?php echo $coach_num ?>" data-speed="8000" data-refresh-interval="50"><?php echo $coach_num ?></span></h2>
									<h3>Coache(s)</h3>
								</div>
								<div class="tg-statistic tg-activeteams">
									<span class="tg-icon icon-Icon3"></span>
									<h2><span class="tg-statistic-count" data-from="0" data-to="<?php echo $players; ?>" data-speed="8000" data-refresh-interval="50"><?php echo $players; ?></span></h2>
									<h3>Players</h3>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<section>
				<div class="container">
					<div class="row">

					</div>
				</div>
			</section>
			
			<section class="tg-videobox tg-haslayout" style="padding-top:30px;">
				<figure>
					<img src="images/bg-video.jpg" alt="image description">
					<figcaption>
						<a class="tg-playbtn" href="" data-rel="prettyPhoto[iframe]"></a>
						<h2>TRAINING</h2>
					</figcaption>
				</figure>
			</section>
			
			<section class="tg-main-section tg-haslayout" id="Gallery">
				<div class="container">
					<div class="tg-section-name">
						<h2>GALLERY</h2>
					</div>
					<div class="col-sm-11 col-xs-11 pull-right">
						<div class="row">
							<div class="tg-blogpost">
								<div class="row">
									<div class="col-sm-4 col-xs-12">
										<article class="tg-post">
											<figure class="tg-postimg">
												<a href="#">
													<img src="images/fer1.jfif" alt="image description">
												</a>
												<figcaption>
													<ul class="tg-postmetadata">
														<li><a href="#">by admin</a></li>
														
													</ul>
												</figcaption>
											</figure>
											<div class="tg-posttitle"><h3><a href="#">ACADEMY PLAYERS</a></h3></div>
											
											
										</article>
									</div>
									<div class="col-sm-4 col-xs-12">
										<article class="tg-post">
											<figure class="tg-postimg">
												<a href="#">
													<img src="images/fer2.jpg" alt="image description">
												</a>
												<figcaption>
													<ul class="tg-postmetadata">
														<li><a href="#">by admin</a></li>
										
													</ul>
												</figcaption>
											</figure>
											<div class="tg-posttitle"><h3><a href="#">POSING FOR A PHOTOSHOOT</a></h3></div>
											
										</article>
									</div>
									<div class="col-sm-4 col-xs-12">
										<article class="tg-post">
											<figure class="tg-postimg">
												<a href="#">
													<img src="images/fer3.jpg" alt="image description">
												</a>
												<figcaption>
													<ul class="tg-postmetadata">
														<li><a href="#">by admin</a></li>
										
													</ul>
												</figcaption>
											</figure>
											<div class="tg-posttitle"><h3><a href="#">POSING FOR A PHOTOSHOOT</a></h3></div>
											
										</article>
									</div>
								</div>
							</div>
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
	
	<?php 
if (isset($_POST['Login'])) {
		 $username=stripslashes($_POST['Username']);
		 $Password= stripslashes($_POST['Password']); 
		 $password = md5($Password);
		 
		 

        $query  = $con->query("SELECT * FROM accounts WHERE Username='$username' AND Password='$password'"); 
        $row     = mysqli_fetch_array($query);         
        $num_row = mysqli_num_rows($query);    
        if ($num_row > 0) {
             $_SESSION['hr_id'] = $row['Id']; 
            $_SESSION['UserName'] = $row['Username'];
            $_SESSION['Status'] = $row['Status'];
            
            if($row['Status']=='staff')
            {
				$_SESSION['Status'] = $row['Status'];
            echo "<script type='text/javascript'>alert('Login Successfully!!');document.location = 'academy.php'</script>"; 
            }
            elseif($row['Status']=='admin')
            {
				$_SESSION['Status'] = $row['Status'];
				echo "<script type='text/javascript'>alert('Successfully Logged In '); document.location = 'academy.php';</script>";
            }
            
           
        } else { 
            echo "<script type='text/javascript'>alert('Invalid Email or Password,Please try again!');document.location = 'index.php'</script>";
        }
	}
	

if (isset($_POST['Access'])) {
		 $username=stripslashes($_POST['Username']);
		 $Password= stripslashes($_POST['Password']); 
		 $password = md5($Password);
		 
		 

        $query  = $con->query("SELECT * FROM academy WHERE Contact='$username' AND Password='$password'"); 
        $row     = mysqli_fetch_array($query);         
        $num_row = mysqli_num_rows($query);    
        if ($num_row > 0) {
            $_SESSION['Id'] = $row['Id']; 
            $_SESSION['AcademyName'] = $row['AcademyName'];

				echo "<script type='text/javascript'>alert('Success '); document.location = 'academypage.php';</script>";
            

           
        } else { 
            echo "<script type='text/javascript'>alert('Invalid Details,Please try again!');document.location = 'index.php'</script>";
        }
	}


?>
<style>
    /* Prevent automatic capitalization of input values */
    input[type="text"],
    input[type="password"],
    textarea {
        text-transform: none;
    }
</style>
<div class="modal fade" id="tg-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background:#fff;">
  <div class="modal-dialog" role="document">
    <div class="tg-modal-content">
      <div class="modal-header">
	  
        <h5 class="modal-title" id="exampleModalLabel"> <center> ACADEMY LOGIN AREA </center></h5>
        <center><p style="color:red;">For Academy Use Only</p> </center> 
		<center><img src="images/fer.png" alt="image description" width="20%"></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--<div class="tg-formarea">-->
          <div class="tg-border-heading">
            <h3>Login</h3>
          </div>
          <form class="tg-loginform" method="post" action="">
            <fieldset>
              <div class="form-group">
                <input type="text" name="Username" class="form-control" placeholder="Contact">
              </div>
              <div class="form-group">
                <input type="password" name="Password" class="form-control" placeholder="password">
              </div>
             
              <div class="form-group">
                <button class="tg-btn tg-btn-lg" type="submit" name="Access">Login</button>
              </div>
            </fieldset>
          </form>
     
      </div>
      
    </div>
  </div>
</div>



<div class="modal fade" id="tg-adminlogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background:#fff;">
  <div class="modal-dialog" role="document">
    <div class="tg-modal-content">
      <div class="modal-header">
	  <center><img src="images/fer.png" alt="image description" width="20%"></center>
        <h5 class="modal-title" id="exampleModalLabel"> <center> ADMIN </center></h5>
		
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--<div class="tg-formarea">-->
          <div class="tg-border-heading">
			
            <h3>Login</h3>
          </div>
          <form class="tg-loginform" method="post" action="">
            <fieldset>
              <div class="form-group">
                <input type="text" name="Username" class="form-control" placeholder="username">
              </div>
              <div class="form-group">
                <input type="password" name="Password" class="form-control" placeholder="password">
              </div>
              
              <div class="form-group">
                <button class="tg-btn tg-btn-lg" type="submit" name="Login">Login Now</button>
              </div>
            </fieldset>
          </form>
       
      </div>
      
    </div>
  </div>
</div>



	<style>
    /* Custom CSS to increase the modal width */
    #tg-register .modal-dialog {
        max-width: 1000px !important;
        width: 150% !important; 
        /* margin: auto !important; Center the modal */
    }
</style>
	<div class="tg-modalbox modal  fade" id="tg-register" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="tg-modal-content">
			<form action="" method="POST"  enctype="multipart/form-data">
		<div class="row">
		    
			<div class="col-md-4">
        			<label>First Name: </label>      
                    <input type="text" name="FirstName" class="form-control" placeholder="First Name" required>
                    <label>Last Name: </label>      
                    <input type="text" name="LastName" class="form-control" placeholder="Last Name" required>
                    <label>D.O.B: </label>      
                    <input type="Date" name="DOB" class="form-control"  required>
                    <label>Gender: </label>      
                    <select name="Gender" required class="form-control">
                        <option value="Male"> Male</option>
                        <option value="Female"> Female</option>
                    </select>
			</div>
			
        <div class="col-md-4">     
                     
                     <label>Copy of Registered Status: </label>
                     <input type="file" name="RegisteredStatus" class="form-control"   required> 
                     <label>Proof of Registration and Status </label>
					 <input type="file" name="ProofOfRegistration" class="form-control"   required> 
                     <label>Declaration of Registration: </label>
                     <input type="file" name="DecalarationofRegistration" class="form-control" required>
					 <label>Organization Chart of the academy: </label>
                     <input type="file" name="OrganizationalChart" class="form-control" required>
					 <label>Proof of implementation of mechanism to protect and safeguard children rights : </label>
                     <input type="file" name="ProofOfImplementationMechanism" class="form-control"  required>
					 
               
        </div>

        <div class="col-md-4">      
                     <label>Minimum of one coach holding a D license issued by ferwafa</label>
                     <input type="file" name="CoachLicense" class="form-control" required> 
                      <label>Coach Name:</label>
                     <input type="text" name="CoachName" class="form-control" placeholder="Coach Name" required> 
                     <label>Coach Picture:</label>
                     <input type="file" name="CoachPicture" class="form-control" required>
                     <label>Acceptable comprehensive youth development program  </label>
                     <input type="file" name="YouthDevelopmentProgram" class="form-control" required> 
                     <label>Proof of Payment  </label>
                     <input type="file" name="ProofOfPayment" class="form-control" required>
                     
        </div>
        
        <div class="col-md-4">
                     <label>Picture of Pitch: </label>
                     <input type="file" name="PictureOfPitch" class="form-control"   required> 
                     <label>Picture of a stock of training equipment </label>
					 <input type="file" name="TrainingEquipment" class="form-control"   required> 
                     <label>First Aid Box: </label>
                     <input type="file" name="FirstAidBox" class="form-control" required>
					 <label>Proof of Insurance:</label>
                     <input type="file" name="ProofOfInsurance" class="form-control" required>
					 
                     <br/>
                     <input type="Submit" name="Apply" value="Apply" class="btn btn-dark"> 
                     </br/>
            
        </div>
        
        </form> 
				
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
</body>


</html>