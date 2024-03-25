<div id="tg-navigationm-mobile" class="tg-navigationm-mobile tg-navigation collapse navbar-collapse">
			<span id="tg-close" class="tg-close fa fa-close"></span>
			<div class="tg-colhalf">
                                    <ul>
                                        <li class="active">
                                            <a href="applications.php">Applications</a>
                                            
                                        </li>
                                        <li><a href="applications.php"> Pending Applications </a></li>
                                                <li><a href="approvedapplications.php"> Approved Applications </a></li>
                                                <li><a href="deniedapplications.php"> Denied Applications </a></li>
                                                <li><a href="close-open.php"> Close Applications </a></li>
                                        <li>
                                            <a href="#about-us">Football Academies</a> 
                                            
                                        </li>

                                        <li><a href="academy_registration.php">Academy Registration</a></li>
                                        <li><a href="academy.php">Academy Information</a></li>
                                        
                                       
                                    </ul>
             </div>

             <div class="tg-colhalf">
                                    <ul>
                                    <li><a href="player_registration.php">Player Registration</a></li>
                                    <li><a href="players_through_admin.php">Player Information</a>
                                    
                                    <li> <hr/> <a> Male  </a> <hr/> </li> 
                                    <li> <a href="players_through_admin.php?id=7&gender=Male">  Under 7 </a> </li>
                                    <li> <a href="players_through_admin.php?id=10&gender=Male"> Under 10 </a> </li>
                                    <li> <a href="players_through_admin.php?id=15&gender=Male"> Under 15 </a> </li>
                                    <li> <a href="players_through_admin.php?id=20&gender=male"> Under 20 </a> </li>
                                    <li> <a href="players_through_admin.php?id=23&gender=male"> Under 23 </a> </li>
                                    
                                    <li><hr/>  <a> Female </a> <hr/>  </li>
                                    <li> <a href="players_through_admin.php?id=7&gender=Female"> Under 7 </a> </li> 
                                                        <li> <a href="players_through_admin.php?id=10&gender=Female"> Under 10 </a> </li>
                                                        <li> <a href="players_through_admin.php?id=15&gender=Female"> Under 15 </a> </li>
                                                        <li> <a href="players_through_admin.php?id=20&gender=Female"> Under 20 </a> </li>
                                                        <li> <a href="players_through_admin.php?id=23&gender=Female"> Under 23 </a> </li>
                                                    
                                    
                                   
                                    <li><a href="logout.php">Log out</a></li>

                                    </ul>
                                </div>
		</div>
		
		<header id="tg-header" class="tg-header tg-haslayout">
			<div class="container">
				<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
					<div class="row">
						<div class="tg-topbar tg-haslayout">
							
						</div>
						<nav id="tg-nav" class="tg-nav brand-center">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigationm-mobile">
									<i class="fa fa-bars"></i>
								</button>
								<strong class="tg-logo">
									<a href="index-2.html"><img src="images/fer.png" alt="image description"></a>
								</strong>
							</div>
							<div id="tg-navigation" class="tg-navigation">
								<div class="tg-colhalf">
                                    <ul>
                                        <li class="active">
                                            <a href="applications.php">Applications</a>
                                            <ul>
                                                <li><a href="applications.php"> Pending Applications </a></li>
                                                <li><a href="approvedapplications.php"> Approved Applications </a></li>
                                                <li><a href="deniedapplications.php"> Denied Applications </a></li>
                                                <li><a href="close-open.php"> Close /Open Applications </a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#about-us">Football Academies</a> 
                                            <ul class="tg-dropdown-menu">
                                            <li><a href="academy_registration.php">Academy Registration</a></li>
                                            <li><a href="academy.php">Academy Information</a></li>
                                                
                                            </ul>
                                        </li>
                                       
                                    </ul>
                                </div>
                                <div class="tg-colhalf">
                                    <ul>
                                    <li>
                                            <a href="#">Players</a>
                                            <ul class="tg-dropdown-menu">
                                                <li><a href="player_registration.php">Player Registration</a></li>
                                                <li><a href="players_through_admin.php">Player Information</a>
                                                     <ul>
                                                <li> <a> Male </a>
                                                    <ul>
                                                        <li> <a href="players_through_admin.php?id=7&gender=Male">  Under 7 </a> </li>
                                                        <li> <a href="players_through_admin.php?id=10&gender=Male"> Under 10 </a> </li>
                                                        <li> <a href="players_through_admin.php?id=15&gender=Male"> Under 15 </a> </li>
                                                        <li> <a href="players_through_admin.php?id=20&gender=male"> Under 20 </a> </li>
                                                        <li> <a href="players_through_admin.php?id=23&gender=male"> Under 23 </a> </li>
                                                    </ul>
                                                </li>
                                                <li> <a> Female </a>
                                                    <ul>
                                                        <li> <a href="players_through_admin.php?id=7&gender=Female"> Under 7 </a> </li> 
                                                        <li> <a href="players_through_admin.php?id=10&gender=Female"> Under 10 </a> </li>
                                                        <li> <a href="players_through_admin.php?id=15&gender=Female"> Under 15 </a> </li>
                                                        <li> <a href="players_through_admin.php?id=20&gender=Female"> Under 20 </a> </li>
                                                        <li> <a href="players_through_admins.php?id=23&gender=Female"> Under 23 </a> </li>
                                                    </ul>
                                                </li>
                                            </ul> 
                                                </li>
                                            </ul>
                                        </li>
                                        <?php if($_SESSION['Status']=='admin')
                                        {?>
                                        <li>
                                            <a href="addstaff.php">ADD ADMIN/STAFF</a>
                                            <ul>
                                                <li> <a href="viewstaff.php"> View Staff</a></li>
                                            </ul>
                                            
                                            
                                        </li>
                                        <?php
                                        }
                                        ?>
                                         
                                        <li>
                                            <a href="logout.php">LOGOUT</a>
                                            
                                        </li>
                                        
                                        
                                       
                                    </ul>
                                </div>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</header>
