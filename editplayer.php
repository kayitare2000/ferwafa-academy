<?php
session_start();
require('db_connect.php');

if (!isset($_SESSION['AcademyName'])) {
    header('Location: index.php');
    exit();    
}

if (isset($_POST['Submit'])) {   
  	
  
	$FirstName = mysqli_real_escape_string($con,$_POST['FirstName']);
	$LastName = mysqli_real_escape_string($con,$_POST['LastName']);
	$FathersName = mysqli_real_escape_string($con,$_POST['FathersName']);
	$MothersName = mysqli_real_escape_string($con,$_POST['MothersName']);
	$DOB = mysqli_real_escape_string($con,$_POST['DOB']);
	$NID = mysqli_real_escape_string($con,$_POST['NID']);
	$Address = mysqli_real_escape_string($con,$_POST['Address']);
	$Academy = mysqli_real_escape_string($con,$_POST['Academy']); 
	$Position = mysqli_real_escape_string($con,$_POST['Position']); 
	$Telephone = mysqli_real_escape_string($con,$_POST['Telephone']);
	$Season = mysqli_real_escape_string($con,$_POST['Season']);
	$Id = mysqli_real_escape_string($con,$_POST['Id']);
	$Gender = mysqli_real_escape_string($con,$_POST['Gender']);
	$AgeCategory = mysqli_real_escape_string($con,$_POST['AgeCategory']);

		
	$sql = "Update children SET FirstName='$FirstName',Season='$Season', AgeCategory='$AgeCategory', LastName='$LastName',Gender='$Gender',FathersName='$FathersName', MothersName='$MothersName', DOB='$DOB', NID='$NID', Address='$Address',Position='$Position', Academy='".$_SESSION['AcademyName']."', Telephone='$Telephone' WHERE Id='$Id' ";
	if ($con->query($sql) === TRUE)
				{
                    echo "<script type='text/javascript'>alert('Player Information Edited Succesfully!');
									location='academypage.php';   
						</script>"; 

				} 
			else 
				{
					echo "Error: " . $sql . "<br>" . $con->error;
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
                        
                        $sql = " UPDATE children SET Photo = '$target_file' WHERE Id='$Id'";
	                    if ($con->query($sql) === TRUE)
				            {
                                 echo "<script type='text/javascript'>alert('Photo Changed Succesffuly!');
									location='academypage.php';   
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
        
        
        
        
        
        
          if (isset($_POST['Attachment'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir.basename($_FILES["Document"]["name"]);
        $uploadOk=1;
        $docFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["Document"]["tmp_name"]);
        $photo_name = $_FILES["Document"]["name"];
        $Id=$_POST['Id'];
      
     
          
          if($_FILES["Document"]["size"] > 4000000)
            {
                echo "<script>alert('Attachment is Too large')</script>";
               
               # $uploadOk = 0;
            }
          else
             {
              if($docFileType == "doc" || $docFileType =="pdf" || $docFileType =="docx" || $docFileType == "rtf" || $docFile == "txt")
                 {

                    if (move_uploaded_file($_FILES["Document"]["tmp_name"],$target_file)) 
                    {
                        
                        $sql = " UPDATE children SET Attachment = '$target_file' WHERE Id='$Id'";
	                    if ($con->query($sql) === TRUE)
				            {
                                 echo "<script type='text/javascript'>alert('Attachment Uploaded !');
									location='academypage.php';   
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
                     echo "<script>alert('Only DOC, PDF,DOCX, RTF, TXT Files are allowed')</script>";
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
		

			<?php include('navacademy.php'); ?> 
		
		
		<div class="tg-sliderbox" style="height:30%">
			
			<div class="tg-imglayer">
           
            </div> 
		
		</div>
		
		<main id="tg-main" class="tg-main tg-haslayout">

			<section class="tg-main-section tg-haslayout">
            <h1 style="margin:0px;padding:0px;"> <center> EDIT PLAYER <center></h1>
				<div class="container">
                    <div class="row">
                    <?php

if(isset($_GET['id']))
{

     $Id = $_GET['id']; 
    $delete=mysqli_query($con,"SELECT * FROM children WHERE Id='$Id'");
    $child =mysqli_fetch_array($delete);
     $child['FirstName']; 

?>
                    <div class="col-md-6">     
            <form action="" Method="POST" enctype="multipart/form-data" >       
                     <label>First Name: </label>     
                     <input type="text" name="FirstName" class="form-control" value="<?php echo $child['FirstName']; ?>" placeholder="Enter Child First Name"  required>
                     <input type="hidden" name="Id" class="form-control" value="<?php echo $Id; ?>" >
                     <label>Last Name: </label>
                     <input type="text" name="LastName" class="form-control" value="<?php echo $child['LastName'];?>" placeholder="Enter Child Second Name" required>
					 <label>Fathers Name: </label>
                     <input type="text" name="FathersName" class="form-control" value="<?php echo $child['FathersName'];?>" placeholder="Enter Fathers Name" required>
					 <label>Mothers Name: </label>
                     <input type="text" name="MothersName" class="form-control" value="<?php echo $child['MothersName'];?>" placeholder="Enter Mothers Name" required>
                     <label>Date of Birth (Of Child): </label>
                     <input type="Date" name="DOB" class="form-control" value="<?php echo $child['DOB'];?>" placehoder="Enter  Date of Birth" required>  
                      <label>Gender: </label>
                     <select class="form-control" name="Gender" required>
					     <option value="<?php echo $child['Gender'];?>"> <?php echo $child['Gender'];?> </option>
					     
		                  <option value='Male'> Male </option>
		                  <option value='Female'>Female </option> 

					 </select>
                     
                     
                     
                     <label>National Id (Optional): </label>
                     <input type="text" name="NID" class="form-control" value="<?php echo $child['NID'];?>" pattern='[0-9]{16}' placeholder="Enter National Id Number">  
                   
                     <label>Address: </label>
                     <input type="text" name="Address" class="form-control" value="<?php echo $child['Address'];?>" placeholder="Enter Child Address Location" required>
                     <label>Position : </label>
                     <select class="form-control" name="Position" required>
					     <option value="<?php echo $child['Position'];?>"> <?php echo $child['Position'];?></option>
					     <option value="GoalKeeper"> Goal Keeper </option>
					     <option value="Striker"> Striker </option>
					     <option value="Defender"> Defender </option>
					     <option value="Midfield"> Midfielder </option>
					 </select>
                     
					 <label>APR Football Center : </label>
					 <input type="text" name="Academy" class="form-control" required value="<?php echo $_SESSION['AcademyName']; ?>" readonly>
                     
                     
                     <label> Age Category: </label>
                     <select class="form-control" name="AgeCategory" required>
					     <option value='<?php echo $child['AgeCategory'];?>' ><?php echo $child['AgeCategory'];?> </option>
					     <option value="Under 7"> Under 7</option> </option>
					     <option value="Under 10"> Under 10  </option>
					     <option value="Under 13"> Under 13 </option>
					     <option value="Under 15"> Under 15 </option>
					     <option value="Under 17"> Under 17 </option>
					     <option value="Under 20"> Under 20 </option>
					     <option value="Under 23"> Under 23 </option>


					 </select>
                     
                     
                     <label>Mobile Number: </label>
                     <input type="text" name="Telephone" class="form-control" value="<?php echo $child['Telephone'];?>" pattern='[0-9]{10}' placeholder="Enter Guardian Mobile Number" required>
                     
                     <label>Season : </label>
                     <select class="form-control" name="Season" required>
					     <option value="<?php echo $child['Season'];?>"> <?php echo $child['Season'];?></option>
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

                     <input type="Submit" name="Submit" value="Edit" class="btn btn-success"> 
             </form>    
        </div>  

        <div class="col-md-3">
                <img src="<?php echo $child['Photo']; ?>" width="100%" alt="No Pic">
                <form METHOD="POST" enctype="multipart/form-data" action="" >
			      <label>Change Player Photo: </label>
					  <input type="file" name="Photo" class="form-control" required> 
					   <input type="hidden" name="Id" class="form-control" value="<?php echo $Id; ?>" >
					   <input type="Submit" value="Upload" name="Upload" class="btn btn-success">   
			      
			  </form>
			</div>
			
			 <div class="col-md-3">
                <form METHOD="POST" enctype="multipart/form-data" action="" >
			      <label>Upload Attachment: </label>
					  <input type="file" name="Document" class="form-control" required> 
					   <input type="hidden" name="Id" class="form-control" value="<?php echo $Id; ?>" >
					   <input type="Submit" value="Upload" name="Attachment" class="btn btn-success">   
			      
			  </form>
                    </div>
                
                  
				</div>
			</section>
			
            <?php
}
?> 
			

			

		</main>
		
		
		<footer id="tg-footer" class="tg-footer tg-haslayout">
			
			<div class="tg-footerbar">
				<div class="container">
					<span class="tg-copyright"><a target="_blank" href="https://www.victorhugobisangwa.com">APR FOOTBAL CENTER</a></span>
					
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