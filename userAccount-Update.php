<?php include 'header.php';

//================ Get Field From Page User =================
	$id=get('id');
	$UserName=get('UserName');
	$Level=get('Level');
	$Status=get('Status');
	$Decription=get('Decription');
	$db->disconnect();
	$db->connect();
	/*$select=$db->query(" call spInnerjoin_User_Branch('".$id."');");

	$numrow=$db->dbCountRows($select);
	if($numrow>0){
		$row=$db->fetch($select);
		$BranchID1 = $row->BranchID;
		$BranchName1 = $row->BranchName;
		$UserName = $row->UserName;
		$Level = $row->Level;
		$UserDesc =  $row->Decription;
		$UserStatusUpdate = $row->Status;
	}*/
//==================== Insert New User =======================
if(isset($_POST['btnSave'])){
		//$cboBranch		=   $_POST['cboBranch'];
		$txtCompanyID   =	post('cboCompanyID');
		$txtUserName	=	post('txtUserName');
		$txtLevel		=	post('txtLevel');
		$txtDescription	=	post('txtDescription');
		$txtStatus	    =	post('txtStatus');	
		
		$update=$db->query("CALL sp_UserAccount_Update('".$id."',
							N'".sql_quote($txtCompanyID)."',
							N'".sql_quote($txtUserName)."',
							'".sql_quote($txtLevel)."',
							N'".sql_quote($txtDescription)."',
							'".sql_quote($txtStatus)."'
							)");
			
		if($update){
				cRedirect('userAccount.php');
		}
	}
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
                <div class="row">
                   <div class="col-xs-8">
                    <form role="form" method="post" enctype="multipart/form-data">
                          
									<!--<div class="form-group">
										<label>Choose Branch</label>
										<select class="form-control" name="cboBranch" autocomplete="on">
										   <optgroup label = "Choose One">
										<?php
										// echo'<option value='.$BranchID.'>'.$BranchName.'</option>';
										
										  $select=$db->query("CALL sp_Branch_Select('')");
											$rowselect=$db->dbCountRows($select);
											
											if($rowselect>0){
												while($row=$db->fetch($select)){
												
												$BranchID = $row->BranchID;
												$BranchName = $row->BranchName;
													echo'<option value='.$BranchID.'>'.$BranchName.'</option>';
												}
												//============= don't display value in option ================
												echo'<option selected="true" style="display:none;" selected>'.$BranchName1.'</option>';
											}										
										?>
										</optgroup>
										</select>
										
										</div>
										-->
										<div class="form-group">
											<label>Choose Company</label>
											<select class="form-control" name="cboCompanyID">   
												<?php
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
													
												?>
											</select>
										<div class="form-group">
                                            <label>User Name</label>
                                            <input name="txtUserName" class="form-control" value="<?php echo $UserName; ?>" placeholder="User Name" />
										</div>
                                      
                                        <div class="form-group">
                                            <label>Level</label>
                                            <input name="txtLevel" required class="form-control" value="<?php echo 	$Level; ?>" placeholder="Enter text" />
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="txtDescription"  rows="3">
											<?php  echo $Decription; ?>
											</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input name="txtStatus" required class="form-control" value="<?php echo $Status; ?>"  placeholder="Enter text" />
                                        </div>
                                   
                            <div class="modal-footer">
                            <a href="userAccount.php">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </a>
                            <input type="submit" name="btnSave" class="btn btn-primary" value="Save" />
                          </div>
                      </form>
                     </div>
                    </div>
                </section>

                <!-- Main content -->
                
            </aside><!-- /.right-side -->
            
            
            
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
<?php include 'footer.php';?>