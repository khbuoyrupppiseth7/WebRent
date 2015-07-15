 <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                AdminLTE
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
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
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">
                                
                                	<?php
											//Call Select for New company
											$db->disconnect();
											$db->connect();
											$select2=$db->query("SELECT
											COUNT(tblcustomer_rent.Customer_RentID) as Total
										From tblcustomer_rent
										INNER JOIN tbcustomer ON tblcustomer_rent.CustomerID = tbcustomer.CustomerID
										INNER JOIN tblrentitem ON tblcustomer_rent.RentItemID = tblrentitem.RentItemID
										WHERE  DATEDIFF(Date(CONCAT(YEAR(NOW()),\"-\",MONTH(NOW()),\"-\",DAY(tblcustomer_rent.PayDate))),Date(Now()))<=5
										AND tblcustomer_rent.RentItemID NOT IN(SELECT RentItemID FROM customer_rent_pay WHERE Month(PayDate)=Month(NOW()) AND Year(PayDate)=Year(NOW()))
										AND Month(tblcustomer_rent.PayDate)<=Month(NOW()) AND Year(tblcustomer_rent.PayDate)<=Year(NOW());
										
										");
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
										//Call Select for New company
									
										$select3=$db->query("SELECT
																CR.Customer_RentID AS Customer_RentID,
																C.fullName AS FullName,
																R.ItemName AS ItemName,
																CR.RentDate AS RentDate,
																CR.PayDate AS PayDate,
																CR.Price AS Price
															From tblcustomer_rent CR
															INNER JOIN tbcustomer C ON CR.CustomerID=C.CustomerID
															INNER JOIN tblrentitem R ON CR.RentItemID=R.RentItemID
															WHERE DATEDIFF(COALESCE(Date(CONCAT(YEAR(NOW()),\"-\",MONTH(NOW()),\"-\",DAY(CR.PayDate))),0),Date(Now()))<=5
															AND CR.RentItemID NOT IN(SELECT RentItemID FROM customer_rent_pay WHERE Month(PayDate)=Month(NOW()) and Year(PayDate)=Year(NOW()))
															AND Month(CR.PayDate)<=Month(NOW()) AND Year(CR.PayDate)<=Year(NOW());");
											
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
													<a href="#">
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
                                <li class="footer"><a href="#">See All Messages</a></li>
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