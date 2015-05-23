<?php 
include 'header.php';
$error = "";
	$id=get('id');
	//Select User and insert to form
	$select=$db->query("SELECT UserID,UserName,UserPwd FROM tbluseracc WHERE UserID = '".$id."'");
	//$select=$db->query("Call spUserAccSeleteForUpdate('".$id."')");
	$numrow=$db->dbCountRows($select);
	if($numrow>0){
		$row=$db->fetch($select);
		$UserName = $row->UserName;
		$UserPwd = $row->UserPwd;

	}
	//Update User
	if(isset($_POST['btnSaveUpdate'])){
		$txtUserAcc	=	post('txtUserAcc');
		$txtPwd	        =	post('txtPwd');
		
		$password = encrypt_decrypt('encrypt', $txtPwd);
		
		$update=$db->query("UPDATE tbluseracc SET UserName = '".$txtUserAcc."', UserPwd = N'".sql_quote($password)."' WHERE UserID = '".$id."'");
			
			if($update){
				$error = "Success full";
			}
			else 
			{
				$error = "Error for update";
			}
		
		
		
	}
	
?>
      
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
               
                        <div class="panel-heading">
                            <?php echo $error; ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                     <form role="form" method="post">
                                        <div class="form-group">
                                        
                                        <label>Update User Account</label>
                                            <input name="txtUserAcc" class="form-control" value="<?php echo $UserName; ?>" placeholder="Enter text" />
                                        </div>
                                      
                                        <div class="form-group">
                                            <label>Password New</label>
                                            <input type="password" required name="txtPwd" value="<?php echo $UserPwd;?>" class="form-control" placeholder="Enter text" />
                                        </div>
                                       
                                    
                                        <div class="modal-footer">
                                    <input type="submit" name="btnSaveUpdate" class="btn btn-default" value="Save" />
                                    
                                  </div>
                                  </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                              <!-- /.col-lg-6 (nested) -->
                          </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                  
            
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    
        <!-- /#page-wrapper -->
          
<?php include 'footer.php'; ?>
