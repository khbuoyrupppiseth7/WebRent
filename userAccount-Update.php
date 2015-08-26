<?php include 'header.php';

//================ Get Field From Page User =================
	$id=get('id');
	$UserName=get('UserName');
	$Level=get('Level');
	$Status=get('Status');
	$Decription=get('Decription');
	$ComID=get('CompanyID');
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
		
		$update=$db->query("CALL sp_UserAccount_Update(
						   '".$id."',
							N'".sql_quote($txtCompanyID)."',
							N'".sql_quote($txtUserName)."',
							'".sql_quote($txtLevel)."',
							N'".sql_quote($txtDescription)."',
							'".sql_quote($txtStatus)."',
							@Insert
							)");
		$Ins=$db->query(" select @Insert;");	
			$Result= mysql_fetch_row($Ins);
			$In =implode(" ",$Result);
			if($In==1)
				cRedirect('Category.php');
			else if($In==0)
				echo'<script>alert("UserName has exited already");</script>';
										
	}
?>
<?php
	$db->disconnect();
	$db->connect();
	$select=$db->query("SELECT 
						U.CompanyID AS CompanyID,
						CO.CompanyName AS CompanyName
						FROM tblusers as U
						LEFT JOIN tblcompany as CO ON U.CompanyID=CO.CompanyID
						WHERE U.CompanyID= '".$ComID."'");

	$numrow=$db->dbCountRows($select);
	if($numrow>0){
		$row=$db->fetch($select);
		$CompanyID1 = $row->CompanyID;
		$CompanyName1 = $row->CompanyName;
	}


?>

    <body class="skin-blue">
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <div class="row" style="margin: 0 auto;>
                   <div class="col-xs-8">
                    <form role="form" method="post" enctype="multipart/form-data">
                          
										<label><h3>Edit User</h3></label>
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
														echo '<option value=0>None</option>';
														echo'<option value='.$CompanyID1.'  selected />'.$CompanyName1.'</option>';
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
											<?php  echo $Decription ?>
											</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input name="txtStatus" required class="form-control" value="<?php echo $Status; ?>"  placeholder="Enter text" />
                                        </div>
                                   
                            <div class="modal-footer">
                            <a href="userAccount.php">
                            <button type="button" class="btn btn-default" data-dismiss="modal" onClick='parent.jQuery.fn.colorbox.close();'>Close</button>
                            </a>
                            <input type="submit" name="btnSave" class="btn btn-primary" value="Save" onClick='parent.jQuery.fn.colorbox.close();'/>
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