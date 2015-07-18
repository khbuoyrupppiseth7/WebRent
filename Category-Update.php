<?php include 'header.php';

 $db->connect();
//================ Get Field From Page Category =================
	$id=get('id');
	$Category=get('Category');
	$OrderNo=get('OrderNo');
	$Decription=get('Decription');
	$db->disconnect();
	$UserID = $_SESSION['UserID'];
	$db->connect();
	$select=$db->query("SELECT 
						C.CompanyID AS CompanyID,
						CO.CompanyName AS CompanyName
						FROM tblcategory C
						INNER JOIN tblcompany CO ON C.CompanyID=CO.CompanyID
						WHERE C.CategoryID= '".$id."'");

	$numrow=$db->dbCountRows($select);
	if($numrow>0){
		$row=$db->fetch($select);
		$CompanyID1 = $row->CompanyID;
		$CompanyName1 = $row->CompanyName;
	}

//==================== Insert New Branch =======================
if(isset($_POST['btnSave'])){
		$cboCategory	=   $_POST['cboCategory'];
		$txtCategory	=	post('txtCategory');
		$txtOrderNo		=   post('txtOrder');
		$txtDescrpiton	=	post('txtDescrpiton');
			
		if($UserID=="1"){
			$update=$db->query("CALL sp_Category_Update(
					'".$id."',
					'".$cboCategory."',
					N'".sql_quote($txtCategory)."',
					'".$txtOrderNo."',
					N'".sql_quote($txtDescrpiton)."'
					)			
		");
			if($update){
							cRedirect('Category.php');
						
							
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
								<select class="form-control" name="cboCategory" autocomplete="on">
									<optgroup label = "Choose One">
										<?php
										$db->disconnect();
										$db->connect();
										// echo'<option value='.$BranchID.'>'.$BranchName.'</option>';
										
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
										?>
									<optgroup>
								</select>
										
							</div>
						  
							<div class="form-group">
                                <label>Category Name</label>
								<input name="txtCategory" class="form-control"  value="<?php echo $Category; ?>" placeholder="Enter text" required />
                            </div>
							
							<div class="form-group">
                                <label>Order</label>
								<input name="txtOrder" class="form-control" value="<?php echo $OrderNo; ?>" placeholder="Enter Number" onkeyup="checkInput(this)" required />
                            </div>
							
							<div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="txtDescrpiton" id="editor1" rows="3">
								<?php echo $Decription; ?>
								</textarea>
                            </div>
										
                            <div class="modal-footer">
                            <a href="Category.php">
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