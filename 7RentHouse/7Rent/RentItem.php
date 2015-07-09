<?php include 'header.php';
$searchTemp=get('srch-normal');
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
                        RentItem
                        <small>RentItem</small>
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
                    <a href="RentItem-new.php">
					<button class="btn btn-primary" data-toggle="modal" data-target="#NewFloor"><i class="fa fa-file-o"></i> New Item</button>
                    </a>
                    
                    <form class="navbar-form" role="search">
                      <div class="col-lg-3 pull-right">
                        <div class="input-group">
                          
                          <input type="text" class="form-control" placeholder="Search" name="srch-normal" id="search.php?dnsname=name&srch-term" <?php echo 'value="'.$searchTemp.'"'?>>
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
										<th>Item Name</th>
										<th>Company</th>
										<th>Category</th>
										<th>Price</th>
										<th>Status</th>
                                        <th>Description</th>
										<th>Action</th>
                                    </tr>
                                   
                                </thead>
                                <tbody>
                                    
                                    
                                    <?php
								//	$txtsrch = get('srch-normal');
								
									$_slide1 = $db->query("CALL sp_RentItem_Select_Company('".$searchTemp."')");
						
									$numrow=$db->dbCountRows($_slide1);
										$i = 1;
									if($numrow>0)
									{
										while($row=$db->fetch($_slide1)){
												$id=$row->RentItemID;
												$ItemName = $row->ItemName;
												$CompanyID=$row->CompanyID;
												$CompanyName=$row->CompanyName;
												$CategoryID=$row->CategoryID;
												$CategoryName = $row->CategoryName;
												$Price=$row->Price;
												$Status=$row->isStatus;
												if($Status==1)
												$isStatus="Free";
												else
												$isStatus="Busy";
												$Decription = $row->Desciption;	
											
											echo'<tr class="gradeA">
														<td>'.$i++.'</td>
														<td>'.$ItemName.'</td>
														<td>'.$CompanyName.'</td>
														<td>'.$CategoryName.'</td>
														<td>'.$Price.'$</td>
														<td>'.$isStatus.'</td>
														<td>'.$Decription.'</td>
														<td>
														<a class="iframe" href="RentItem-Update.php?id='.$id.'&CompanyID='.$CompanyID.'&CompanyName='.$CompanyName.'&ItemName='.$ItemName.'&CategoryID='.$CategoryID.'&CategoryName='.$CategoryName.'&Price='.$Price.'&Status='.$Status.'&Decription='.$Decription.'">
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