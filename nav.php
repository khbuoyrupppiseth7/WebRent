 <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                AdminLTE
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="Customer_Rent.php" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-usd"></i>
                                <span class="label label-success">
                                
                                	<?php
											//Call Select for New company
											$getComIDUser=$_SESSION['CompanyID'];
											$db->disconnect();
											$db->connect();
											$select2=$db->query("CALL spCountCus('".$getComIDUser."');");
											$rowselect2=$db->dbCountRows($select2);
											if($rowselect2>0){
												$row=$db->fetch($select2);
												echo  $row->Total;
											}
											else
											{
												echo '0';
											}
											?>
                               
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">
									
                                </li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                                                                
                                        <?php 
										$db->disconnect();
										$db->connect();
										//Call Select for New company
										$select3=$db->query("CALL spSelectCusPay('".$getComIDUser."')");	
										$rowselect3=$db->dbCountRows($select3);
										if($rowselect3>0){
											
											while($row1=$db->fetch($select3)){
											$Customer_RentID = $row1->Customer_RentID;
											$FullName = $row1->FullName;
											$ItemName = $row1->ItemName;
											$RentDate = $row1->RentDate;
											$PayDate = $row1->PayDate;
											$Price = $row1->Price;
											echo '<li>
													<a href="Customer_Rent.ph
													p?Customer_RentID='.$Customer_RentID .'">
														<h4>
															'.$FullName.'
															<small><i class="fa fa-clock-o"></i>'.$ItemName.'</small>
														</h4>
														<p>Pay Date :'.$PayDate.' &nbsp;Price : $' .$Price. '</p>
													</a>
												</li>';
											
											}
											
										}
										?>
                                 
                                    </ul>
                                </li>
                                <li class="footer"><a href="SeeAll_Messages.php">See All Messages</a></li>
                            </ul>
                        </li>
							
						
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Advance<i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $U_Acc; ?>
                                        <small>Powered by 7Technology</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!--<li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>-->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">