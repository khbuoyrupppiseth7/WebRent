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

                <!-- Main content -->
                
                  <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> 
                                
                                <small class="pull-right">Date: 2/10/2014</small>
                            </h2>
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                    <a href="dns-new.php">
					<button class="btn btn-primary" data-toggle="modal" data-target="#NewFloor"><i class="fa fa-file-o"></i> New DNS</button>
                    </a>
                    
                    <form class="navbar-form" role="search">
                      <div class="col-lg-3 pull-right">
                        <div class="input-group">
                          <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">DNS Name <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu">
                              
                              <li><a href="FromDate">Another action</a></li>
                              <li><a href="#">Something else here</a></li>
                              <li class="divider"></li>
                              <li><a href="#">Separated link</a></li>
                            </ul>
                          </div><!-- /btn-group -->
                          <input type="text" class="form-control" placeholder="Search" name="srch-dnsname" id="search.php?dnsname=name&srch-term">
                          <div class="input-group-btn">
                             <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div><!-- /btn-group -->
                        </div><!-- /input-group -->
                       </div><!-- /.col-lg-3 -->
                       </form>
                     </div><!-- /.row -->
                   
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
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
									$txtsrch = get('srch-term');
									$_slide1 = $db->query("SELECT dnsID, dnsName, DateFrom, DateTo, IsLiveTime, CusName, CusPhone FROM `tblDNS`;");
						
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
												<td><a href="dns-update.php?id='.$dnsID.'">'.$dnsName.'</a></td>
												<td>'.$CusName.'</td>
												<td>'.$CusPhone.'</td>
												<td>'.$DateFrom.'</td>
												<td>'.$DateTo.'</td>
												<td>'.$IsLiveTime.'</td>
												
											</tr>';
											
										}	
										
									}
									else 
										echo'<tr><td>No Record Found.</td></tr>';
								
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