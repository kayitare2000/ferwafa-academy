<?php
session_start();
require('db_connect.php');

if(!isset($_SESSION['UserName']))
{
    header('Location:index.php');  
}

$msg = ""; 
$error = "";   
$target_dir = "uploads/";

if (isset($_POST['Submit'])) {
 $target_file = $target_dir.basename($_FILES["Photo"]["name"]);
 $uploadOk=1;

 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $FirstName = stripslashes(mysqli_real_escape_string($con,$_POST['FirstName']));
  $LastName = stripslashes(mysqli_real_escape_string($con,$_POST['LastName']));
  $FathersName = stripslashes(mysqli_real_escape_string($con,$_POST['FathersName']));
  $MothersName = stripslashes(mysqli_real_escape_string($con,$_POST['MothersName']));
  $DOB = stripslashes(mysqli_real_escape_string($con,$_POST['DOB']));
  $NID = stripslashes(mysqli_real_escape_string($con,$_POST['NID']));
  $Address = stripslashes(mysqli_real_escape_string($con,$_POST['Address']));
  $Academy = stripslashes(mysqli_real_escape_string($con,$_POST['Academy'])); 
  $Telephone = stripslashes(mysqli_real_escape_string($con,$_POST['Telephone']));
  $Position = stripslashes(mysqli_real_escape_string($con,$_POST['Position']));
  $Season = stripslashes(mysqli_real_escape_string($con,$_POST['Season']));
  $Gender = stripslashes(mysqli_real_escape_string($con,$_POST['Gender']));
  $AgeCategory = stripslashes(mysqli_real_escape_string($con,$_POST['AgeCategory']));
    
    $check = getimagesize($_FILES["Photo"]["tmp_name"]); 
    $photo_name = $_FILES["Photo"]["name"];    

	if($NID=='')
	{
		$query_db = "SELECT * FROM children WHERE  Telephone = ?";
		$stmt = $con->prepare($query_db);
		$stmt->bind_param("s", $Telephone);
	}
	else
	{
		$query_db = "SELECT * FROM children WHERE NID = ? OR Telephone = ?";
		$stmt = $con->prepare($query_db);
		$stmt->bind_param("ss", $NID, $Telephone);  
	}
    
	
	$stmt->execute();
	$result_set = $stmt->get_result();
	$result_nums = $result_set->num_rows;
	
	if ($result_nums == 0) {
		if ($_FILES["Photo"]["size"] > 5000000) {
			echo "<script>alert('Image is too large')</script>";
			exit; 
		} else {
			$imageFileType = strtolower(pathinfo($_FILES["Photo"]["name"], PATHINFO_EXTENSION));
			if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
				echo "<script>alert('Only JPG, JPEG, PNG, GIF files are allowed')</script>";
				exit; 
			}
	
			if (move_uploaded_file($_FILES["Photo"]["tmp_name"], $target_file)) {
				$sql = "INSERT INTO children VALUES ('','$FirstName', '$LastName', '$FathersName', '$MothersName', $DOB, '$AgeCategory', '$NID', '$Address', '$Position', '$Academy', '$Telephone', '$Season', '$Gender', '$target_file','')";
$stmt1 = $con->prepare($sql);
if (!$stmt1) {
    die('Error in preparing statement: ' . mysqli_error($con));
}

if ($stmt1->execute()) {
    echo "<script type='text/javascript'>alert('Player Registered Successfully!'); location='players_through_admin.php';</script>";
} else {
    echo "Error in executing statement: " . $stmt1->error;
}
			} else {
				echo "Error uploading file";
			}
		}
	} else {
		echo "<script type='text/javascript'>alert('Player NID or Telephone  Information already exists, please check details and try again'); location='player_registration.php';</script>";
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
				<h1><?php $error; ?></h1>
            <h1 style="margin:0px;padding:0px;"> <center>PLAYER REGISTRATION <center></h1>
				<div class="container">
                    <div class="row">
                    <form action="" Method="POST" enctype="multipart/form-data" >    
                        <div class="col-md-6">
                                    <label>First Name: </label>     
                                <input type="text" name="FirstName" class="form-control" placeholder="Enter Child First Name"  required>
                                <label>Last Name: </label>
                                <input type="text" name="LastName" class="form-control" placeholder="Enter Child Second Name" required>
                                <label>Fathers Name: </label>
                                <input type="text" name="FathersName" class="form-control" placeholder="Enter Fathers Name" required>
                                <label>Mothers Name: </label>
                                <input type="text" name="MothersName" class="form-control" placeholder="Enter Mothers Name" required>
                                <label>Date of Birth (Of Child): </label>
                                <input type="Date" name="DOB" class="form-control" placehoder="Enter  Date of Birth" required> 
                                <label>Gender: </label>
                                <select class="form-control" name="Gender" required>
                                    <option value='' >---- Select Gender ---- </option>
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                </select>
                                <label>National Id (Optional): </label>
                                <input type="text" name="NID" class="form-control" pattern='[0-9]{16}' placeholder="Enter National Id Number"> 
                        </div>   

                        <div class="col-md-6">
                      <label>Address: </label>
                     <input type="text" name="Address" class="form-control" placeholder="Enter Child Address Location" required>
                     <label>Player Position: </label>
                     <select class="form-control" name="Position" required>
					     <option value='' >---- Select Player Position ---- </option>
					     <option value="GoalKeeper"> Goal Keeper </option>
					     <option value="Striker"> Striker </option>
					     <option value="Defender"> Defender </option>
					     <option value="Midfield"> Midfielder </option>
					 </select>
					 <label>APR Football Center : </label>
					 <select class="form-control" name="Academy" required>
					     <option value='' >---- Select a Football Center---- </option>
					     <?php 
		                    	$sql_query = "SELECT * FROM academy ";
		                    	$resultset = $con->query($sql_query) or die("database error:". mysqli_error($con));
		                    	while( $developer = $resultset->fetch_object()) {
		            	?>
		                  <option value='<?php echo $developer->AcademyName; ?>'><?php echo $developer->AcademyName; ?> </option>
		                
		                <?php
		                        }
			            ?>
					 </select>
					 
					 <label> Age Category: </label>
                     <select class="form-control" name="AgeCategory" required>
					     <option value='' >---- Select Age Category ---- </option>
					     <option value="Under 7"> Under 7</option> </option>
					     <option value="Under 10"> Under 10  </option>
					     <option value="Under 13"> Under 13 </option>
					     <option value="Under 15"> Under 15 </option>
					     <option value="Under 17"> Under 17 </option>
					     <option value="Under 20"> Under 20 </option>
					     <option value="Under 23"> Under 23 </option>


					 </select>
                     
                     <label>Mobile Number: </label>
                     <input type="text" name="Telephone" class="form-control" pattern='[0-9]{10}' placeholder="Enter Guardian Mobile Number" required>
                     
                      <label>Season: </label>
                     <select class="form-control" name="Season" required>
					     <option value='' >---- Choose Season  ---- </option>
					     <option value="2018/2019"> 2018/2019 </option>
					     <option value="2019/2020"> 2019/2020 </option>
					     <option value="2020/2021"> 2020/2021 </option>
					     <option value="2021/2022"> 2021/2022 </option>
					     <option value="2022/2023"> 2022/2023 </option>
					     <option value="2023/2024"> 2023/2024 </option>
					     <option value="2024/2025"> 2024/2025 </option>
					     <option value="2025/2026"> 2025/2026 </option>
					     <option value="2026/2027"> 2026/2027 </option>
					     <option value="2027/2028"> 2027/2028 </option>
					     <option value="2028/2029"> 2028/2029 </option>
					     <option value="2029/2030"> 2029/2030 </option>
					 </select>
					 <label>Player Photo: </label>
					  <input type="file" name="Photo" class="form-control" required>
					  
					  <br/>
					   <input type="Submit" name="Submit" value="Register" class="btn btn-dark" style="color:#fff;background:black;"> 
                    
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
