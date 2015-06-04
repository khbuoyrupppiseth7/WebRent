<?php 
include 'header.php';
	$msg = "";
	$id=get('id');
	//Select User and insert to form
	$select=$db->query("SELECT UserID,UserName,UserPwd FROM tbluseracc WHERE UserID = '".$id."';");
	//$select=$db->query("Call spUserAccSeleteForUpdate('".$id."')");
	$numrow=$db->dbCountRows($select);
	if($numrow>0){
		$row=$db->fetch($select);
		$UserName = $row->UserName;
		$UserPwd = $row->UserPwd;

	}
	//Update User
	if(isset($_POST['btnSaveUpdate'])){
		$txtUser	=	post('txtUser');
		$txtold = post('txtold');
		$txtNewPass	        =	post('txtNewPass');
		$rdgender	        =	post('rdgender');
		$txtTel	        =	post('txtTel');
		$encrypt_oldpass = encrypt_decrypt('encrypt', $txtold);
		$encrypt_pass = encrypt_decrypt('encrypt', $txtNewPass);
		
		if($UserPwd != $encrypt_oldpass)
		{
			$GLOBALS['msg'] = "Error Confirm Password.";
		}
		else if($txtNewPass == "")
		{
			$update=$db->query("UPDATE tbluseracc SET
									UserName='".$txtUser."',
									UserPwd = '".$UserPwd."'
								WHERE UserID = '".$id."'
								");
				
				if($update){
					
					$GLOBALS['msg'] = "Success full";
				}
				else 
				{
					$GLOBALS['msg'] = "Error for update";
				}
		}
		else
		{
			$update=$db->query("UPDATE tbluseracc SET
									UserName='".$txtUser."',
									UserPwd = '".$encrypt_pass."'
								WHERE UserID = '".$id."'
								");
				
				if($update){
					
					$GLOBALS['msg'] = "Success full";
				}
				else 
				{
					$GLOBALS['msg'] = "Error for update";
				}
		}
		
		
	}
	
?>
      
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Update <font color="#CC0000"><?php echo $msg;?></font></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          
            <div class="row">
                <div class="col-lg-6">
                     <form role="form" method="post">
                        
                        <strong>Your Name</strong>
                        <div class="input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-heart-empty"></span></span>
                          <input type="text" name="txtUser" value="<?php echo $UserName; ?>" class="form-control" placeholder="Username">
                        </div>
                        
                        <div style="height:10px; width:auto"></div>
                        <strong>Your Password </strong>
                        <div class="input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                          <input type="password" class="form-control" name="txtold" maxlength="25" placeholder="Old Password" >
                          <input type="password" class="form-control"  name="txtNewPass"  maxlength="25" placeholder="New Passowrd" >
                        </div>
                        
                        
                        <div class="modal-footer">
                    <input type="submit" name="btnSaveUpdate" class="btn btn-default" value="Save" />
                    
                  </div>
                  </form>
                </div>
                <!-- /.col-lg-6 (nested) -->
              <!-- /.col-lg-6 (nested) -->
        
    
        <!-- /#page-wrapper -->
          
<?php include 'footer.php'; ?>
