<?php include 'header.php';
$Search=get('srch-normal');
$CompID=get('ID');

														$ComName=get('CompanyName');
	
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
                     User
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
					<!--ADD New-->
					
					<?php 
						
						//==================== Insert New User =======================
						$db->disconnect();
						$db->connect();
						
						
						if(isset($_POST['btnSave'])){
								//$cboBranch		=   $_POST['cboBranch'];
								$txtUserName	=	post('txtUserName');
								$txtPassword    =	post('txtPassword');
								$txtLevel		=	post('txtLevel');
								$txtDescription	=	post('txtDescription');
								$txtStatus	    =	post('cboStatus');		
								$encrypted_pass = 	encrypt_decrypt('encrypt', $txtPassword);
								$CompanyID		=   post('cboCompanyID');
									
								$insert=$db->query("CALL sp_Insert_UserAccount(
										'".time()."',
										N'".sql_quote($txtUserName)."',
										N'".sql_quote($encrypted_pass)."',
										'".sql_quote($txtLevel)."',
										N'".sql_quote($txtDescription)."',
										'".sql_quote($txtStatus)."'	,
										'".$CompanyID."',
										@Insert
										)");
								$Ins=$db->query(" select @Insert;");	
									$Result= mysql_fetch_row($Ins);
									$In =implode(" ",$Result);
									if($In==0)
									    echo'<script>alert("UserName has exit already");</script>';
								}
							?>
						
							
						
								
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">New User</h4>
							<div class="modal-body">
								 <form role="form" method="post" enctype="multipart/form-data">
											<table>
											<td>
											<tr>
											<div class="dropdown">
											  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-expanded="true">
												Choose Category
												<span class="caret"></span>
											  </button>
											<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3">
												<?php
														
													$db->disconnect();
													$db->connect();
												    $select=$db->query("CALL sp_CompanySelectEdit('".$CompanyID."')");
													$rowselect=$db->dbCountRows($select);
													if($rowselect>0){
														
														while($row=$db->fetch($select)){
														$CompanyID = $row->CompanyID;
														$CompanyName = $row->CompanyName;
																	echo'<li role="presentation"><a role="mmenuitem" tabindex="-1" 
																	href="#?ID='.$CompanyID.'&CompanyName='.$CompanyName.'">'.$CompanyName.'</a></li>';
																}
															}
														
														
														?>
										
											  </ul>	
									   </div>
									   </tr>
										<tr>
									    <input type="text" class="form-control" <?php echo 'value="'.$ComName.'"'; ?> readonly></td>
										</tr>	 
									    </td>
										</table>
												
										<div class="form-group">
                                            <label>User Name</label>
                                            <input type="text"  class="form-control" name="txtUserName" placeholder="UserName" required/>
											
										</div>
										<div class="form-group">
                                            <label>Password</label>
                                            <input  name="txtPassword" type="password" class="form-control" placeholder="Password" required/>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Level</label>
											<select name="txtLevel" class="form-control">
											
											
											<?php
											
												 if($CompID!=0)
												 echo'<option value=0 >User</option>';
												 if($CompID==0)
												 echo'<option value=1>Admin</option>';
											
											
											 ?>
											
											
											</select>
											<input type="text" id="txtId"  class="form-control" name="ComID"/>
										</div>
										
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="txtDescription" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="cboStatus" class="form-control">
												<option value=1>Active</option>
												<option value=0>Suspend</option>
											</select>
                                        </div>
							</div>
							<div class="modal-footer">
							 <a href="userAccount.php">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </a>
                            <input type="submit" name="btnSave" class="btn btn-primary" value="Save" />
							</div>
						  </div>
						</div>
						</div>
						</form>
						</div>
				<!--Edit User-->
				<div class="modal fade bs-example-modal-sm" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Edit Category</h4>
					<div class="modal-body">
					
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
                <!-- Main content -->
                
                 
					<div class="panel-body">
					<div class="dataTable_wrapper">
                    <div class="row">
						<div class="col-xs-12 table-responsive">
						  <table class="table table-bordered">
                            <thead>
                            <tr>
                              <th colspan="12">
								 <div class="col-md-8" style="margin-left:-20px;">
									
									<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file-o"></i> New</button>
									
								 </div>
								<div class="col-md-4"> 
											<form class="navbar-form" role="search">
												<div class="pull-right" style="margin-top:-8px;">
												<div class="input-group">
												<div class="input-group-btn">
											    </div><!-- /btn-group -->
													<input type="text" class="form-control" placeholder="Search" name="srch-normal" id="search.php?dnsname=name&srch-term">
														<div class="input-group-btn">
															 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
														</div><!-- /btn-group -->
												</div><!-- /input-group -->
												</div><!-- /.col-lg-4 -->
											</form>

										</div>
                                   </th>
                                 </tr> 
                            </thead>
							<thead>
										<tr style="background-color:#4682B4; color:white;">
											<th>No</th>
											<th>Company</th>
											<th>User Name</th>
											<th>Password</th>
											<th>Level</th>
											<th>Status</th>
											<th>Description</th>
											<th>Action </th>
										</tr>
									   
									</thead>
									<tbody>
										
										
										<?php
										$db->disconnect();
										$db->connect();
									//	$txtsrch = get('srch-normal');
										$_slide1 = $db->query("CALL sp_UserAccount_Select('".$Search."')");
									
										$numrow=$db->dbCountRows($_slide1);
										
											$i = 1;
										if($numrow>0)
										{ 
											
											
											while($row=$db->fetch($_slide1)){
													$id=$row->UserID;
													$Status=$row->Status;
													$Type = $row->Level;
													$Decription=$row->Decription;
													$CompanyID=$row->CompanyID;
													$CompanyName=$row->CompanyName;
													$PassWord=$row->Password;
													$descript_password = encrypt_decrypt('decrypt', $PassWord);
													if($Type == 1)
														$Level = "Admin";
													else if($Type == 0)
														$Level = "User";
													else 
														$Level = "Unknown";
													$status=$row->Status;
													if($status==1)
														$status="Active";
													else if ($status==0)
														$status="Suspend";
													else
														$status="Unknown";
													
													$userName= $row->UserName;
													
													echo '<tr class="gradeA">
															<td>'.$i++.'</td>
															<td>'.$CompanyName.'</td>
															<td>'.$userName.'</td>
															<td>'.$descript_password .'</td>
															<td>'.$Level.'</td>
															<td><span class="ticket ticket-success">'.$status.'</span></td>
															<td>'.$Decription.'</td>
												
															<td>
															
																
																<a  class="iframe" href="userAccount-Update.php?id='.$id.'&UserName='.$userName.'
																	&Level='.$Type.'&Status='.$Status.'&Decription='.$Decription.'&CompanyID='.$CompanyID.'">
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

                    
            </aside><!-- /.right-side -->
            
            
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
<?php include 'footer.php';?>