<?php include 'header.php';
$searchTemp=get('srch-normal');
$getCompanyTemp=get('CompanyName');
$CategoryNameTemp=get('CategoryName');
$CategoryIDTemp=get('CatID');
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
				
							
				<!--modal Add New-->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">New Rent</h4>
							<div class="modal-body">
									<?php 
											$db->disconnect();
											$db->connect();
										//==================== Insert New Category ======================
										if(isset($_POST['btnSave'])){
												$cboCompany		=   post('cboCompany');
												$cboCategory	=   post('cboCetegory');
												$txtItem		=	post('txtItem');
												$txtPrice		=   post('txtPrice');
												$txtStatus		= 	post('Status');
												$txtDescrpiton	=	post('txtDescrpiton');
												
												$insert=$db->query("CALL sp_RentItem_Insert (
																				'".time()."',
																				'".$cboCompany."',
																				N'".sql_quote($txtItem)."',
																				'".$cboCategory."',
																				".$txtPrice.",	
																				".$txtStatus.",
																				N'".sql_quote($txtDescrpiton)."'
																				);
																				");
											
															if($insert){
																		cRedirect('RentItem.php');
																
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

								function isNumberKey(evt)
									   {
										  var charCode = (evt.which) ? evt.which : evt.keyCode;
										  if (charCode != 46 && charCode > 31 
											&& (charCode < 48 || charCode > 57))
											 return false;

										  return true;
									   }
								$('.myLi').click(function getCompanyName(){
								
								document.getElementById('txtcompanyName').value=$(this).value;
							});
		
								</script>
								
								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<tbody>		
									  <tr>		
										<td  class="col-md-2 text-center">
										 <form role="form" method="post" enctype="multipart/form-data">
										
										  <select onchange="GetValueCompany()" id="CompanyName" name="cboCompany" style="height:35px; width:150px; background-color:	#F8F8FF	;">
											<option >Choose Company</option>
											<?php
											$db->disconnect();
											$db->connect();
											  $select=$db->query("SELECT CompanyID,CompanyName from tblcompany; ");
												$rowselect=$db->dbCountRows($select);
												if($rowselect>0){
													while($row=$db->fetch($select)){
													$CompanyID = $row->CompanyID;
													$CompanyName = $row->CompanyName;
														echo'<option   value='.$CompanyID.'>'.$CompanyName.'</a></option>';
													}
												}
										
											
											?>	
										  </select>
											
										  </td>
										<td class="col-md-10 text-center"> <input type="text" id="txtcompanyName" class="form-control" readonly></td>
									  </tr>							  
									 <tr>
										<td  class="col-md-2 text-center">
											  <select onchange="GetValueCategory()" name="cboCetegory" id="Category" style="height:35px; width:150px; background-color:	#F8F8FF	;">
													<option>Choose Category</option>
													<?php
														
														$db->disconnect();
														$db->connect();
														$CompanyIDTemp="<script language=javascript>document.write('GetCompanyID()')</script>";
														//echo '<script>alert($CompanyIDTemp);</script>';
														  $select=$db->query("SELECT CategoryID,CategoryName FROM tblcategory WHERE CompanyID='".$CompanyIDTemp."'; ");
															$rowselect=$db->dbCountRows($select);
															if($rowselect>0){
																
																while($row=$db->fetch($select)){
																$CategoryID = $row->CategoryID;
																$CategoryName = $row->CategoryName;
																	echo'<option value='.$CategoryName.'>'.$CategoryName.'</a></option>';
																}
															}
														
														
													?>
											  </select>
											</div>
										</td>
										<td class="col-md-10 text-center"> <input type="text" name="Category" id="txtCategory" class="form-control" readonly></td>
									 </tr>
									</tbody>
								</table>	
									
									<div class="form-group">
										<label>Rent Item</label>
									
										<input name="txtItem" class="form-control" placeholder="Enter text"  required />
									</div>
										
									<div class="form-group">
										<label>Price</label>
									
										<input name="txtPrice" class="form-control" placeholder="Enter Number" onkeypress="return isNumberKey(event)"  required />
									</div>
									
									<div class="form-group">
										<label>Status</label><br/>
									<!--	<input name="txtisLeave" class="form-control" placeholder="Enter text" required /> -->
										<input type="radio" name="Status" value="1" checked class="form-control">Free
										<input type="radio" name="Status" value="0"  class="form-control">Busy
										
									</div>
							</div>
							<div class="modal-footer">
								<a href="RentItem.php">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</a>
								<input type="submit" name="btnSave" class="btn btn-primary" value="Save" />
							  </div>
							</div>
						  </div>
						</div>
						</form>
                     </div><!-- /.row -->
                   

                <!-- Main content -->
				
                    <!-- Table row -->
                
                  <section class="content invoice">
                    <!-- title row -->
                    <div class="panel-body">
                   <div class="dataTable_wrapper">
						
						<div class="row">
					
                        <div class="col-xs-12 table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
									<th colspan="12">
										<div class="col-md-6">
										<button style="margin-left:-20px;"type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-file-o"></i>New ItemRent</button>
										</div>
										
										<div class="col-md-4"> 
										 <form class="navbar-form" role="search">
										  <div class=" pull-right" style="margin-top:-8px;">
											<div class="input-group">
											  
											  <input type="text" class="form-control" placeholder="Search" name="srch-normal" id="search.php?dnsname=name&srch-term" <?php echo 'value="'.$searchTemp.'"'?>>
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
									$db->disconnect();
									$db->connect();
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
										echo'<tr><td  colspan="12"><font color =Red>No Record Found.</font></td></tr>';
								
                                ?>
                                   
                                </tbody>
                            </table>
							
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                      
                  </div>
                  <script type="text/javascript">
				  	function GetValueCompany(){
						var id=document.getElementById("CompanyName").value;
				
						document.getElementById('txtcompanyName').value=id;
						}
					function GetValueCategory(){
						var CategoryName=document.getElementById("Category").value;
						document.getElementById('txtCategory').value=CategoryName;
						
					}
					function GetCompanyID(){
						var id=document.getElementById("CompanyName").value;
						return id;
					}
					
				  </script>
                    
                </section>
                    
            </aside><!-- /.right-side -->
            
            
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
<?php include 'footer.php';?>