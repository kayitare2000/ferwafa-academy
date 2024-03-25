<?php session_start(); 
require('db_connect.php');
if(!isset($_SESSION['Id']))
{
    header('Location:index.php'); 
}
?> 
<?php
 $sql_query = "SELECT * FROM applications";
 $resultset = $con->query($sql_query) or die("database error:". mysqli_error($con));
 $num_centres = $resultset->num_rows;
 $developer = $resultset->fetch_object();  

 if ($developer->CopyOfRegisteredStatus !='' AND $developer->ProofOfRegistration !='' AND $developer->DeclarationOfRegistration !='' AND $developer->OrganizationChart !='' AND  $developer->ProofOfImplementation !=''AND  $developer->CoachLicense !='' AND $developer->CoachName !='' AND $developer->CoachPicture !='' AND $developer->ComprehensiveYouthProgramme !='' AND $developer->PitchPicture !='' AND $developer->TrainingEquipment !='' AND $developer->FirstAidBox !='' AND $developer->ProofOfInsurance !='') 
     {   
         $licence_category = "A";   
     }
 else
     {
         $licence_category = "B"; 
     }

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<script rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js" ></script>
<script rel="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<style>
        .body-main {
        background: #ffffff;
        border-bottom: 15px solid #1E1F23;
        border-top: 15px solid #1E1F23;
        margin-top: 30px;
        margin-bottom: 30px;
        padding: 40px 30px !important;
        position: relative ;
        box-shadow: 0 1px 21px #808080;
        font-size:10px;
   
    }

    .main thead {
		background: #1E1F23;
        color: #fff;
		}
    .img{
        height: 100px;}
    h1{
       text-align: center;
    }
</style>
<div class="container">

<div class="page-header">
    <h1> LICENSE TO OPERATE </h1>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 body-main">
            <div class="col-md-12">
               <div class="row">
                    <div class="col-md-4">
                        <img class="img" alt="Invoce Template" src="images/fer.png" />
                    </div>
                    <div class="col-md-8 text-right">
                        <h4 style="color: #F81D2D;"><strong>FERWAFA</strong></h4>   
                        <p>KIGALI RWANDA</p>
                        <p> <b> License Category: </b> <?php echo $developer->Category; ?></p>
                        
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-12 text-center">
                      
                        <h5> THIS LICENSE AUTHORIZES <strong> <?php echo $_SESSION['AcademyName']; ?> </strong> TO PEROFRM DUTIES UNDER FERWAFA </h5>
                    </div>
                </div>
                <br />
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><h5><?php echo $_SESSION['AcademyName']; ?> having fulfilled the minimun requirements to be apart of FERWAFA is hereby  granted this License to Operate it's Academy.</h5></th>
                                <th><h5></h5></th>
                            </tr>
                        </thead>
                        <tbody>
           
                        </tbody>
                    </table>
                </div>
                <div>
                    <div class="col-md-12">
                        <p><b>Granted on :</b> Jan 2024</p> 
                        <br/>
                        
                        <p><b> Valid For One year from date of Issue </b></p>
                        <br/>
                        <p><b>Authorizing Party : &copy FERWAFA</b> </p>
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
