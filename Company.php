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
                        Company
                        <small>Company panel</small>
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
							<h4 class="modal-title" id="exampleModalLabel"><i class="glyphicon glyphicon-file">New</em></i> </h4>
							<div class="modal-body">
											
									
									<?php
									//=================== Insert New Company =======================
									$db->disconnect();
									$db->connect();
									
									if(isset($_POST['btnSave'])){
											$txtCompanyName	=	post('txtCompanyName');
											$txtDescrpiton	=	post('txtDescrpiton');
												
												$insert=$db->query("CALL sp_Company_Insert(
																							'".time()."',
																							N'".sql_quote($txtCompanyName)."',
																							N'".sql_quote($txtDescrpiton)."',
																							@Result 
																							);
																							");
												$Res=$db->query(" select @Result;");	
												$Total= mysql_fetch_row($Res);
												$Insert =implode(" ",$Total);
												if($Insert==1)
													cRedirect('Company.php');
												else if($Insert==0)
													echo'<script>alert("CompanyName has exited already");</script>';
												
										}		
											
									?>
									<form role="form" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label>Company Name</label>
										 <input name="txtCompanyName" class="form-control" placeholder="Enter text" required />
									</div>
			   
									<div class="form-group">
										<label>Description</label>
										<textarea class="form-control" name="txtDescrpiton" id="editor1" rows="3"></textarea>
									</div>
							</div>
								<div class="modal-footer">
									<a href="Company.php">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</a>
									<button type="submit" class="btn btn-primary" name="btnSave">Save</button>
								  </div>
								</div>
							  </div>
							</div>
						</form>
						 </div><!-- /.row -->
							<!--Modal Edit-->
										<div class="modal fade bs-example-modal-sm" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
										  <div class="modal-dialog" role="document">
											<div class="modal-content">
											  <div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="exampleModalLabel"><i class="glyphicon glyphicon-pencil">Edit</i></h4>
												<div class="modal-body">
													<?php
															$db->disconnect();
															$db->connect();
													//================ Get Field From Page Company =================
														$id=get('CompanyID');
														$CompanyName=get('CompanyName');
														$Decription=get('Description');

													//==================== Insert New Company =======================
													if(isset($_POST['btnUpdate'])){
															$id				=		post('txtCompanyID');
															$txtCompanyName	=	post('txtCompanyName');
															$txtDescrpiton	=	post('txtDescrpiton');
															$update=$db->query("CALL sp_Company_Update(
																		'".$id."',
																		N'".sql_quote($txtCompanyName)."',
																		N'".sql_quote($txtDescrpiton)."',
																		@Insert
																		);");
																$Ins=$db->query(" select @Insert;");	
																$Result= mysql_fetch_row($Ins);
																$In =implode(" ",$Result);
																if($In==1)
																	cRedirect('Company.php');
																else if($In==0)
																	echo'<script>alert("CompanyName has exited already");</script>';
										
															}
														?>
														<form role="form" method="post" enctype="multipart/form-data">
															<div class="form-group">
															<input type="hidden" id="txtcompanyID" name="txtCompanyID" class="form-control"  value="<?php echo $CompanyName; ?>" placeholder="Enter text" required />
															</div>
															<div class="form-group">
															<label>Company Name</label>
															<input id="txtcompanyName" name="txtCompanyName" class="form-control"  value="<?php echo $CompanyName; ?>" placeholder="Enter text" required />
															</div>
															<div class="form-group">
															<label>Description</label>
															<textarea " class="form-control" name="txtDescrpiton" id="Descrpiton" rows="3">
																<?php echo $Decription; ?>
															</textarea>
															</div>
										
												</div>
												<div class="modal-footer">
													<a href="Company.php">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</a>
													<button type="submit" class="btn btn-primary" name="btnUpdate" >Save</button>
												  </div>
												</div>
											  </div>
											</div>
											</form>
										 </div>
                  
                
                 
                    <!-- title row -->
					<div class="panel-body">
                    <div class="dataTable_wrapper">
				
						<div class="row">
						<div class="col-xs-12 table-responsive">
							<table class="table table-bordered  table-hover">
											<thead>
												<tr>
												<th colspan="12">
												<div class="row">	
													<div class="col-md-3 pull-left">
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-file-o"></i>New</button>
													</div>
													
													<div class="col-md-4 pull-right"> 
														<form class="navbar-form" role="search">
															<div class="pull-right" style="margin-top:-8px;">
															<div class="input-group">
															<div class="input-group-btn">
															</div><!-- /btn-group -->
																<input type="text" class="form-control" placeholder="Search" value="<?php echo $searchTemp?>" name="srch-normal" id="search.php?dnsname=name&srch-term">
															<div class="input-group-btn">
																<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
															</div><!-- /btn-group -->
															</div><!-- /input-group -->
															</div>
														</form>
													</div>
													
													</tr>
													</thead>
												</div>
										<thead>
									
											<tr style="background-color:#4682B4; color:white;">
												<th>ID</th>
												<th>Company Name</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
									   
										</thead>
										<tbody>
									
										<?php
										$db->disconnect();
										$db->connect();
			
										$_slide1 = $db->query("CALL sp_Company_Select('".$searchTemp."')");
										$numrow=$db->dbCountRows($_slide1);
											$i = 1;
										if($numrow>0)
										{
											while($row=$db->fetch($_slide1)){
													$id=$row->CompanyID;
													$CompanyName = $row->CompanyName;
													$Decription = $row->Description;	
												
												echo'<tr class="gradeA">
															<td>'.$i++.'</td>
															<td>'.$CompanyName.'</td>
															<td>'.$Decription.'</td>
															<td class="center" >';
																echo "<a onclick=\"getElement('".$id."','".$CompanyName."','".$Decription."')\">Edit";
																echo '</a>
																
															</td>
												
													</tr>';
												}	
											}
										else 
											echo'<tr><td  colspan="7"><font color =Red>No Record Found.</font></td></tr>';
									?>
									   
									</tbody>
								</table>
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
						
					</div>
					</div>
						
                
				<script type="text/javascript">
					var companyName=document.getElementById("txtcompanyName");
					var companyID=document.getElementById("txtcompanyID");
					var description=document.getElementById("Descrpiton");
					function getElement(getcompanyID,getCompanyName,getDescription){
						$('.bs-example-modal-sm').modal('show');
							companyID.value=getcompanyID;
							companyName.value=getCompanyName;
							description.value=getDescription;
					}
				
				</script>
                    
            </aside><!-- /.right-side -->
            
            
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
<?php include 'footer.php';?>