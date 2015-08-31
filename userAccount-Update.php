<?php include 'header.php';

$ComName=get('CompanyName');
//================ Get Field From Page User =================
	$id=get('id');
	$UserName=get('UserName');
	$Level=get('Level');
	$Status=get('Status');
	$Decription=get('Decription');
	$CompamyIDTemp=get('CompanyID');
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
		$CompamyID      =get('CompanyID');
		$txtUserName	=	post('txtUserName');
		$txtLevel		=	post('txtLevel');
		$txtDescription	=	post('txtDescription');
		$txtStatus	    =	post('txtStatus');	
		
		$update=$db->query("CALL sp_UserAccount_Update(
						   '".$id."',
							N'".$CompamyID."',
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
    <body class="skin-blue">
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <div class="row" style="margin: 0 auto;>
                   <div class="col-xs-8">
                    <form role="form" method="post" enctype="multipart/form-data">
                        	<table  style="margin: 0 auto;" class="table table-striped table-bordered table-hover" id="dataTables-example">
										<tbody>
											<tr> <h3><em><i class="glyphicon glyphicon-pencil">Edit</i></em> </h3></tr>
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
																				href="userAccount-Update.php?id='.$id.'&Level='.$Level.'&Status='.$Status.'&Decription='.$Decription.'&CompanyID='.$CompanyID.'&UserName='.$UserName.'&CompanyName='.$CompanyName.'">'.$CompanyName.'</a></li>';
																			}
																		}
																	echo '<li><a role="mmenuitem" tabindex="-1" href="userAccount-Update.php?id='.$id.'&Level='.$Level.'&Status='.$Status.'&Decription='.$Decription.'&CompanyID=0&UserName='.$UserName.'">None</a></li>' ;
																	
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
                                            <input name="txtUserName" class="form-control" value="<?php echo $UserName; ?>" placeholder="User Name" />
										</div>
										<div  class="form-group">
											 <label>Level</label>
											<select class="form-control" name="txtLevel">   
												<?php
												if($Level==1)
													$LevelName='Admin';
												elseif($Level==0)
													$LevelName='User';
												if($CompamyIDTemp==0)
													echo'<option value=1>Admin</option>';
												if($CompamyIDTemp!=0)
													echo'<option value=0>User</option>';
												//echo'<option value='.$Level.' selected="true" style="display:none;"  selected>'.$LevelName.'</option>';
												?>
											</select>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="txtDescription"  rows="3">
											<?php  echo $Decription ?>
											</textarea>
                                        </div>
										<div  class="form-group">
											 <label>Status</label>
											<select class="form-control" name="txtStatus">   
												<option value=1>Active</option>
												<option value=0>Suspend</option>
												<?php
												if($Status==1)
												$StatusName='Active';
												elseif($Status==0)
												$StatusName='Suspend';
												echo'<option value='.$Status.' selected="true" style="display:none;"  selected>'.$StatusName.'</option>';
												?>
											</select>
											
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