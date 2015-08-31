<?php include 'header.php';
$Search=get('srch-normal');
$CompID=get('ID');
$ComName=get('CompanyName');
?>
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
								
									
								$insert=$db->query("CALL sp_Insert_UserAccount(
										'".time()."',
										N'".sql_quote($txtUserName)."',
										N'".sql_quote($encrypted_pass)."',
										'".sql_quote($txtLevel)."',
										N'".sql_quote($txtDescription)."',
										'".sql_quote($txtStatus)."'	,
										'".$CompID."',
										@Insert
										)");
								$Ins=$db->query("select @Insert;");	
									$Result= mysql_fetch_row($Ins);
									$In =implode(" ",$Result);
									if($In==0)
									    echo'<script>alert("UserName has exit already");</script>';
								}
							?>
						
							
						

    <body class="skin-blue">
    
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <div class="row" style="margin:0 auto;>
                   <div class="col-xs-8">
                    <form role="form" method="post" enctype="multipart/form-data">

										
									<table  style="margin: 0 auto;" class="table table-striped table-bordered table-hover" id="dataTables-example">
										<tbody>
											<tr> <h3><em><i class="glyphicon glyphicon-file">AddNew</em></i> </h3></tr>
											<tr>
												<td  class="col-md-2 text-center">
														<div class="dropdown">
														  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-expanded="true">
															Choose Company
															<span class="caret"></span>
														  </button>
														<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3">
															<?php
																	
																$db->disconnect();
																$db->connect();
																$select=$db->query("CALL sp_CompanySelectEdit('')");
																$rowselect=$db->dbCountRows($select);
																if($rowselect>0){
																	
																	while($row=$db->fetch($select)){
																	$CompanyID = $row->CompanyID;
																	$CompanyName = $row->CompanyName;
																				echo'<li role="presentation"><a role="mmenuitem" tabindex="-1" 
																				href="userAccount-new.php?ID='.$CompanyID.'&CompanyName='.$CompanyName.'">'.$CompanyName.'</a></li>';
																			}
																		}
																	echo '<li><a role="mmenuitem" tabindex="-1" href="userAccount-new.php?ID=0">None</a></li>' ;
																	
																	?>
													
															  </ul>	
													   </div>
														</td>
												<td class="col-md-10 text-center"><input  type="text"  class="form-control" <?php echo 'value="'.$ComName.'"'; ?> readonly/></td>
											</tr>
									</tbody>
								</table>
										<br>
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
											<script> var Total=GetComId();</script>
											
											<?php
											
												 if($CompID!=0)
												 echo'<option value=0 >User</option>';
												 if($CompID==0)
												 echo'<option value=1>Admin</option>';
											
											
											 ?>
											
											
											</select>
											
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
                            <a href="userAccount.php">
                            <button type="button" class="btn btn-default" style="float:right" onClick='parent.jQuery.fn.colorbox.close();'>Close</button>
                            </a>
                            <input type="submit" name="btnSave" class="btn btn-primary" value="Save" style="float:right;" onClick='parent.jQuery.fn.colorbox.close();' />
                      </form>
                     </div>
                    </div>
                </section>

                <!-- Main content -->
                
            </aside><!-- /.right-side -->
            
            
            
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
<?php include 'footer.php';?>