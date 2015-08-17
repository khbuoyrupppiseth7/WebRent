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
                        Customer
                       
                    </h1>
                   
                </section>
				 <!-- Main content-->			
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">New Customer</h4>
							<div class="modal-body">
										<?php 
												$db->disconnect();
												$db->connect();
												$cboCompany=$getComIDUser;
											//==================== Insert New Customer ======================
											if(isset($_POST['btnSave'])){
													
													if($_SESSION['Level']=='1')
													$cboCompany	=   $_POST['cboCompany'];
													$txtmemberTitle	=	post('txtmemberTitle');
													$txtfirstName	=   post('txtfirstName');
													$txtlastName	=	post('txtlastName');
													$txtfullName	=	post('txtfirstName').post('txtlastName');
													$txttnickName	=	post('txttnickName');
													$txtidType	=	post('txtidType');
													$txticpassportNo	=	post('txticpassportNo');
													$txtNationality	=	post('txtNationality');
													$txtGender	=	post('txtGender');
													$txtBirthdate	=	post('txtBirthdate');
													$txtMaritalStatus	=	post('txtMaritalStatus');
													$txtAddress	=	post('txtAddress');
													$txtZipCode	=	post('txtZipCode');
													$txtPostalCode	=	post('txtPostalCode');
													$txtPOBox	=	post('txtPOBox');
													$txtCity	=	post('txtCity');
													$txtCountry	=	post('txtCountry');
													$txtTel1	=	post('txtTel1');
													$txtFax  	=	post('txtFax');
													$txtMobile	=	post('txtMobile');
													$txteMail	=	post('txteMail');
													$txtautono	=	post('txtautono');
												
													$insert=$db->query("CALL sp_Customer_Insert(
																					'".time()."',
																					'".$cboCompany."',
																					N'".sql_quote($txtmemberTitle)."',
																					N'".sql_quote($txtfirstName)."',
																					N'".sql_quote($txtlastName)."',
																					N'".sql_quote($txtfullName)."',
																					N'".sql_quote($txttnickName)."',
																					N'".sql_quote($txtidType)."',
																					N'".sql_quote($txticpassportNo)."',
																					N'".sql_quote($txtNationality)."',
																					N'".sql_quote($txtGender)."',
																					'".$txtBirthdate."',
																					N'".sql_quote($txtMaritalStatus)."',
																					N'".sql_quote($txtAddress)."',
																					N'".sql_quote($txtZipCode)."',
																					N'".sql_quote($txtPostalCode)."',
																					N'".sql_quote($txtPOBox)."',
																					N'".sql_quote($txtCity)."',
																					N'".sql_quote($txtCountry)."',
																					N'".sql_quote($txtTel1)."',
																					N'".sql_quote($txtFax)."',
																					N'".sql_quote($txtMobile)."',
																					N'".sql_quote($txteMail)."',														
																					'".$txtautono."'	
																					);
																					");
												
																if($insert){
																		cRedirect('Customer.php');
																		//$error = 'Success';
																		
																}		
													}
											?>
											<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
											<link rel="stylesheet" type="text/css" href="./css/jquery.datetimepicker.css"/>
											
											<script language="javascript">
											function checkInput(ob) {
											  var invalidChars = /[^0-9]/gi
											  if(invalidChars.test(ob.value)) {
														ob.value = ob.value.replace(invalidChars,"");
												  }
											}
											</script>
										<form role="form" method="post" enctype="multipart/form-data">
											<?php 
											if($_SESSION['Level']=='1'){
											echo'<div class="form-group">';
												
											echo '<label>Choose Company</label>';
											echo'<select class="form-control" name="cboCompany">'; 
												
												 $db->disconnect();
												 $db->connect();
												  $select=$db->query("CALL sp_Company_Select('')");
													$rowselect=$db->dbCountRows($select);
													if($rowselect>0){
														
														while($row=$db->fetch($select)){
														$CompanyID = $row->CompanyID;
														$CompanyName = $row->CompanyName;
															echo'<option value='.$CompanyID.'>'.$CompanyName.'</option>';
														}
													}
												
											echo'</select>';
											
											echo '</div>';}
											?>
											<form role="form" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<label>Member Title</label>
												<input name="txtmemberTitle" class="form-control" placeholder="Enter text" />
											</div>
											
											<div class="form-group">
												<label>First Name</label>
												<input name="txtfirstName" class="form-control" placeholder="Enter text"  />
											</div>
											
											<div class="form-group">
												<label>Last Name</label>
												<input name="txtlastName" class="form-control" placeholder="Enter text"  />
											</div>
																		
											<div class="form-group">
												<label>Nick Name</label>
												<input name="txttnickName" class="form-control" placeholder="Enter text" />
											</div>
											
											<div class="form-group">
												<label>ID Type</label>
												<input name="txtidType" class="form-control" placeholder="Enter text"  />
											</div>
											
											<div class="form-group">
												<label>ICPassportNo</label>
												<input name="txticpassportNo" class="form-control" placeholder="Enter text"  />
											</div>
											
											<div class="form-group">
												<label>Nationality</label>
												<input name="txtNationality" class="form-control" placeholder="Enter text"  />
											</div>
											
											<div class="form-group">
												<label>Gender</label>
												<select class="form-control" name="txtGender">   
												<option value="M">M</option>
												<option value="F">F</option>
												</select>
												
											</div>
											
											<div class="form-group">
												<label>Birth Date</label>
												<input type="text" id="Birthdate" name="txtBirthdate" class="form-control" <?php $datenow=date("Y-m-d"); echo 'value="'.$datenow.'"'; ?>/>
											</div>
											
											<div class="form-group">
												<label>MaritalStatus</label>
												<input name="txtMaritalStatus" class="form-control" placeholder="Enter text"  />
											</div>
											
											<div class="form-group">
												<label>Address</label>
												<input name="txtAddress" class="form-control" placeholder="Enter text"  />
											</div>
											
											<div class="form-group">
												<label>ZipCode</label>
												<input name="txtZipCode" class="form-control" placeholder="Enter text"  />
											</div>
											
											<div class="form-group">
												<label>PostalCode</label>
												<input name="txtPostalCode" class="form-control" placeholder="Enter text"  />
											</div>
											<div class="form-group">
												<label>POBox</label>
												<input name="txtPOBox" class="form-control" placeholder="Enter text"  />
											</div>
											
											<div class="form-group">
												<label>City</label>
												<input name="txtCity" class="form-control" placeholder="Enter text"  />
											</div>
											
											<div class="form-group">
												<label>Country</label>
												<input name="txtCountry" class="form-control" placeholder="Enter text"  />
											</div>
											
											<div class="form-group">
												<label>Tel1</label>
												<input name="txtTel1" class="form-control" placeholder="Enter Number" onkeyup="checkInput(this)" />
											</div>
											
											<div class="form-group">
												<label>Fax</label>
												<input name="txtFax" class="form-control" placeholder="Enter text"  />
											</div>
											
											<div class="form-group">
												<label>Mobile</label>
												<input name="txtMobile" class="form-control" placeholder="Enter Number" onkeyup="checkInput(this)"  />
											</div>
											
											<div class="form-group">
												<label>E-Mail</label>
												<input name="txteMail" class="form-control" placeholder="Enter text"  />
											</div>
											
											<div class="form-group">
												<label>AutoNo</label>
												<input name="txtautono" class="form-control" placeholder="Enter text"  />
											</div>		
																						
									
							</div>
							<div class="modal-footer">
							<a href="Customer.php">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </a>
                            <input type="submit" name="btnSave" class="btn btn-primary" value="Save" />
							</div>
						  </div>
						</div>
					  </div>
					  </form>
					</div><!-- /.row -->
					   
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
													<div class="col-md-6 pull-left">
													<button style="margin-left:-20px;"type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-file-o"></i>New</button>
													</div>
													
													<div class="col-md-4 pull-right"> 
														<form class="navbar-form" role="search">
															<div class="pull-right" style="margin-top:-8px;">
															<div class="input-group">
															<div class="input-group-btn">
															</div><!-- /btn-group -->
																<input type="text" class="form-control" placeholder="Search" name="srch-normal" id="search.php?dnsname=name&srch-term">
															<div class="input-group-btn">
																<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
															</div><!-- /btn-group -->
															</div>
															</div>
														</form>
													</div>
													
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
									$db->disconnect();
									$db->connect();
									
									$_slide1 = $db->query("call sp_Customer_Select_Company('".$searchTemp."','".$getComIDUser."')");
						
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
														<a class="iframelong"  href="Customer-Update.php?id='.$id.'&fullName='.$fullName.'&Nationality='.$Nationality.'
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
										echo'<tr><td  colspan="12"><font color =Red>No Record Found.</font></td></tr>';
								
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