<?php include 'header.php';
$CompanyIDTemp=get('CompanyID');
$getCompanyTemp=get('CompanyName');
$CategoryNameTemp=get('CategoryName');
$CategoryIDTemp=get('CategoryID');
//================ Get Field From Page Category =================
	$id=get('id');
	$ItemName=get('ItemName');
	$Price=get('Price');
	$Decription=get('Decription');
	$UserID = $_SESSION['UserID'];
	$StatusGet=get('Status');

//==================== Insert New Branch =======================
if(isset($_POST['btnSave'])){
		$cboCompany		=  get('CompanyID');
		$cboCategory	=  get('CategoryID');
		$txtItemName	=  post('txtItem');
		$txtPrice		=  post('txtPrice');
		$txtStatus		=  post('Status');
		$txtDescrpiton	= post('txtDescrpiton');
			
		if($UserID=="1"){
			$update=$db->query("CALL sp_RentItem_Update(
					'".$id."',
					'".$cboCompany."',
					N'".sql_quote($txtItemName)."',
					'".$cboCategory."',
					".$txtPrice.",
					".$txtStatus.",
					N'".sql_quote($txtDescrpiton)."'
					)			
		");
			if($update){
							cRedirect('RentItem.php');
						
							
					}
		}
}
?>
	<head>

		<script language="javascript">
		function checkInput(ob) {
		  var invalidChars = /[^0-9]/gi
		  if(invalidChars.test(ob.value)) {
					ob.value = ob.value.replace(invalidChars,"");
			  }
		}

		function isNumberKey(evt)
			   {
				  var charCode = (evt.which) ? evt.which : evt.keyCode;
				  if (charCode != 46 && charCode > 31 
					&& (charCode < 48 || charCode > 57))
					 return false;

				  return true;
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
							
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<tbody>		
							  <tr>		
								<td  class="col-md-2 text-center">
								<div class="dropdown">
								  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
									Choose Company
									<span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
									<?php
											$db->disconnect();
											$db->connect();
											  $select=$db->query("CALL sp_Company_Select('')");
												$rowselect=$db->dbCountRows($select);
												if($rowselect>0){
													while($row=$db->fetch($select)){
													$CompanyID = $row->CompanyID;
													$CompanyName = $row->CompanyName;
														echo'<li role="presentation"><a role="mmenuitem" tabindex="-1"
														href="RentItem-new.php?CompanyID='.$CompanyID.'&CompanyName='.$CompanyName.'
														&ItemName='.$ItemName.'">'.$CompanyName.'</a></li>';
													}
												}
											
											
										?>
									  </ul>
									</div>	
								  </td>
								<td class="col-md-10 text-center"> <input type="text" class="form-control" <?php echo 'value="'.$getCompanyTemp.'"'; ?> readonly></td>
							  </tr>							  
							<tr>
							  <td  class="col-md-2 text-center">
								<div class="dropdown">
								  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-expanded="true">
									Choose Category
									<span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3">
									<?php
											$db->disconnect();
											$db->connect();
											
											  $select=$db->query("SELECT CategoryID,CategoryName FROM tblcategory WHERE CompanyID='".$CompanyIDTemp."' ");
												$rowselect=$db->dbCountRows($select);
												if($rowselect>0){
													
													while($row=$db->fetch($select)){
													$CategoryID = $row->CategoryID;
													$CategoryName = $row->CategoryName;
														echo'<li role="presentation"><a role="mmenuitem" tabindex="-1" 
														href="RentItem-new.php?CompanyID='.$CompanyIDTemp.'&CompanyName='.$getCompanyTemp.'&CategoryID='.$CategoryID.'&CategoryName='.$CategoryName.'">'.$CategoryName.'</a></li>';
													}
												}
											
											
											?>
								  </ul>
								</div>
							</td>
							  <td class="col-md-10 text-center"> <input type="text" class="form-control" <?php echo 'value="'.$CategoryNameTemp.'"'; ?> readonly></td>
							</tr>
						</tbody>
					</table>	
							<div class="form-group">
                                <label>Rent Item</label>
								<input name="txtItem" class="form-control" value="<?php echo $ItemName; ?>" placeholder="Enter text"  required />
                            </div>
							
							<div class="form-group">
                                <label>Price</label>
								<input name="txtPrice" class="form-control" value="<?php echo $Price; ?>" placeholder="Enter text" onkeypress="return isNumberKey(event)" required />
                            </div>
	
							<div class="form-group">
                                <label>Status</label><br/>
							<!--	<input name="txtisLeave" class="form-control" placeholder="Enter text" required /> -->
								<input type="radio" name="Status" value="0" <?php if($StatusGet==0) echo 'checked' ?> class="form-control">Busy
								<input type="radio" name="Status" value="1" <?php if($StatusGet==1) echo 'checked' ?> class="form-control">Free
                            </div> 
							 
							<div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="txtDescrpiton" id="editor1" rows="3">
								<?php echo $Decription; ?>
								</textarea>
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
<?php include 'footer.php';?>