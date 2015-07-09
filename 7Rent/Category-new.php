<?php include 'header.php';

//==================== Insert New Category ======================
if(isset($_POST['btnSave'])){
		$cboCategory	=   $_POST['cboCategory'];
		$txtCategory	=	post('txtCategory');
		$txtOrder		=   post('txtOrder');
		$txtDescrpiton	=	post('txtDescrpiton');
		
		$insert=$db->query("CALL sp_Category_Insert (
										'".time()."',
										'".$cboCategory."',
										N'".sql_quote($txtCategory)."',
										'".$txtOrder."',	
										N'".sql_quote($txtDescrpiton)."'
										);
										");
	
					if($insert){
							cRedirect('Category.php');
							//$error = 'Success';
							
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
									<label>Choose Category</label>
									<select class="form-control" name="cboCategory">   
										<?php
										
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
                                <label>Category Name</label>
								<input name="txtCategory" class="form-control" placeholder="Enter text" required />
                            </div>
							
							<div class="form-group">
                                <label>Order</label>
								<input name="txtOrder" class="form-control" placeholder="Enter Number" onkeyup="checkInput(this)" required />
                            </div>
       
							<div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="txtDescrpiton" id="editor1" rows="3"></textarea>
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