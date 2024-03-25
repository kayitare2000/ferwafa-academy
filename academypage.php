<?php
session_start();
require('db_connect.php');

if(!isset($_SESSION['AcademyName']))
{
    header('Location:index.php');
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
		    
<?php 
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $gender = $_GET['gender'];
?>
<section class="tg-main-section tg-haslayout" id="about-us">
				<div class="container-fluid">
            <?php
            $i=1;
            $sql_query = "SELECT * FROM children WHERE Academy = '" . $_SESSION['AcademyName'] . "' AND Gender='$gender' AND AgeCategory LIKE '%Under " . $id . "%'";
			$resultset = $con->query($sql_query) or die("database error:". mysqli_error($con));
            $num_centres = $resultset->num_rows;
            ?>
                    <h1> <center> <?php echo $_SESSION['AcademyName']; ?> PLAYERS (<?php echo $num_centres ?>)  <center></h1>
                <table id="example" class="table table-striped" style="width:100%">
                <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Photo</th>
                <th>Attachment</th>
                <th>Fathers Name</th>
                <th>Mothers Name</th>
                <th>D.O.B</th>
                <th>Gender</th>
                <th>ID</th>
                <th>Address</th>
                <th>Position</th> 
                <th>Age Category</th> 
                <th>Center</th>  
                <th>Telephone</th>
                <th> Season </th>
                <th>Edit</th>
                
       
                <th>Delete</th>
        
        
                
                
            </tr>
        </thead>
        <tbody>
			<?php 
			$i=1;
			
			while( $developer = $resultset->fetch_object()) {
			?>
			   <tr id="<?php echo $developer->Id; ?>">
			  
     		   <td><?php echo $i++; ?></td>  
     		   <td><?php echo $developer->FirstName; ?></td>
			   <td><?php echo $developer->LastName; ?></td>
     		   <td><img src="<?php echo $developer->Photo; ?>" width="100%"></td>
     		   <td><?php if( $developer->Attachment=='') 
     		    {
     		   ?>
     		   
     		    <p> N/A </p><a href="editplayer.php?id=<?php echo $developer->Id;?>">click to attach </a>
     		   
     		   <?php
     		    }
     		    
     		    else
     		    {
     		 ?>
     		 
     		  <a href="<?php echo $developer->Attachment; ?>">  View  </a>
     		 <?php
     		    }
     		   ?>
     		   
     		   
     		   </td>
			   
			   <td><?php echo $developer->FathersName; ?></td>
			   <td><?php echo $developer->MothersName; ?></td>
			   <td><?php echo $developer->DOB; ?></td>
			   <td><?php echo $developer->Gender; ?></td>
			   <td><?php echo $developer->NID; ?></td>   
			   <td><?php echo $developer->Address; ?></td> 
			    <td><?php echo $developer->Position; ?></td> 
			    <td><?php echo $developer->AgeCategory; ?></td> 
			   <td><?php echo $developer->Academy; ?></td> 
			    
			   <td><?php echo $developer->Telephone; ?></td>  
			   <td><?php echo $developer->Season; ?></td> 
			   <td><a href="editplayer.php?id=<?php echo $developer->Id;?>"> 
				<button class="btn btn-warning">Edit</button> </a></td>
			   
			   
			    <td><a href="deleteplayer1.php?id=<?php echo $developer->Id;?>" onclick="return confirm('Are you sure you want to delete this Player?');" > 
			<button class="btn btn-danger">Delete</button>  </a></td>
			   
			  
			   
				
				
				
			  
			   </tr>
			<?php } ?>
		</tbody>
         
          
    </table>
				</div>
			</section>

<?php
}

?>

<?php if(!isset($_GET['id']))
{
?>


			<section class="tg-main-section tg-haslayout" id="about-us">
				<div class="container-fluid">
            <?php
            $i=1;
			$sql_query = "SELECT * FROM children WHERE Academy ='".$_SESSION['AcademyName']."' "; 
			$resultset = $con->query($sql_query) or die("database error:". mysqli_error($con));
            $num_centres = $resultset->num_rows;
            ?>
                    <h1> <center> <?php echo $_SESSION['AcademyName']; ?> PLAYERS (<?php echo $num_centres ?>) <center></h1>
                <table id="example" class="table table-striped" style="width:100%">
                <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Photo</th>
                <th>Attachment</th>
                
                <th>Fathers Name</th>
                <th>Mothers Name</th>
                <th>D.O.B</th>
                <th>Gender</th>
                <th>ID</th>
                <th>Address</th>
                <th>Position</th> 
                <th>Age Category</th> 
                <th>Center</th>  
                <th>Telephone</th>
                <th> Season </th>
                <th>Edit</th>
                
        
                <th>Delete</th>
        
       
                
                
            </tr>
        </thead>
        <tbody>
			<?php 
			$i=1;
			
			while( $developer = $resultset->fetch_object()) {
			?>
			   <tr id="<?php echo $developer->Id; ?>">
			  
     		   <td><?php echo $i++; ?></td>  
     		   <td><?php echo $developer->FirstName; ?></td>
			   <td><?php echo $developer->LastName; ?></td>
     		   <td><img src="<?php echo $developer->Photo; ?>" width="100%"></td>
     		   <td><?php if( $developer->Attachment=='') 
     		    {
     		   ?>
     		   
     		    <p> N/A </p><a href="editplayer.php?id=<?php echo $developer->Id;?>">click to attach </a>
     		   
     		   <?php
     		    }
     		    
     		    else
     		    {
     		 ?>
     		 
     		  <a href="<?php echo $developer->Attachment; ?>">  View  </a>
     		 <?php
     		    }
     		   ?>
     		   
     		   
     		   </td>
			   
			   <td><?php echo $developer->FathersName; ?></td>
			   <td><?php echo $developer->MothersName; ?></td>
			   <td><?php echo $developer->DOB; ?></td>
			   <td><?php echo $developer->Gender; ?></td>
			   <td><?php echo $developer->NID; ?></td>   
			   <td><?php echo $developer->Address; ?></td> 
			    <td><?php echo $developer->Position; ?></td> 
			    <td><?php echo $developer->AgeCategory; ?></td> 
			   <td><?php echo $developer->Academy; ?></td> 
			    
			   <td><?php echo $developer->Telephone; ?></td>  
			   <td><?php echo $developer->Season; ?></td> 
			   <td><a href="editplayer.php?id=<?php echo $developer->Id;?>"> 
				<button class="btn btn-warning">Edit</button> </a></td>
			   
			   
			    <td><a href="deleteplayer.php?id=<?php echo $developer->Id;?>" onclick="return confirm('Are you sure you want to delete this Player?');" > 
			<button class="btn btn-danger">Delete</button>  </a></td>
			   
			   
			   
				
				
				
			  
			   </tr>
			<?php } ?>
		</tbody>
         
          
    </table>
				</div>
			</section>
<?php
}
?>

			

			

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
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>   
<script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>  
<script type="text/javascript" src="dataTables.bootstrap5.min.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>  -->

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