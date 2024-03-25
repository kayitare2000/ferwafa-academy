<?php
session_start();
require('db_connect.php');

$get_state = "SELECT * FROM state_of_applications WHERE Id='1'";
$result= $con->query($get_state);  
$application = $result->fetch_assoc();

$state = $application['State'];

if($state=='0')
{


if(isset($_POST['Apply'])) { 

    $firstName = stripslashes($_POST["FirstName"]);
    $lastName = stripslashes($_POST["LastName"]);
    $dob = stripslashes($_POST["DOB"]);
    $gender = stripslashes($_POST["Gender"]);
    $CoachName = stripslashes($_POST["CoachName"]);
    $AcademyName = stripslashes($_POST['AcademyName']);
    $Contact = stripslashes($_POST['Contact']);
    $Email = stripslashes($_POST['Email']);
    $Province = stripslashes($_POST['Province']);
    $District = stripslashes($_POST['District']);
    $Sector = stripslashes($_POST['Sector']); 

if(isset($_POST['yearlyexamination']))
{
    $yearlyexamination = stripslashes($_POST['yearlyexamination']); 
}
else
{
    $yearlyexamination = ''; 
}
if(isset($_POST['academydevelopmentprogram']))
{
    $academydevelopmentprogram	 = stripslashes($_POST['academydevelopmentprogram']); 
}
else
{
    $academydevelopmentprogram	 = '';
}
if(isset($_POST['administrativeoffices']))
{
    $administrativeoffices = stripslashes($_POST['administrativeoffices']); 
}
else
{
    $administrativeoffices = '';
}
if(isset($_POST['DressingRooms']))
{
    $DressingRooms = stripslashes($_POST['DressingRooms']); 
}
else
{
    $DressingRooms = '';
}
if(isset($_POST['vehiclecapacity']))
{
    $vehiclecapacity = stripslashes($_POST['vehiclecapacity']);
}
else
{
    $vehiclecapacity = '';
}
if(isset($_POST['sanitaryfacilities']))
{
    $sanitaryfacilities = stripslashes($_POST['sanitaryfacilities']);
}
else
{
    $sanitaryfacilities = '';
}
if(isset($_POST['gym']))
{
    $gym = stripslashes($_POST['gym']);
}
else
{
    $gym = '';
}
if(isset($_POST['Defilberator']))
{
    $Defilberator = stripslashes($_POST['Defilberator']);
}
else
{
    $Defilberator = '';
}
if(isset($_POST['ElvenAsidePitch']))
{
    $ElvenAsidePitch = stripslashes($_POST['ElvenAsidePitch']);
}
else
{
    $ElvenAsidePitch = '';
}
if(isset($_POST['SportingDirector']))
{
    $SportingDirector = stripslashes($_POST['SportingDirector']);
}
else
{
    $SportingDirector = '';
}
if(isset($_POST['AdministrativeDirector']))
{
    $AdministrativeDirector = stripslashes($_POST['AdministrativeDirector']);
}
else
{
    $AdministrativeDirector = '';
}
if(isset($_POST['SafetyAndSecurityOfficer']))
{
    $SafetyAndSecurityOfficer = stripslashes($_POST['SafetyAndSecurityOfficer']);
}
else
{
    $SafetyAndSecurityOfficer = '';
}
if(isset($_POST['LegalAdviser']))
{
    $LegalAdviser = stripslashes($_POST['LegalAdviser']);
}
else
{
    $LegalAdviser = '';
}
if(isset($_POST['TeamManager']))
{
    $TeamManager = stripslashes($_POST['TeamManager']);
}
else
{
    $TeamManager = '';
}
if(isset($_POST['SafeGuardOfficer']))
{
    $SafeGuardOfficer = stripslashes($_POST['SafeGuardOfficer']);
}
else
{
    $SafeGuardOfficer = '';
}
if(isset($_POST['BusDriver']))
{
    $BusDriver = stripslashes($_POST['BusDriver']);
}
else
{
    $BusDriver = '';
}
if(isset($_POST['FirstAider']))
{
    $FirstAider = stripslashes($_POST['FirstAider']);
}
else
{
    $FirstAider = '';
}

if(isset($_POST['Physiotherapist']))
{
    $Physiotherapist = stripslashes($_POST['Physiotherapist']);
}
else
{
    $Physiotherapist = ''; 
}




 
    
    


    $targetDirectory = "applications/";
    $target_dir_license = "licenses/"; 

$uploadedFiles = [];
$allowedExtensions = ['doc','docx','DOC','DOCX','Pdf','pdf', 'jpg', 'jpeg', 'png','PNG','PDF','JPG','JPEG'];

$fileInputs = [
    "RegisteredStatus",
    "ProofOfRegistration",
    "DecalarationofRegistration",
    "OrganizationalChart",
    "ProofOfImplementationMechanism",
    "CoachLicense",
    "CoachPicture",
    "YouthDevelopmentProgram",
    "ProofOfPayment",
    "PictureOfPitch",
    "TrainingEquipment",
    "FirstAidBox",
    "ProofOfInsurance",
    "ParentsForum",
    "ManagementCommittee",
    "StatutoryAnnualMeeting",
    "YearlyMedicalExamination",
    "LongTermAcademyDevelopmentProgram"
];

$check_name = "SELECT * FROM applications WHERE AcademyName='".$AcademyName."' ";
$result= $con->query($check_name);
$academy_num_rows = $result->num_rows;
if($academy_num_rows > 1)
{
    echo "<script>alert('Academy Name already in Use try another or Contact Admin')</script>";
}
else 
{

    foreach ($fileInputs as $input) {
       
        if (isset($_FILES[$input]) && !empty($_FILES[$input]['name'])) { // Non-empty uploads
            $file = $_FILES[$input];
            $fileName = $file["name"];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $targetFile = $targetDirectory . uniqid() . '_' . basename($fileName);
    
            if (in_array($fileExtension, $allowedExtensions)) {
                if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                    $uploadedFiles[$input] = $targetFile;
                } else {
                    echo "<script>alert('Failed to upload $fileName')</script>";
                }
            } else {
                echo "<script>alert('Invalid file format for $fileName. Only PDF, JPG, JPEG, and PNG files are allowed')</script>";
            }
        } else {
            
            if (isset($_POST[$input]) && !empty($_POST[$input])) {
                
                $uploadedFiles[$input] = $_POST[$input];
            }
            else
            {
                $uploadedFiles[$input] = '';
            }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
        }
    }
if ($yearlyexamination=='Yes' AND $academydevelopmentprogram=='Yes' AND $administrativeoffices=='Yes' AND $DressingRooms=='Yes' AND 
$vehiclecapacity=='Yes' AND  $sanitaryfacilities=='Yes' AND  $gym=='Yes' AND $Defilberator=='Yes' AND $ElvenAsidePitch=='Yes' AND 
$SportingDirector=='Yes' AND $AdministrativeDirector=='Yes' AND $SafetyAndSecurityOfficer=='Yes' AND $LegalAdviser=='Yes' 
AND $TeamManager=='Yes' AND $SafeGuardOfficer=='Yes' AND $BusDriver=='Yes' AND $FirstAider=='Yes' AND $Physiotherapist=='Yes'
AND $uploadedFiles['RegisteredStatus']!='' AND   $uploadedFiles['ProofOfRegistration']!='' AND $uploadedFiles['DecalarationofRegistration']!=''
AND $uploadedFiles['OrganizationalChart']!=''AND $uploadedFiles['ProofOfImplementationMechanism']!='' AND $uploadedFiles['CoachLicense']!=''
AND $uploadedFiles['CoachPicture']!='' AND $uploadedFiles['YouthDevelopmentProgram']!='' AND  $uploadedFiles['PictureOfPitch']!=''
AND $uploadedFiles['TrainingEquipment']!='' AND $uploadedFiles['FirstAidBox']!='' AND $uploadedFiles['ProofOfInsurance']!=''
AND $uploadedFiles['ParentsForum']!='' AND  $uploadedFiles['ManagementCommittee']!='' AND  $uploadedFiles['StatutoryAnnualMeeting']!=''
AND $uploadedFiles['YearlyMedicalExamination']!='' AND  $uploadedFiles['LongTermAcademyDevelopmentProgram']!='' AND $uploadedFiles['ProofOfImplementationMechanism']!=''
AND $uploadedFiles['ProofOfPayment']!=''
)
{
    $category = "A";  
}

else if ($uploadedFiles['RegisteredStatus'] !='' AND $uploadedFiles['ProofOfRegistration'] !='' AND $uploadedFiles['DecalarationofRegistration'] !='' AND ($uploadedFiles['OrganizationalChart'] !='' || $uploadedFiles['OrganizationalChart'] =='') AND  $uploadedFiles['ProofOfImplementationMechanism'] !=''AND  $uploadedFiles['CoachLicense'] !='' AND $CoachName !='' AND $uploadedFiles['CoachPicture'] !='' AND ($uploadedFiles['YouthDevelopmentProgram'] !='' || $uploadedFiles['YouthDevelopmentProgram'] =='' ) AND $uploadedFiles['PictureOfPitch'] !='' AND  $uploadedFiles['TrainingEquipment']  !='' AND $uploadedFiles['FirstAidBox'] !='' AND $uploadedFiles['ProofOfInsurance'] !='')
        {
                    $category = "B"; 
        }
else
		{
					$category = "C"; 
		}
                
$status='Pending';
        $sql = "INSERT INTO applications VALUES (
            '',
            '$firstName',
            '$lastName',
            '$dob',
            '$gender',
            '$AcademyName',
            '" . $uploadedFiles['RegisteredStatus'] . "',
            '" . $uploadedFiles['ProofOfRegistration'] . "',
            '" . $uploadedFiles['DecalarationofRegistration'] . "',
            '" . $uploadedFiles['OrganizationalChart'] . "',
            '" . $uploadedFiles['ProofOfImplementationMechanism'] . "',
            '" . $uploadedFiles['CoachLicense'] . "',
            '$CoachName',
            '" . $uploadedFiles['CoachPicture'] . "',
            '" . $uploadedFiles['YouthDevelopmentProgram'] . "',
            '" . $uploadedFiles['PictureOfPitch'] . "',
            '" . $uploadedFiles['TrainingEquipment'] . "',
            '" . $uploadedFiles['FirstAidBox'] . "',
            '" . $uploadedFiles['ProofOfInsurance'] . "',
            '" . $uploadedFiles['ParentsForum'] . "',
            '" . $uploadedFiles['ManagementCommittee'] . "',
            '" . $uploadedFiles['StatutoryAnnualMeeting'] . "',
            '" . $uploadedFiles['YearlyMedicalExamination'] . "',
            '" . $uploadedFiles['LongTermAcademyDevelopmentProgram'] . "',
            '" . $uploadedFiles['ProofOfImplementationMechanism'] . "',
            '" . $uploadedFiles['ProofOfPayment'] . "',
            '$Email', 
            '$Contact',
            '$Status',
            '$category'
        )";
        
  

                        if($con->query($sql) === TRUE) 
                        {
                            $last_id = $con->insert_id;
                            $sql3 = "INSERT INTO application_questions VALUES ('', '$last_id', '$yearlyexamination', '$academydevelopmentprogram', '$administrativeoffices', '$DressingRooms', '$vehiclecapacity', '$sanitaryfacilities', '$gym', '$Defilberator','$ElvenAsidePitch','$SportingDirector','$AdministrativeDirector','$SafetyAndSecurityOfficer','$LegalAdviser','$TeamManager','$SafeGuardOfficer','$BusDriver','$FirstAider','$Physiotherapist')";
                            $con->query($sql3);  

                            $sql2 = "INSERT INTO academy VALUES ('', '$AcademyName', '$Province', '$District', '$Sector', '', '$Contact', '$CoachName', '{$uploadedFiles['CoachPicture']}','{$uploadedFiles['CoachLicense']}', '')";
                            $con->query($sql2);

                            $host = $_SERVER['HTTP_HOST'];

                            if($host=='localhost')
                            {
                                echo "<script>alert('Successfully Inserted')</script>";
                                header("Location: success_page.php");
                                exit();      
                            }
                            else
                            {
                            $subject = "APR ACADEMY- Application Submitted Succesfully";
                            $message = "Dear, $firstName $lastName
                             Thank you for taking the time to submit your application for you Academy, $AcademyName.  The application has been received and will be processed. Look out for another email from us within a few days on the status of your application.  Thank you. ";
                            $headers = "From: no-reply@apracademy.com";

                   
                        if(mail($Email, $subject, $message, $headers)) {  
                                echo "<script>alert('Successfully Inserted')</script>";
                                header("Location: success_page.php");
                                exit();   
                        } 
                        else 
                        { 
                            echo "<script>alert('Failure to Send Mail')</script>";
                            
                            $lastError = error_get_last();
                            if ($lastError !== null) 
                            {
                                echo "Error: " . $lastError['message'];
                            }
                        }
                        }
                           
                    } 
                    else
                        {
                            echo "<script>alert('Failure')</script>";   
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
<style>
input{
    border:1px solid #000;
}
                   
                    /* Style to align radio buttons horizontally */
input[type="radio"] {
  display: inline-block;
  margin-right: 5px; /* Adjust spacing between radio buttons */
}

label {
  display: inline-block;
  margin-right: 15px; 
}
</style>
<body>

	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		

			<?php include('nav3.php'); ?> 
		
		
		 <div class="tg-sliderbox" style="height:25%">
			
			<div class="tg-imglayer"> 
           
            </div> 
		
		</div> 
		
		<main id="tg-main" class="tg-main tg-haslayout"style="padding-top:0px;margin-top:0px;">

			<section class="tg-main-section tg-haslayout"> 
            <h1 style="margin:0px;padding:0px;"> <center> APPLY : <center></h1>
            <p style="color:red;text-align:center;"> Fields Marked with <span style="color:red;">*</span> are Required Fields </p>
            <h4><center>Welcome, kindly fill out this form below to apply and be apart of us. An application fee of Rwf ##### is charged per every application. </center> </h4> <br/>
				<div class="container-fluid">
                <center> <strong>BASIC INFORMATION</strong> </center>
                <form action="" method="POST"  enctype="multipart/form-data">
                    <div class="row">
                     <fieldset>
                        <div class="col-md-3">
                            <label>First Name: <span style="color:red;">*</span> </label>      
                            <input type="text" name="FirstName" class="form-control" placeholder="First Name" required>
                            <label>Last Name: <span style="color:red;">*</span> </label>      
                            <input type="text" name="LastName" class="form-control" placeholder="Last Name" required>
                            <label>D.O.B: <span style="color:red;">*</span> </label>      
                            <input type="Date" name="DOB" class="form-control"  required>
                    
                        </div> 

                        <div class="col-md-3">  
                                <label>Gender: <span style="color:red;">*</span> </label>      
                                <select name="Gender" required class="form-control">
                                    <option value="Male"> Male</option>
                                    <option value="Female"> Female</option>
                                </select>
                                <label>Academy Name <span style="color:red;">*</span> </label>      
                                <input type="text" name="AcademyName" class="form-control" placeholder="Academy Name"  required>
                                <label>Email: <span style="color:red;">*</span> </label>      
                                <input type="text" name="Email" class="form-control" placeholder="Email"  required>
                               
                        </div>
                        
                        <div class="col-md-3">
                            <label>Contact: <span style="color:red;">*</span> </label>      
                            <input type="text" name="Contact" class="form-control" placeholder="Contact"  required>
                            <label>Province: <span style="color:red;">*</span> </label>      
                            <input type="text" name="Province" class="form-control" placeholder="Province"  required>
                            <label>District: <span style="color:red;">*</span> </label>      
                            <input type="text" name="District" class="form-control" placeholder="District"  required> 
                        </div>

                        <div class="col-md-3">
                                <label>Sector: <span style="color:red;">*</span> </label>       
                                <input type="text" name="Sector" class="form-control" placeholder="Sector"  required>
                        </div>
</fieldset>    
                    </div>


                   
                    <div class="row">
                      <fieldset>
                        <div class="col-md-3">
                        <center> <strong> SPORTING INFORMATION </strong> </center>
                        <label> Do you have Yearly medical examination of each of the players connected to the academy </label>
                      <input type="radio" id="contactChoice1" name="yearlyexamination" value="No" />
                      <label for="contactChoice1">No</label>
            
                     <input type="radio" id="contactChoice2" name="yearlyexamination" value="Yes" />
                     <label for="contactChoice2">Yes</label>
                     <label> Do you have  A long-term academy development Program  </label>
                      <input type="radio" id="contactChoice3" name="academydevelopmentprogram" value="No" />
                      <label for="contactChoice3">No</label>
            
                     <input type="radio" id="contactChoice4" name="academydevelopmentprogram" value="Yes" />
                     <label for="contactChoice4">Yes</label>
                    
                        </div>

                        <div class="col-md-3">  
                        <h3>Infrastructure </h3>
            <p style="color:orange;"> Are the following  present in your Structure </p>
            <label> Access to Administrative Offices </label><br/>
                      <input type="radio" id="contactChoice5" name="administrativeoffices" value="No" />
                      <label for="contactChoice5">No</label>
            
                     <input type="radio" id="contactChoice6" name="administrativeoffices" value="Yes" />
                     <label for="YecontactChoice6">Yes</label> <br/>
                    
                     <label> Access to Dressing Rooms:  </label> <br/>
                      <input type="radio" id="contactChoice7" name="DressingRooms" value="No" />
                      <label for="No">No</label>
                      <input type="radio" id="contactChoice8" name="DressingRooms" value="Yes" />
                     <label for="contactChoice8">Yes</label> <br/>
            

                        </div>
                        
                        <div class="col-md-3">
                        
                     
                      <label> Access to Vehicle With atleast a capacity of 25 people:  </label> <br/>
                      <input type="radio" id="contactChoice9" name="vehiclecapacity" value="No" />
                      <label for="contactChoice9">No</label>
            
                     <input type="radio" id="contactChoice10" name="vehiclecapacity" value="Yes" />
                     <label for="contactChoice10">Yes</label> <br/>
                     
                     <label> Access to Sanitary Facilities:  </label> <br/>
                      <input type="radio" id="contactChoice11" name="sanitaryfacilities" value="No" />
                      <label for="contactChoice11">No</label> 
                        <input type="radio" id="contactChoice12" name="sanitaryfacilities" value="Yes" />
                     <label for="contactChoice12">Yes</label> <br/>

                     <label> Access to Gym:  </label> <br/> 
                      <input type="radio" id="contactChoice13" name="gym" value="No" />
                      <label for="contactChoice13">No</label>
                      <input type="radio" id="contactChoice14" name="gym" value="Yes" />
                     <label for="contactChoice14">Yes</label> <br/>
                     
                     
                        </div>

                        <div class="col-md-3">
                       
                     <label> Have Access to a Defilberator:  </label> <br/>  
                      <input type="radio" id="contactChoice15" name="Defilberator" value="No" />
                      <label for="contactChoice15">No</label>
            
                     <input type="radio" id="contactChoice16" name="Defilberator" value="Yes" />
                     <label for="contactChoice16">Yes</label> <br/>
                    
                     <label>Access to one fifa approved eleven a side pitch:  </label> <br/>
                     <input type="radio" id="contactChoice35" name="ElvenAsidePitch" value="No" />
                      <label for="contactChoice35">No</label>  

                     <input type="radio" id="contactChoice36" name="ElvenAsidePitch" value="Yes" />
                     <label for="contactChoice36">Yes</label> <br/>
                        </div>
                        </fieldset>     
                    </div>
                    
                      
                    <div class="row">
                        <fieldset> 
                         <center> <h3>Administration </h3>
                        <p style="color:orange;"> Are the following  present in your Structure </p> </center>
                            <div class="col-md-3">   
                            
                            <label> Sporting Director:  </label>   <br/>
                            <input type="radio" id="contactChoice17" name="SportingDirector" value="No" />
                            <label for="contactChoice17">No</label>
                    
                            <input type="radio" id="contactChoice18" name="SportingDirector" value="Yes" />
                            <label for="contactChoice18">Yes</label> <br/>
                            
                            <label> Administrative Director :  </label>  <br/>
                            <input type="radio" id="contactChoice19" name="AdministrativeDirector" value="No" />
                            <label for="contactChoice19">No</label>
                    
                            <input type="radio" id="contactChoice20" name="AdministrativeDirector" value="Yes" />
                            <label for="contactChoice20">Yes</label> <br/>

                            <label> Safety and Security Officer :  </label>   <br/>
                            <input type="radio" id="contactChoice21" name="SafetyAndSecurityOfficer" value="No" />
                            <label for="contactChoice21">No</label>
                                
                            <input type="radio" id="contactChoice22" name="SafetyAndSecurityOfficer" value="Yes" />
                            <label for="contactChoice23">Yes</label> <br/>
                            </div>


                            <div class="col-md-3">
                               
                                
                                <label> Legal Adviser :  </label>     <br/>
                                <input type="radio" id="contactChoice23" name="LegalAdviser" value="No" />
                                <label for="contactChoice23">No</label> 
                        
                                <input type="radio" id="contactChoice24" name="LegalAdviser" value="Yes" />
                                <label for="contactChoice24">Yes</label><br/>
                                
                                <label>  Team Manager:  </label>   <br/>
                                <input type="radio" id="contactChoice25" name="TeamManager" value="No" />
                                <label for="contactChoice25">No</label>
                        
                                <input type="radio" id="contactChoice26" name="TeamManager" value="Yes" />
                                <label for="contactChoice26">Yes</label> <br/>
                            </div>

                            <div class="col-md-3">
                            <label>  SafeGuard Officer:  </label>    <br/> 
                            <input type="radio" id="contactChoice27" name="SafeGuardOfficer" value="No" />
                            <label for="contactChoice27">No</label>
                    
                            <input type="radio" id="contactChoice28" name="SafeGuardOfficer" value="Yes" />
                            <label for="contactChoice28">Yes</label>  </br/>
                            
                            <label> Bus Driver (Qualified):  </label>   <br/> 
                            <input type="radio" id="contactChoice29" name="BusDriver" value="No" />
                            <label for="contactChoice29">No</label>
                    
                            <input type="radio" id="contactChoice30" name="BusDriver" value="Yes" />
                            <label for="contactChoice30">Yes</label> <br/>
                     
                            </div>

                            <div class="col-md-3">
                            <label> Trained First Aider :  </label>   <br/> 
                      <input type="radio" id="contactChoice31" name="FirstAider" value="No" />
                      <label for="contactChoice31">No</label>
            
                     <input type="radio" id="contactChoice32" name="FirstAider" value="Yes" />
                     <label for="contactChoice32">Yes</label> <br/>
                     
                     <label> Physiotherapist :  </label>   <br/> 
                      <input type="radio" id="contactChoice33" name="Physiotherapist" value="No" />
                      <label for="contactChoice33">No</label>
            
                     <input type="radio" id="contactChoice34" name="Physiotherapist" value="Yes" />
                     <label for="contactChoice34">Yes</label> <br/> 
                            </div>
                </fieldset>
                    </div>


                    <div class="row">
                        <center> <h3> UPLOAD SECTION </h3>
                     <p style="color:Orange"> Please upload these documents where applicable</p> </center>
                            <div class="col-md-3">
                           
                            <label>Copy of Registration Status: </label>
                            <input type="file" name="RegisteredStatus" class="form-control"> 
                            <label>Proof of Registration  </label>
                            <input type="file" name="ProofOfRegistration" class="form-control"> 
                            <label>Declaration of Registration: </label>   
                            <input type="file" name="DecalarationofRegistration" class="form-control">
                            <label>Organization Chart of the academy: </label>
                            <input type="file" name="OrganizationalChart" class="form-control" >
                            <label>Security Measures in place : </label>
                            <input type="file" name="ProofOfImplementationMechanism" class="form-control"> 
					
                                
                            </div>


                            <div class="col-md-3">
                           
                            
                            <label> Coach License: </label> 
                            <input type="file" name="CoachLicense" class="form-control"> 
                            <label>Coach Name: <span style="color:red;">*</span></label>
                            <input type="text" name="CoachName" class="form-control" placeholder="Coach Name" required> 
                            <label>Coach Picture: <span style="color:red;">*</span></label>
                            <input type="file" name="CoachPicture" class="form-control" required>
                            <label>Comprehensive youth development program  </label>
                            <input type="file" name="YouthDevelopmentProgram" class="form-control" > 
                            <label>Picture of Pitch: </label>
                            <input type="file" name="PictureOfPitch" class="form-control"   > 
                            </div>

                            <div class="col-md-3">
                            
                      <label>Picture of a stock of training equipment </label>
					 <input type="file" name="TrainingEquipment" class="form-control"   > 
                     <label>First Aid Box: </label>
                     <input type="file" name="FirstAidBox" class="form-control" >
					 <label>Proof of Insurance:</label>
                     <input type="file" name="ProofOfInsurance" class="form-control" >
                     <label> Proof of existence of a parents/legal guardian forums </label>
                     <input type="file" name="ParentsForum" class="form-control" >
                     <label>Proof of existence of management/executive committee  </label>
                     <input type="file" name="ManagementCommittee" class="form-control">  
                    
                     
                            </div>

                            <div class="col-md-3">
                            <label>Proof of holding statutory annual meeting and adherence to the governance status </label>   
                     <input type="file" name="StatutoryAnnualMeeting" class="form-control">
                            <label>Proof of yearly medical examination of each of the players connected to academy </label>
                     <input type="file" name="YearlyMedicalExamination" class="form-control">
                     <label>Proof of long term academy development program for minimum of 3 years</label>
                     <input type="file" name="LongTermAcademyDevelopmentProgram" class="form-control">  
                     <label> Application Fee <span style="color:red;">*</span>  </label> 
                     <input type="file" name="ProofOfPayment" class="form-control" required >
                     <!-- <img src="images/mtnmomo.svg" class="img-responsive" width="20%">  -->
                         <br/>
                     <input type="Submit" name="Apply" value="Apply" class="btn btn-lg btn-success" style="color:#fff;"> 
                     </br/>      

                            </div>

                    </div>

</form>
                  

                    
                    </div>
                
                  
				</div>
			</section>
			

			

			

		</main>
		
		
        <?php include('footer.php'); ?>


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
<?php
}

else
{
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>APR FOOTBALL CENTER</title>
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

<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <?php include('nav3.php'); ?> 

    <div class="tg-sliderbox" style="height:30%">
        
        <div class="tg-imglayer">
       
        </div> 
    
    </div>
    
    <main id="tg-main" class="tg-main tg-haslayout"style="padding-top:0px;margin-top:0px;">  
        <center> <h2 style="color:red;padding-top:140px;">APPLICATIONS ARE CURRENTLY CLOSED</h2> </center>
        <center> <a href="index.php"> GO BACK </a></center> 
    </main>

</div>

<?php
    
}
?>