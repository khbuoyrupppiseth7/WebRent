<?php include 'header.php';
$db->disconnect();
$db->connect();
//==================== Insert New Customer ======================
if(isset($_POST['btnSave'])){
		$cboCompany	=   $_POST['cboCompany'];
		$txtmemberTitle	=	post('txtmemberTitle');
		$txtfirstName	=   post('txtfirstName');
		$txtlastName	=	post('txtlastName');
		$txtfullName	=	post('txtfirstName').post('txtlastName');
		$txttnickName	=	post('txttnickName');
		$txtidType	=	post('txtidType');
		$txticpassportNo	=	post('txticpassportNo');
		$txtNationality	=	post('txtNationality');
		$txtGender	=	post('txtGender');
		$txtBirthdate	=	post('txtBirthdate');
		$txtMaritalStatus	=	post('txtMaritalStatus');
		$txtAddress	=	post('txtAddress');
		$txtZipCode	=	post('txtZipCode');
		$txtPostalCode	=	post('txtPostalCode');
		$txtPOBox	=	post('txtPOBox');
		$txtCity	=	post('txtCity');
		$txtCountry	=	post('txtCountry');
		$txtTel1	=	post('txtTel1');
		$txtFax	=	post('txtFax');
		$txtMobile	=	post('txtMobile');
		$txteMail	=	post('txteMail');
		$txtautono	=	post('txtautono');
	
		$insert=$db->query("CALL sp_Customer_Insert(
										'".time()."',
										'".$cboCompany."',
										N'".sql_quote($txtmemberTitle)."',
										N'".sql_quote($txtfirstName)."',
										N'".sql_quote($txtlastName)."',
										N'".sql_quote($txtfullName)."',
										N'".sql_quote($txttnickName)."',
										N'".sql_quote($txtidType)."',
										N'".sql_quote($txticpassportNo)."',
										N'".sql_quote($txtNationality)."',
										N'".sql_quote($txtGender)."',
										'".$txtBirthdate."',
										N'".sql_quote($txtMaritalStatus)."',
										N'".sql_quote($txtAddress)."',
										N'".sql_quote($txtZipCode)."',
										N'".sql_quote($txtPostalCode)."',
										N'".sql_quote($txtPOBox)."',
										N'".sql_quote($txtCity)."',
										N'".sql_quote($txtCountry)."',
										N'".sql_quote($txtTel1)."',
										N'".sql_quote($txtFax)."',
										N'".sql_quote($txtMobile)."',
										N'".sql_quote($txteMail)."',														
										'".$txtautono."'	
										);
										");
	
					if($insert){
							cRedirect('Customer.php');
							//$error = 'Success';
							
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
									<label>Choose Company</label>
									<select class="form-control" name="cboCompany">   
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
							</div>
							
							<div class="form-group">
                                <label>Member Title</label>
								<input name="txtmemberTitle" class="form-control" placeholder="Enter text" />
                            </div>
							
							<div class="form-group">
                                <label>First Name</label>
								<input name="txtfirstName" class="form-control" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>Last Name</label>
								<input name="txtlastName" class="form-control" placeholder="Enter text"  />
                            </div>
														
							<div class="form-group">
                                <label>Nick Name</label>
								<input name="txttnickName" class="form-control" placeholder="Enter text" />
                            </div>
							
							<div class="form-group">
                                <label>ID Type</label>
								<input name="txtidType" class="form-control" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>ICPassportNo</label>
								<input name="txticpassportNo" class="form-control" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>Nationality</label>
								<input name="txtNationality" class="form-control" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>Gender</label>
								<select class="form-control" name="txtGender">   
								<option value="M">M</option>
								<option value="F">F</option>
								</select>
								
                            </div>
							
							<div class="form-group">
                                <label>Birth Date</label>
								<input type="text" id="Birthdate" name="txtBirthdate" class="form-control" <?php $datenow=date("Y-m-d"); echo 'value="'.$datenow.'"'; ?>/>
                            </div>
							
							<div class="form-group">
                                <label>MaritalStatus</label>
								<input name="txtMaritalStatus" class="form-control" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>Address</label>
								<input name="txtAddress" class="form-control" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>ZipCode</label>
								<input name="txtZipCode" class="form-control" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>PostalCode</label>
								<input name="txtPostalCode" class="form-control" placeholder="Enter text"  />
                            </div>
							<div class="form-group">
                                <label>POBox</label>
								<input name="txtPOBox" class="form-control" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>City</label>
								<input name="txtCity" class="form-control" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>Country</label>
								<input name="txtCountry" class="form-control" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>Tel1</label>
								<input name="txtTel1" class="form-control" placeholder="Enter Number" onkeyup="checkInput(this)" />
                            </div>
							
							<div class="form-group">
                                <label>Fax</label>
								<input name="txtFax" class="form-control" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>Mobile</label>
								<input name="txtMobile" class="form-control" placeholder="Enter Number" onkeyup="checkInput(this)"  />
                            </div>
							
							<div class="form-group">
                                <label>E-Mail</label>
								<input name="txteMail" class="form-control" placeholder="Enter text"  />
                            </div>
							
							<div class="form-group">
                                <label>AutoNo</label>
								<input name="txtautono" class="form-control" placeholder="Enter text"  />
                            </div>		
										
                            <div class="modal-footer">
                            <a href="RentItem.php">
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