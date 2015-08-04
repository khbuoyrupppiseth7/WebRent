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
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
			
                <!-- Main content-->			
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">New DNS</h4>
							
						  <div class="modal-body">
							<?php

								if(isset($_POST['btnSave'])){
										$txtDNS	=	post('txtDNS');
										$txtFromDate    =	post('txtFromDate');
										$txtToDate	=	post('txtToDate');
										$txtLiveTime	=	post('txtLiveTime');
										$txtCusName	        =	post('txtCusName');
										$txtPhone	    =	post('txtPhone');
										$txtAddress	    =	post('txtAddress');
										$txtDesc	    =	post('txtDesc');
											$thisy = date("Y") + $txtToDate;
											$thism = date('m');
											$thisd = date('d');
											$Thisyear = $thisy.'-'.$thism.'-'.$thisd;
											
											
										
										$insert=$db->query("call spInsert_Dns_LiveTime('".$txtLiveTime."',
																				'".time()."',
																				N'".sql_quote($txtDNS)."',
																				N'".sql_quote($txtCusName)."',
																				N'".sql_quote($txtFromDate)."',
																				N'".sql_quote($Thisyear)."',
																				N'".sql_quote($txtPhone)."',
																				N'".sql_quote($txtAddress)."',
																				N'".sql_quote($txtDesc)."');
																				");
											
										if($insert){
												cRedirect('dns.php');
											}
										
										else
											$error = "Error for Create New User.";
										
									}
								?>
								<form role="form" method="post" enctype="multipart/form-data">
								<div class="form-group">
								   <form role="form" method="post" enctype="multipart/form-data">
									<label>DNS Name:</label>
										<input name="txtDNS" class="form-control" placeholder="Enter text" required />
								  </div>
								  <div class="form-group">
										<label>Start Date:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" name="txtFromDate" class="form-control pull-right" id="datemask"/>
											</div><!-- /.input group -->
								   </div><!-- /.form group -->
								   
								   
								   <div class="form-group">
										<label>Choose Year</label>
										<select class="form-control" name="txtToDate">
										   <option value="1">1 Year</option>
										   <option value="2">2 Years</option>
										   <option value="3">3 Years</option>										
										</select>
										
								   </div>
								   
								   <div class="form-group">
										<label>Is Live Time:</label>
										<div class="input-group">
											<input type="checkbox" name="txtLiveTime" value="Yes" /> Click Here.
										</div><!-- /.input group -->
								   </div><!-- /.form group -->
								   
								   <div class="form-group">
									<label>Customer Name:</label>
										<input name="txtCusName" class="form-control" placeholder="Enter text"  />
								   </div>
								   
								   <div class="form-group">
									<label>Phone Number:</label>
										<input name="txtPhone" class="form-control" placeholder="Enter text"  />
								   </div>
								   
								   <div class="form-group">
									<label>Address:</label>
										<input name="txtAddress" class="form-control" placeholder="Enter text"  />
								   </div>
								   
								   <div class="form-group">
									<label>Description:</label>
										<input name="txtDesc" class="form-control" placeholder="Enter text"  />
								   </div>
								   
								
								
							  					  
							</div>
							  <div class="modal-footer">
								<a href="dns.php">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</a>
								<button type="submit" class="btn btn-primary" name="btnSave">Save</button>
							  </div>
							</div>
						  </div>
						</div>
						</form>
                     </div><!-- /.row -->
               
				<div class="panel-body">
                   <div class="dataTable_wrapper">
						<section class="content invoice">
						<div class="row">
					
                        <div class="col-xs-12 table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
									<th colspan="12">
										<div class="col-md-6">
										<button style="margin-left:-20px;"type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-file-o"></i>New DNS</button>
										</div>
										
									<div class="col-md-4"> 
										 <form class="navbar-form" role="search">
										  <div class="pull-right" style="margin-top:-8px;">
											<div class="input-group">
											  <div class="input-group-btn">
												<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Normal <span class="caret"></span></button>
												<ul class="dropdown-menu" role="menu">
												  <li><a href="dns-advance.php">Advance</a></li>
												  
												</ul>
											  </div><!-- /btn-group -->
											  <input type="text" class="form-control" placeholder="Search" name="srch-normal" id="search.php?dnsname=name&srch-term">
											  <div class="input-group-btn">
												 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
											  </div><!-- /btn-group -->
											</div><!-- /input-group -->
										   </div><!-- /.col-lg-3 -->										   
										   </form>
										</div>
									<div class="col-md-2">
										<h5 class="pull-right">Date: 2/10/2014</h5>
										</div>

										
									
									</tr>
								</thead>
								<thead>				
                                        <th>No</th>
                                        <th>DNS Name</th>
                                        <th>Customer</th>
                                        <th>Phone</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Is Live Time</th>
                                        
                                    </tr>
                                   
                                </thead>
                                <tbody>
                                    
                                    
                                    <?php
									$txtsrch = get('srch-normal');
									//$_slide1 = $db->query("SELECT dnsID, dnsName, DateFrom, DateTo, CusName,IsLiveTime, CusPhone FROM `tblDNS` WHERE dnsName LIKE '%".$txtsrch."%';");
									$_slide1 = $db->query("call spSelect_DnsNameByName('".$txtsrch."');");
									$numrow=$db->dbCountRows($_slide1);
										$i = 1;
									if($numrow>0)
									{
										while($row=$db->fetch($_slide1)){
											$dnsID = $row->dnsID;
											$dnsName = $row->dnsName;
											$CusName = $row->CusName;
											$DateFrom = $row->DateFrom;
											$DateTo = $row->DateTo;
											$IsLiveTime = $row->IsLiveTime;
											$CusPhone = $row->CusPhone;
											
											echo '<tr>
												<td>'.$i++.'</td>
												<td><a class="iframe" href="dns-update.php?id='.$dnsID.'">'.$dnsName.'</a></td>
												<td>'.$CusName.'</td>
												<td>'.$CusPhone.'</td>
												<td>'.$DateFrom.'</td>
												<td>'.$DateTo.'</td>
												<td>'.$IsLiveTime.'</td>
												
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
					</div>
					</div>

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