<?php include 'header.php';
$db->disconnect();
$db->connect();

$selectuser=$db->query("call spSelect_UserID('".$_SESSION['UserID']."');");
$numrow=$db->dbCountRows($selectuser);
	if($numrow>0){
		while($row=$db->fetch($selectuser)){
		$UserNameChange = $row->UserName;
		$Password=$row->Password;
		}
	}
?>
<?php	
//==================== Insert New Branch =======================
$db->disconnect();
$db->connect();
if(isset($_POST['btnSave'])){
		$txtUser	=post('txtUser');
		$txtold 	=post('txtold');
		$txtNewPass =post('txtNewPass');
		$encrypt_oldpass = encrypt_decrypt('encrypt', $txtold);
		$encrypt_password = encrypt_decrypt('encrypt', $txtNewPass);
		
		if($Password != $encrypt_oldpass)
		{
			echo "<script type='text/javascript'>alert('Old Passowrd not match!');</script>";
		}
		else if($txtNewPass == "")
		{

			echo "<script type='text/javascript'>alert('Please Insert New Password!');</script>";

		}
		else
		{
			$update=$db->query("call spUpdateUserPwd('".$_SESSION['UserID']."','".$txtUser."','".$encrypt_password."');");
				
				if($update){

					echo "<script type='text/javascript'>alert('Password Change Successful');</script>";
					$GLOBALS['msg'] = "Success full";
					cRedirect('Customer_Rent.php');
				}
				else 
				{
					$GLOBALS['msg'] = "Error for update";
				}
		}	
	}

?>

    <body class="skin-blue">
       
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <div class="row" style="margin:0 auto;>
                   <div class="col-xs-8">
                    <form role="form" method="post" enctype="multipart/form-data">
							
							<strong>Your Name</strong>
							<div class="input-group">
							  <span class="input-group-addon"><span class="fa fa-user fa-fw"></span></span>
							  <input type="text" name="txtUser" value="<?php echo $UserNameChange; ?>" class="form-control" placeholder="Username">
							</div>
							
							<div style="height:10px; width:auto"></div>
							<strong>Your Password </strong>
							<div class="input-group">
							  <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
							  <input type="password" class="form-control" name="txtold" maxlength="25" placeholder="Old Password" >
							  <input type="password" class="form-control"  name="txtNewPass"  maxlength="25" placeholder="New Passowrd" >
							</div>
                          
                            <button type="button" class="btn btn-default" onClick='parent.jQuery.fn.colorbox.close();'>Close</button>
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