<?php include 'header.php';

//================ Get Field From Page Customer =================
	$id=get('id');
	$db->connect();
	$_slide1 = $db->query("CALL sp_Customer_Select_CustomerID('".$id."')");
		//	$numrow=$db->dbCountRows($select);			
		$numrow1=$db->dbCountRows($_slide1);
			if($numrow1>0)
			{
				$row1=$db->fetch($_slide1);
					
					$memberTitle	=	$row1->memberTitle;
					$firstName	=  $row1->firstName;
					$lastName	=	$row1->lastName;
					$nickName	=	$row1->nickName;
					$idType		=	$row1->idType;
					$icpassportNo	=	$row1->icpassportNo;
					$Nationality	=	$row1->Nationality;
					$Gender			=	$row1->Gender;
					$Birthdate		=	$row1->Birthdate;
					$MaritalStatus	=	$row1->MaritalStatus;
					$Address		=	$row1->Address;
					$ZipCode		=	$row1->ZipCode;
					$PostalCode		=	$row1->PostalCode;
					$POBox			=	$row1->POBox;
					$City			=	$row1->City;
					$Country		=	$row1->Country;
					$Tel1			=	$row1->Tel1;
					$Fax			=	$row1->Fax;
					$Mobile			=	$row1->Mobile;
					$eMail			=	$row1->eMail;
					$autono			=	$row1->autono;
									
				//}
			}
	$db->disconnect();
	$UserID = $_SESSION['UserID'];
	
	$db->connect();
	
	$select=$db->query("SELECT 
						CS.CompanyID AS CompanyID,
						CO.CompanyName AS CompanyName
						FROM tbCustomer CS
						INNER JOIN tblcompany CO ON CS.CompanyID=CO.CompanyID
						WHERE CS.CustomerID= '".$id."'");

	$numrow=$db->dbCountRows($select);
	if($numrow>0){
		$row=$db->fetch($select);
		$CompanyID1 = $row->CompanyID;
		$CompanyName1 = $row->CompanyName;
	}
	$db->connect();
	//==================== Insert New Branch =======================
if(isset($_POST['btnSave'])){
		$cboCompany		=	$getComIDUser;
		if($_SESSION['Level']=='1')
		$cboCompany		=   $_POST['cboCompany'];
		$txtmemberTitle	=	post('txtmemberTitle');
		$txtfirstName	=   post('txtfirstName');
		$txtlastName	=	post('txtlastName');
		$txtfullName	=	post('txtfirstName').post('txtlastName');
		$txttnickName	=	post('txttnickName');
		$txtidType		=	post('txtidType');
		$txticpassportNo=	post('txticpassportNo');
		$txtNationality	=	post('txtNationality');
		$txtGender		=	post('Gender');
		$txtBirthdate	=	post('txtBirthdate');
		$txtMaritalStatus	=	post('txtMaritalStatus');
		$txtAddress		=	post('txtAddress');
		$txtZipCode		=	post('txtZipCode');
		$txtPostalCode	=	post('txtPostalCode');
		$txtPOBox		=	post('txtPOBox');
		$txtCity		=	post('txtCity');
		$txtCountry		=	post('txtCountry');
		$txtTel1		=	post('txtTel1');
		$txtFax			=	post('txtFax');
		$txtMobile		=	post('txtMobile');
		$txteMail		=	post('txteMail');
		$txtautono		=	post('txtautono');
			$update=$db->query("Call sp_Customer_Update(
					'".$id."',
					'".$cboCompany."',
					'".$txtmemberTitle."',
					N'".sql_quote($txtfirstName)."',
					N'".sql_quote($txtlastName)."',
					N'".sql_quote($txtfullName)."',
					N'".sql_quote($txttnickName)."',
					'".$txtidType."',
					'".$txticpassportNo."',
					'".$txtNationality."',
					'".$txtGender."',
					'".$txtBirthdate."',
					'".$txtMaritalStatus."',
					'".$txtAddress."',
					'".$txtZipCode."',
					'".$txtPostalCode."',
					'".$txtPOBox."',
					'".$txtCity."',
					'".$txtCountry."',
					'".$txtTel1."',
					'".$txtFax."',
					'".$txtMobile."',
					'".$txteMail."',
					'".$txtautono."'
					)			
		");
			if($update){
				cRedirect('Customer.php');
						
							
					}
		} 

?>
	<head>
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
	
		
	</head>
    <body class="skin-blue" style="margin:0 auto;" >
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <div class="row" style="margin 0 auto;>
                   <div class="col-xs-8">
                    <form role="form" method="post" enctype="multipart/form-data">
							
							<label><h3><i class="glyphicon glyphicon-pencil">Edit</i> </h3></label>
							<?php
							if($_SESSION['Level']=='1'){
							echo '<div class="form-group">';

								echo'<label>Choose Company</label>';
								echo'<select class="form-control" name="cboCompany" autocomplete="on">';
									echo'<optgroup label = "Choose One">';
							?>
										<?php
										// echo'<option value='.$BranchID.'>'.$BranchName.'</option>';
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
												//============= don't display value in option ================
												echo'<option value='.$CompanyID1.' selected="true" style="display:none;" selected>'.$CompanyName1.'</option>';
											}	
											$db->disconnect();
										?>
								<?php
									echo'<optgroup>';
								echo'</select>';
										
							echo'</div>';
							}
							?>
							<div class="form-group"  >
                                <label>Member Title</label>
								<input  name="txtmemberTitle" class="form-control"  value="<?php echo $memberTitle; ?>" placeholder="Enter text" />
                            </div>
							
							<div class="form-group">
                                <label>First Name</label>
								<input  name="txtfirstName" class="form-control" value="<?php echo $firstName; ?>"  placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>Last Name</label>
								<input  name="txtlastName" class="form-control" value="<?php echo $lastName; ?>" placeholder="Enter text"  />
                            </div>
														
							<div class="form-group">
                                <label>Nick Name</label>
								<input  name="txttnickName" class="form-control" value="<?php echo $nickName; ?>" placeholder="Enter text" />
                            </div>
							
							<div class="form-group">
                                <label>ID Type</label>
								<input  name="txtidType" class="form-control" value="<?php echo $idType; ?>" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>ICPassportNo</label>
								<input  name="txticpassportNo" class="form-control" value="<?php echo $icpassportNo; ?>" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>Nationality</label>
								<input  name="txtNationality" class="form-control" value="<?php echo $Nationality; ?>" placeholder="Enter text"  />
                            </div>
							
							<div class="fullcolorbox" class="form-group">
                                <label>Gender</label>
								<select class="form-control" name="Gender">   
								<option value="M">M</option>
								<option value="F">F</option>
								<?php
								echo'<option value='.$Gender.' selected="true" style="display:none;" selected>'.$Gender.'</option>';
								?>
								</select>
								
                            </div>
							
							<div class="form-group">
                                <label>Birth Date</label>
								<input  id="Birthdate" name="txtBirthdate" class="form-control" value="<?php echo $Birthdate; ?>" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>MaritalStatus</label>
								<input  name="txtMaritalStatus" class="form-control" value="<?php echo $MaritalStatus; ?>" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>Address</label>
								<input  name="txtAddress" class="form-control" value="<?php echo $Address; ?>" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>ZipCode</label>
								<input  name="txtZipCode" class="form-control" value="<?php echo $ZipCode; ?>" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>PostalCode</label>
								<input  name="txtPostalCode" class="form-control" value="<?php echo $PostalCode; ?>" placeholder="Enter text"  />
                            </div>
							<div class="form-group">
                                <label>POBox</label>
								<input  name="txtPOBox" class="form-control" value="<?php echo $POBox; ?>" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>City</label>
								<input  name="txtCity" class="form-control" value="<?php echo $City; ?>" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>Country</label>
								<input  name="txtCountry" class="form-control" value="<?php echo $Country; ?>" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>Tel1</label>
								<input  name="txtTel1" class="form-control" value="<?php echo $Tel1; ?>" placeholder="Enter Number" onkeyup="checkInput(this)"  />
                            </div>
							
							<div class="form-group">
                                <label>Fax</label>
								<input  name="txtFax" class="form-control" value="<?php echo $Fax; ?>" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>Mobile</label>
								<input  name="txtMobile" class="form-control" value="<?php echo $Mobile; ?>" placeholder="Enter Number" onkeyup="checkInput(this)"  />
                            </div>
							
							<div class="form-group">
                                <label>E-Mail</label>
								<input  name="txteMail" class="form-control" value="<?php echo $eMail; ?>" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>AutoNo</label>
								<input  name="txtautono" class="form-control" value="<?php echo $autono; ?>" placeholder="Enter text"  />
                            </div>		
										
                            <input type="submit" style="float:right;" name="btnSave" class="btn btn-primary" value="Save" onClick='parent.jQuery.fn.colorbox.close();' />
                            <a href="Customer.php">
                            <button type="button" style="float:right;" class="btn btn-default" data-dismiss="modal" onClick='parent.jQuery.fn.colorbox.close();'>Close</button>
                            </a>
                           
                         
                </section>

                <!-- Main content -->
                
            </aside><!-- /.right-side -->
            
            
            
        </div><!-- ./wrapper -->
        <!-- add new calendar event modal -->
		</body>
	<script src="./js/jquery.js"></script>
    <script src="./js/jquery.datetimepicker.js"></script>
    <script>

        //  ** show date and time picker
        $('#Birthdate').datetimepicker({
            timepicker: false, //visible time = false
            format: 'Y-m-d',
            step: 10
        });
	
    </script>
<?php include 'footer.php';?>