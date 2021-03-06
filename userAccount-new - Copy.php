<?php include 'header.php';

//==================== Insert New User =======================
$db->disconnect();
$db->connect();
if(isset($_POST['btnSave'])){
		//$cboBranch		=   $_POST['cboBranch'];
		$txtUserName	=	post('txtUserName');
		$txtPassword    =	post('txtPassword');
		$txtLevel		=	post('txtLevel');
		$txtDescription	=	post('txtDescription');
		$txtStatus	    =	post('txtStatus');		
		$encrypted_pass = 	encrypt_decrypt('encrypt', $txtPassword);
			
		$insert=$db->query("CALL sp_Insert_UserAccount(
				'".time()."',
				N'".sql_quote($txtUserName)."',
				N'".sql_quote($encrypted_pass)."',
				'".sql_quote($txtLevel)."',
				N'".sql_quote($txtDescription)."',
				'".sql_quote($txtStatus)."'			
				)");
			
			if($insert){
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
                          
								
										<div class="form-group">
                                            <label>User Name</label>
                                            <input name="txtUserName" class="form-control" placeholder="User Name" />
										</div>
										<div class="form-group">
                                            <label>Password</label>
                                            <input required name="txtPassword" type="password" class="form-control" placeholder="Password" />
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                            <input name="txtLevel" required class="form-control" placeholder="Enter text" />
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="txtDescription" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input name="txtStatus" required class="form-control" placeholder="Enter text" />
                                        </div>
                            <a href="userAccount.php">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </a>
                            <input type="submit" name="btnSave" class="btn btn-primary" value="Save" />
                      </form>
                     </div>
                    </div>
                </section>

                <!-- Main content -->
                
            </aside><!-- /.right-side -->
            
            
            
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
<?php include 'footer.php';?>