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
                        Category
                        
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">New Category</h4>
							<div class="modal-body">
									<?php 
									//==================== Insert New Category ======================
									$db->disconnect();
									$db->connect();
									if(isset($_POST['btnSave'])){
										
											$CompanyID		=	post('cboCompanyID');
											$txtCategory	=	post('txtCategory');
											$txtOrder		=   post('txtOrder');
											$txtDescrpiton	=	post('txtDescrpiton');
									
											
											$insert=$db->query("CALL sp_Category_Insert (
																			'".time()."',
																			'".$CompanyID."',
																			N'".sql_quote($txtCategory)."',
																			'".$txtOrder."',	
																			N'".sql_quote($txtDescrpiton)."'
																			);
																			");
										
														if($insert){
																cRedirect('Category.php');
																//$error = 'Success';
																
														}		
											}
									?>
											<script language="javascript">
											function checkInput(ob) {
											  var invalidChars = /[^0-9]/gi
											  if(invalidChars.test(ob.value)) {
														ob.value = ob.value.replace(invalidChars,"");
												  }
											}
											</script>
											<div class="form-group">
											<label>Choose Category</label>
											<select class="form-control" name="cboCompanyID">   
												<?php
												
												  $select=$db->query("CALL sp_Company_Select('')");
													$rowselect=$db->dbCountRows($select);
													if($rowselect>0){
														
														while($row=$db->fetch($select)){
														$CompanyID = $row->CompanyID;
														$CompanyName = $row->CompanyName;
															echo'<option value='.$CompanyID.'>'.$CompanyName.'</option>';
																
								
														}
													}
													
												?>
											</select>
									</div>
									<form role="form" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label>Category Name</label>
										<input name="txtCategory" class="form-control" placeholder="Enter text" required />
									</div>
									
									<div class="form-group">
										<label>Order</label>
										<input name="txtOrder" class="form-control" placeholder="Enter Number" onkeyup="checkInput(this)" required />
									</div>
			   
									<div class="form-group">
										<label>Description</label>
										<textarea class="form-control" name="txtDescrpiton" id="editor1" rows="3"></textarea>
									</div>
							</div>
							<div class="modal-footer">
							<a href="Category.php">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</a>
							<button type="submit" class="btn btn-primary" name="btnSave">Save</button>
							</div>
						  </div>
						</div>
						</div>
						</form>
						</div><!-- /.row -->
					   
                    <!-- Table row -->
				 <section class="content invoice">
                   <div class="panel-body">
                   <div class="dataTable_wrapper">
                    <div class="row">
                       <div class="col-xs-12 table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
									<th colspan="7">
										<div class="col-md-6">
											<button style="margin-left:-20px;"type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-file-o"></i>New Category</button>
										</div>
										
											<div class="col-md-4"> 
												<form class="navbar-form" role="search">
												  <div class="pull-right"style="margin-top:-8px;">
													<div class="input-group">
													  <div class="input-group-btn">
														<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Normal <span class="caret"></span></button>
														<ul class="dropdown-menu" role="menu">
														  <li><a href="dns-advance.php">Advance</a></li>
														  
														</ul>
													  </div><!-- /btn-group -->
													<input type="text" class="form-control" placeholder="Search" name="srch-normal" id="search.php?dnsname=name&srch-term" <?php echo 'value="'.$searchTemp.'"'?>>
													  <div class="input-group-btn">
														 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
													  </div><!-- /btn-group -->
													</div><!-- /input-group -->
												   </div><!-- /.col-lg-3 -->
												   </form>
												 </div><!-- /.row -->
												 <div class="col-md-2">
													<h5 class="pull-right">Date: 2/10/2014</h5>
													</div>
											</tr>
										   
												
								
								</thead>
                                <thead>
                                    <tr>
                                        <th>No</th>
										<th>Company</th>
                                        <th>Category</th>
										<th>OrderNo</th>
                                        <th>Description</th>
										<th>Action</th>
                                    </tr>
                                   
                                </thead>
                                <tbody>
                                    
                                    
                                    <?php
									$db->disconnect();
									$db->connect();
								//	$txtsrch = get('srch-normal');
									$_slide1 = $db->query("CALL sp_Category_Select_Company('".$searchTemp."')");
						
									$numrow=$db->dbCountRows($_slide1);
										$i = 1;
									if($numrow>0)
									{
										while($row=$db->fetch($_slide1)){
												$id=$row->CategoryID;
												$CompanyName=$row->CompanyName;
												$Category = $row->CategoryName;
												$OrderNo=$row->OrderNo;
												$Decription = $row->Description;	
											
											echo'<tr class="gradeA">
														<td>'.$i++.'</td>
														<td>'.$CompanyName.'</td>
														<td>'.$Category.'</td>
														<td>'.$OrderNo.'</td>
														<td>'.$Decription.'</td>
														<td>
														<a class="iframe" href="Category-Update.php?id='.$id.'&Category='.$Category.'&OrderNo='.$OrderNo.'&Decription='.$Decription.'">
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
                  </div>
                 </div>    
                    
                    
                </section>
                    
            </aside><!-- /.right-side -->
            
            
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
<?php include 'footer.php';?>