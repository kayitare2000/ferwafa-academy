<?php
session_start();
require('db_connect.php');

if(!isset($_SESSION['UserName']))
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
		

			<?php include('nav2.php'); ?> 
		
		
		<div class="tg-sliderbox" style="height:30%">
			
			<div class="tg-imglayer">
           
            </div> 
		
		</div>
		
		<main id="tg-main" class="tg-main tg-haslayout">

			<section class="tg-main-section tg-haslayout" id="about-us">
				<div class="container">
            <?php
            $i=1;
			$sql_query = "SELECT * FROM academy ";
			$resultset = $con->query($sql_query) or die("database error:". mysqli_error($con));
            $num_centres = $resultset->num_rows;
            ?>
                    <h1> <center>FOOTBALL ACADEMY (<?php echo $num_centres ?>) <center></h1>
                <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Football Center Name</th>
                <th>Football Coach</th>
                <th>Photo</th>
                <th>Contact</th>
                <th>Province</th>
                <th>District</th>
                <th>Sector</th>
                <th>Cell</th>
                <th>Edit</th>
                <?php

                if($_SESSION['Status']=='admin')
                { 
                ?>
                <th>Delete</th>
                <?php
                }
                ?>
               
            </tr>
        </thead>
       <tbody>
			<?php 
			
			while( $developer = $resultset->fetch_object()) {
			?>
			
			   <tr id="<?php echo $developer->Id; ?>">
			  
     		   <td><?php echo $i++; ?></td> 
			   <td><?php echo $developer->AcademyName; ?></td>
			   <td><?php echo $developer->Coach;?></td>
			   <td><img src="<?php echo $developer->Photo; ?>" width="30%"></td>
			   <td><?php echo $developer->Contact;?></td>
			   <td><?php echo $developer->Province; ?></td>
			   <td><?php echo $developer->District; ?></td>
			   <td><?php echo $developer->Sector; ?></td>
			   <td><?php echo $developer->Cell; ?></td>	
			   <td><a href="editacademy.php?id=<?php echo $developer->Id;?>"> 
				<button class="btn btn-warning">Edit</button></a>
			   </td>
			   <?php
			   if($_SESSION['Status']=='admin')
			   {
			   ?>
			   <td><a href="deleteacademy.php?id=<?php echo $developer->Id;?>" onclick="return confirm('Are you sure you want to delete this academy?')";> 
				 <button class="btn btn-danger">Delete</button></a>
			   </td> 
			   <?php } ?>
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