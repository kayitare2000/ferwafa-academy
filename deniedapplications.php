<?php
session_start();
require('db_connect.php');

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

			<section class="tg-main-section tg-haslayout" id="about-us">
				<div class="container-fluid">
            <?php
            $i=1;
			$sql_query = "SELECT * FROM applications WHERE Status ='Denied' "; 
			$resultset = $con->query($sql_query) or die("database error:". mysqli_error($con));
            $num_centres = $resultset->num_rows;
            ?>
                    <h1> <center> DENIED APPLICATIONS (<?php echo $num_centres ?>) <center></h1>
                	<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>FirstName</th>
                <th>Last Name</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Registered Status</th>
                <th>Proof of Registration</th>
                <th>Decalaration of Registration</th>
                <th>Organization Chart</th>
                <th>Proof of Implementation</th>
                <th>Coach License</th>
                <th>Coach Name</th>
                <th>Coach Picture</th>
                <th>Comprehensive Youth Program</th>
                <th>Pitch Picture</th>
                <th>Training Equipment</th>
                <th>First Aid Box</th>
                <th>Proof of Insurance</th>
                <th>Yearly Examination</th>
                <th>Academy development program</th>
                <th>Administrative offices</th>
                <th>Dressing Rooms</th>
                <th> Vehicle Capacity (25 +) </th>
                <th> Sanitary Facilities </th>
                <th>Gym </th>
                <th> Defilberator </th>
                <th> Sporting Director</th>
                <th> Administrative Director </th>
                <th> Safety And Security Officer </th>
                <th> Legal Adviser </th>
                <th> Team Manager </th>
                <th> Safe Guard Officer </th>
                <th> Bus Driver </th>
                <th> First Aider </th>
                <th> Physiotherapist </th>
                <th>CATEGORY</th>
                <th> Action </th>
              
               
               
            </tr>
        </thead>
       <tbody>
			<?php 
			$i=1;
			
			while( $developer = $resultset->fetch_object()) {
			    $sql_query_questions = "SELECT * FROM application_questions WHERE applications_id='".$developer->Id."' ";
			    $resultset_query = $con->query($sql_query_questions) or die("database error:". mysqli_error($con));

				$resultset_questions = $resultset_query->fetch_object(); 
			?>
			
			   <tr id="<?php echo $developer->Id; ?>">
			  
     		   <td><?php echo $i++; ?></td> 
			   <td><?php echo $developer->FirstName; ?></td>
			   <td><?php echo $developer->LastName;?></td>
			   <td><?php echo $developer->DOB;?></td>
			   <td><?php echo $developer->Gender;?></td>
			   <td><?php echo $developer->Email;?></td>
			   <td><?php echo $developer->Contact;?></td>
			   <td>
			   <?php 
			    if($developer->CopyOfRegisteredStatus !='')
			    {
			        
			    
			   ?>
			       <a href="<?php echo $developer->CopyOfRegisteredStatus;?>"> <i class="fa fa-file-pdf-o" style="font-size:32px;"></i></a>
			   <?php
			    }
			    else
			    {
			        echo 'empty';
			    }
			   ?>
			   </td>
			   <td>
			   <?php 
			    if($developer->ProofOfRegistration !='')
			    {
			        
			    
			   ?>
			       <a href="<?php echo $developer->ProofOfRegistration;?>"> <i class="fa fa-file-pdf-o" style="font-size:32px;color:red"></i></a>
			   <?php
			    }
			    else
			    {
			        echo 'empty';
			    }
			   ?>
			   </td>
			   <td>
			   <?php 
			    if($developer->DeclarationOfRegistration !='')
			    {
			        
			    
			   ?>
			       <a href="<?php echo $developer->DeclarationOfRegistration;?>"> <i class="fa fa-file-pdf-o" style="font-size:32px;"></i></a>
			   <?php
			    }
			    else
			    {
			        echo 'empty';
			    }
			   ?>
			   </td>
			   
			    <td>
			   <?php 
			    if($developer->OrganizationChart !='')
			    {
			        
			    
			   ?>
			       <a href="<?php echo $developer->OrganizationChart;?>"> <i class="fa fa-file-pdf-o" style="font-size:32px;color:red;"></i></a>
			   <?php
			    }
			    else
			    {
			        echo 'empty';
			    }
			   ?>
			   </td>
			   
			   <td>
			   <?php 
			    if($developer->ProofOfImplementation !='')
			    {
			        
			    
			   ?>
			       <a href="<?php echo $developer->ProofOfImplementation;?>"> <i class="fa fa-file-pdf-o" style="font-size:32px;"></i></a>
			   <?php
			    }
			    else
			    {
			        echo 'empty';
			    }
			   ?>
			   </td>
			   
			   <td>
			   <?php 
			    if($developer->CoachLicense !='')
			    {
			        
			    
			   ?>
			       <a href="<?php echo $developer->CoachLicense;?>"> <i class="fa fa-file-pdf-o" style="font-size:32px;color:red;"></i></a>
			   <?php
			    }
			    else
			    {
			        echo 'empty';
			    }
			   ?>
			   </td>
			   
               <td><?php echo $developer->CoachName;?> </td>
               
               
               <td>
			   <?php 
			    if($developer->CoachPicture !='')
			    {
			        
			    
			   ?>
			       <a href="<?php echo $developer->CoachPicture;?>"> <i class="fa fa-file-photo-o" style="font-size:32px;color:red;"></i></a>
			   <?php
			    }
			    else
			    {
			        echo 'empty';
			    }
			   ?>
			   </td>
               
               <td>
			   <?php 
			    if($developer->ComprehensiveYouthProgramme !='')
			    {
			        
			    
			   ?>
			       <a href="<?php echo $developer->ComprehensiveYouthProgramme;?>"> <i class="fa fa-file-pdf-o" style="font-size:32px;color:red;"></i></a>
			   <?php
			    }
			    else
			    {
			        echo 'empty';
			    }
			   ?>
			   </td>
               
               <td>
			   <?php 
			    if($developer->PitchPicture !='')
			    {
			        
			    
			   ?>
			       <a href="<?php echo $developer->PitchPicture;?>"> <i class="fa fa-file-image-o" style="font-size:32px;"></i></a>
			   <?php
			    }
			    else
			    {
			        echo 'empty';
			    }
			   ?>
			   </td>
			   
			   
               <td>
			   <?php 
			    if($developer->TrainingEquipment !='')
			    {
			        
			    
			   ?>
			       <a href="<?php echo $developer->TrainingEquipment;?>"> <i class="fa fa-file-image-o" style="font-size:32px;"></i></a>
			   <?php
			    }
			    else
			    {
			        echo 'empty';
			    }
			   ?>
			   </td>
               
               <td>
			   <?php 
			    if($developer->FirstAidBox !='')
			    {
			        
			    
			   ?>
			       <a href="<?php echo $developer->FirstAidBox;?>"> <i class="fa fa-file-image-o" style="font-size:32px;"></i></a>
			   <?php
			    }
			    else
			    {
			        echo 'empty';
			    }
			   ?>
			   </td>
			   
			   <td>
			   <?php 
			    if($developer->ProofOfInsurance !='')
			    {
			        
			    
			   ?>
			       <a href="<?php echo $developer->ProofOfInsurance;?>"> <i class="fa fa-file-image-o" style="font-size:32px;"></i></a>
			   <?php
			    }
			    else
			    {
			        echo 'empty';
			    }
			   ?>
			   </td>
               
               
               
               <td> <?php echo $resultset_questions->yearlyexamination;?> </td>
               <td> <?php echo $resultset_questions->academydevelopmentprogram;?> </td>
                <td> <?php echo $resultset_questions->administrativeoffices;?> </td>
                 <td> <?php echo $resultset_questions->DressingRooms;?> </td>
             <td> <?php echo $resultset_questions->vehiclecapacity;?> </td>
              <td> <?php echo $resultset_questions->sanitaryfacilities;?> </td>
               <td> <?php echo $resultset_questions->gym;?> </td>
                <td> <?php echo $resultset_questions->Defilberator;?> </td>
                 <td> <?php echo $resultset_questions->SportingDirector;?> </td>
                  <td> <?php echo $resultset_questions->AdministrativeDirector;?> </td>
                   <td> <?php echo $resultset_questions->SafetyAndSecurityOfficer;?> </td>
                    <td> <?php echo $resultset_questions->LegalAdviser;?> </td>
                     <td> <?php echo $resultset_questions->TeamManager;?> </td>
                      <td> <?php echo $resultset_questions->SafeGuardOfficer;?> </td>
                       <td> <?php echo $resultset_questions->BusDriver;?> </td>
                        <td> <?php echo $resultset_questions->FirstAider;?> </td>
                         <td> <?php echo $resultset_questions->Physiotherapist;?> </td>
               
               
               
               <td> 
                <?php if ($developer->CopyOfRegisteredStatus !='' AND $developer->ProofOfRegistration !='' AND $developer->DeclarationOfRegistration !='' AND $developer->OrganizationChart !='' AND  $developer->ProofOfImplementation !=''AND  $developer->CoachLicense !='' AND $developer->CoachName !='' AND $developer->CoachPicture !='' AND $developer->ComprehensiveYouthProgramme !='' AND $developer->PitchPicture !='' AND $developer->TrainingEquipment !='' AND $developer->FirstAidBox !='' AND $developer->ProofOfInsurance !='') 
                {
                 echo "A";
                }
                else
                {
                    echo "B";
                }
                ?>
               </td>
               <td>
   
        <a href="">
            <button class="btn btn-success"><?php echo $developer->Status; ?></button>
        </a>
    
</td>
 
               
			   
			   </tr>
			<?php } ?>
		</tbody>
         
          
    </table>
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
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="dataTables.bootstrap5.min.js"></script>


<script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(row) {
                                var data = row.data();
                                return 'Details for ' + data[1];
                            }
                        }),
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                            tableClass: 'table'
                        })
                    }
                },
                buttons: [
                    'copyHtml5',
                    'csvHtml5',
                ]
            });
        });
    </script>
</body>


</html>