<?php include 'header.php';

?>

    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
         <?php include 'nav.php';?>
        
            <!-- Left side column. contains the logo and sidebar -->
            <?php include 'menu.php';?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Customer
                       
                    </h1>
                   
                </section>

                <!-- Main content -->
                
                  <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
					 <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                      <th colspan="4">                  
							<a href="Customer-new.php">
							<button class="btn btn-primary" data-toggle="modal" data-target="#NewFloor"><i class="fa fa-file-o"></i>New Customer</button>
							</a>
					  </th>
					 <th colspan="10">
                      <div class="row">
                                                    
                    <form class="navbar-form" role="search">
                      <div class="col-lg-5 pull-right">
                        <div class="input-group">
                          <div class="input-group-btn">
                          </div><!-- /btn-group -->
                          <input type="text" class="form-control" placeholder="Search" name="srch-normal" id="search.php?dnsname=name&srch-term">
                          <div class="input-group-btn">
                             <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div><!-- /btn-group -->
                        </div><!-- /input-group -->
                       </div><!-- /.col-lg-3 -->
                       </form>
                     </div>
					  </th>
                            </tr>
                                </thead>
								<thead>

                                    <tr>
                                        <th>No</th>
										<th>Company</th>
                                        <th>Customer</th>
										<th>Nationality</th>
										<th>Gender</th>
                                        <th>BrithDath</th>
										<th>Address</th>
										<th>City</th>
										<th>Tel</th>
										<th>Mobile</th>
										<th>Action</th>
                                    </tr>
                                   
                                </thead>
                                <tbody>
                                    
                                    
                                    <?php
								//	$txtsrch = get('srch-normal');
									$_slide1 = $db->query("CALL sp_Customer_Select_Company");
						
									$numrow=$db->dbCountRows($_slide1);
										$i = 1;
									if($numrow>0)
									{
										while($row=$db->fetch($_slide1)){
												$id=$row->CustomerID;
												$CompanyName=$row->CompanyName;
												$fullName = $row->fullName;
												$Nationality=$row->Nationality;
												$Gender=$row->Gender;
												$Birthdate=$row->Birthdate;
												$Address=$row->Address;
												$City=$row->City;
												$Tel1=$row->Tel1;
												$Mobile=$row->Mobile;
																		//date("d-m-Y", strtotime($Birthdate));				
											echo'<tr class="gradeA">
														<td>'.$i++.'</td>
														<td>'.$CompanyName.'</td>
														<td>'.$fullName.'</td>
														<td>'.$Nationality.'</td>
														<td>'.$Gender.'</td>
														<td>'.date("d-m-Y", strtotime($Birthdate)).'</td>
														<td>'.$Address.'</td>
														<td>'.$City.'</td>
														<td>'.$Tel1.'</td>
														<td>'.$Mobile.'</td>
														<td>
														<a class="iframe" href="Customer-Update.php?id='.$id.'&fullName='.$fullName.'&Nationality='.$Nationality.'
														&Gender='.$Gender.'&Birthdate='.$Birthdate.'&Address='.$Address.'&City='.$City.'&Tel1='.$Tel1.'&Mobile='.$Mobile.'">
															<button class="btn btn-sm btn-primary">
																<i class="glyphicon glyphicon-pencil"></i>
																Edit
															</button>
                                                    		</a>
														</td>
												</tr>';
											
										}	
										
									}
									else 
										echo'<tr><td  colspan="7"><font color =Red>No Record Found.</font></td></tr>';
								
                                ?>
                                   
                                </tbody>
                            </table>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <button class="btn btn-primary pull-right" onClick="window.print();"><i class="fa fa-print"></i> Print</button>
                           
                        </div>
                    </div>
                    
                    
                    
                </section>
                    
            </aside><!-- /.right-side -->
            
            
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
<?php include 'footer.php';?>