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
				<!--Modal AddNew-->
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
									$ComId=$getComIDUser;
									if($_SESSION['Level']=='1')
									$ComId=post('cboCompanyID');
									if(isset($_POST['btnSave'])){
										    //$CompanyID      =post('cboCompanyID');
											$txtCategory	=	post('txtCategory');
											$txtOrder		=   post('txtOrder');
											$txtDescrpiton	=	post('txtDescrpiton');
										
											$insert=$db->query("CALL sp_Category_Insert (
																			'".time()."',
																			'".$ComId."',
																			N'".sql_quote($txtCategory)."',
																			'".$txtOrder."',	
																			N'".sql_quote($txtDescrpiton)."',
																			@Insert
																			);
																			");
											$Ins=$db->query(" select @Insert;");	
																$Result= mysql_fetch_row($Ins);
																$In =implode(" ",$Result);
																if($In==1)
																	cRedirect('Category.php');
																else if($In==0)
																	echo'<script>alert("CategoryName has exited already");</script>';
										
															
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
										<form role="form" method="post" enctype="multipart/form-data">
											
											<div class="form-group">
											<?php
												if($_SESSION['Level']=='1'){
												echo '<label>Choose Company</label>';
												echo '<select class="form-control" name="cboCompanyID"> ';  
													
													
												  $select=$db->query("CALL sp_Company_Select('')");
													$rowselect=$db->dbCountRows($select);
													if($rowselect>0){
														
														while($row=$db->fetch($select)){
														$CompanyID = $row->CompanyID;
														$CompanyName = $row->CompanyName;
															echo'<option value='.$CompanyID.'>'.$CompanyName.'</option>';
																
								
														}
													}
												
												echo '</select>';
											}
										?>
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
						</div>
				<!--Modal Edit-->
				<div class="modal fade bs-example-modal-sm" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Edit Category</h4>
					<div class="modal-body">
							<?php
								$db->disconnect();
								$db->connect();
								//================ Get Field From Page Category =================
									$id=get('id');
									$Category=get('Category');
									$OrderNo=get('OrderNo');
									$Decription=get('Decription');
									$db->disconnect();
									$UserID = $_SESSION['UserID'];
									$db->connect();
									$select=$db->query("SELECT 
														C.CompanyID AS CompanyID,
														CO.CompanyName AS CompanyName
														FROM tblcategory C
														INNER JOIN tblcompany CO ON C.CompanyID=CO.CompanyID
														WHERE C.CategoryID= '".$id."'");

									$numrow=$db->dbCountRows($select);
									if($numrow>0){
										$row=$db->fetch($select);
										$CompanyID1 = $row->CompanyID;
										$CompanyName1 = $row->CompanyName;
									}

								//==================== Insert New Branch =======================

								if(isset($_POST['btnUpdate'])){
										$id             =   post('Category'); 
										$txtCategory	=	post('txtCategory');
										$txtOrderNo		=   post('txtOrder');
										$txtDescrpiton	=	post('txtDescrpiton');
											
											$update=$db->query("CALL sp_Category_Update(
													'".$id."',
													N'".sql_quote($txtCategory)."',
													'".$txtOrderNo."',
													N'".sql_quote($txtDescrpiton)."',
													@Insert
													);			
										");
											$Ins=$db->query(" select @Insert;");	
																$Result= mysql_fetch_row($Ins);
																$In =implode(" ",$Result);
																if($In==1)
																	cRedirect('Category.php');
																else if($In==0)
																	echo'<script>alert("Category has exited already");</script>';
										
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
							<form role="form" method="post" enctype="multipart/form-data">
							
									
										<div class="form-group">
										<input  type="hidden" class="form-control" name="cboCategory" autocomplete="on"  id="cboCompany" >
												<?php
												$db->disconnect();
												$db->connect();	
												  $select=$db->query("CALL sp_Company_Select('')");
													$rowselect=$db->dbCountRows($select);
													
													if($rowselect>0){
														while($row=$db->fetch($select)){
														
														$CompanyID = $row->CompanyID;
														$CompanyName = $row->CompanyName;
															
														}
														
													}										
												?>
											</div>
								
									<div class="form-group">
									<input type="hidden" name="txtCompany" id="companyId" class="form-control"  value="<?php echo $CompanyID; ?>" placeholder="Enter text" required />
									</div>
									<div class="form-group">
										<input type="hidden" name="Category" id="categoryId" class="form-control"  value="<?php echo $Category; ?>" placeholder="Enter text" required />
									</div>
								
								  
									<div class="form-group">
										<label>Category Name</label>
										<input name="txtCategory" id="CategotyName" class="form-control"  value="<?php echo $Category; ?>" placeholder="Enter text" required />
									</div>
									
									<div class="form-group">
										<label>Order</label>
										<input name="txtOrder" id="Order" class="form-control" value="<?php echo $OrderNo; ?>" placeholder="Enter Number" onkeyup="checkInput(this)" required />
									</div>
									
									<div class="form-group">
										<label>Description</label>
										<textarea class="form-control" id="Description" name="txtDescrpiton" id="editor1" rows="3">
										<?php echo $Decription; ?>
										</textarea>
									</div>
										
													
													
					</div>
					<div class="modal-footer">
						<a href="Category.php">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</a>
						<button type="submit" class="btn btn-primary" name="btnUpdate">Save</button>
					</div>
				</div>
				</div>
				</div>
					</form>
				</div><!-- /.row -->
				
                   <div class="panel-body" >
                   <div class="dataTable_wrapper">
                    <div class="row">
                       <div class="col-xs-12 table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
									<th colspan="12">
										<div class="col-md-7 pull-left">
											<button style="margin-left:-20px;"type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-file-o"></i>New</button>
										</div>
										
										<div class="col-md-5"> 
											<form class="navbar-form" role="search">
												<div class="pull-right" style="margin-top:-8px;">
												<div class="input-group">
												<div class="input-group-btn">
											    </div><!-- /btn-group -->
													<input type="text" class="form-control" placeholder="Search" value="<?php echo $searchTemp;?>" name="srch-normal" id="search.php?dnsname=name&srch-term">
														<div class="input-group-btn">
													
															 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
														
														</div><!-- /btn-group -->
												</div><!-- /input-group -->
												</div><!-- /.col-lg-3 -->
											</form>

										</div>
										
									</tr>
										   
												
								
								</thead>
                                <thead>
                                    <tr style="background-color:#4682B4; color:white;">
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
									$_slide1 = $db->query("CALL sp_Category_Select_Company('".$searchTemp."','".$getComIDUser."');");
						
									$numrow=$db->dbCountRows($_slide1);
										$i = 1;
									if($numrow>0)
									{
										while($row=$db->fetch($_slide1)){
												$id=$row->CategoryID;
												$CompanyID=$row->CompanyID;
												$CompanyName=$row->CompanyName;
												$Category = $row->CategoryName;
												$OrderNo=$row->OrderNo;
												$Decription = $row->Description;	
											
											echo'<tr class="even">
														<td>'.$i++.'</td>
														<td>'.$CompanyName.'</td>
														<td>'.$Category.'</td>
														<td>'.$OrderNo.'</td>
														<td>'.$Decription.'</td>
														<td class="center" >';
														echo "<a onclick=\"GetField('".$CompanyID."','".$id."','".$CompanyName."','".$Category."','".$OrderNo."','".$Decription."')\">Edit";
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
                    
                    
               
				<script type="text/javascript">
					var CompanyID=document.getElementById("companyId");
					var CategoryID=document.getElementById("categoryId");
					var CompanyName=document.getElementById("cboCompany");
					var CategoryName=document.getElementById("CategotyName");
					var Order=document.getElementById("Order");
					var Discription=document.getElementById("Description" );
					function GetField(getCompanyId,getCategoryId,getCompanyName,getCategory,getOrder,getDiscription){
							$('.bs-example-modal-sm').modal('show');
								CompanyID.value=getCompanyId;
								CategoryID.value=getCategoryId;
								CompanyName.value = getCompanyName;
								CategoryName.value = getCategory;
								Order.value = getOrder;
								Discription.value=getDiscription;
							
					}
				
		
				</script>
                    
            </aside><!-- /.right-side -->
            
            
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
<?php include 'footer.php';?>