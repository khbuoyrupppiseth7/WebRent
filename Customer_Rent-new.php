<?php include 'header.php';
//$_SESSION['S_CompanyNameTemp'] = get('CompanyName');
$CompanyIDTemp=get('CompanyID');
$getCompanyTemp=get('CompanyName');
$CategoryNameTemp=get('CategoryName');
$CategoryIDTemp=get('CatID');
$ItemNameTemp=get('ItemName');
$PriceTemp=get('Price');
$db->disconnect();
$db->connect();
//==================== Insert New Category ======================
if(isset($_POST['btnSave'])){
		$cboCustomers	=   get('CustomerID');
		$cboCompany		=   get('CompanyID');
		$cboRentItem	=   get('RentItemID');
		$txtRentDate	=	post('txtRentDate');
		$txtPayDate		=   post('txtPayDate');
		$txtPrice		=   post('txtPrice');
		$Leave			=   post('Leave');
		$txtLeaveDate	=   post('txtLeaveDate');
		$txtDescrpiton	=	post('txtDescrpiton');
	
//	echo $cboCustomers;						

		$insert=$db->query("CALL sp_Customer_Rent_Insert (
										'".time()."',
										'".$cboCustomers."',
										'".$cboRentItem."',
										'".$cboCompany."',
										'".$txtRentDate."',
										'".$txtPayDate."',
										".$txtPrice.",
										".$Leave.",
										'".$txtLeaveDate."',
										N'".sql_quote($txtDescrpiton)."'
										);
										");
	
					if($insert){
							$db->query(" UPDATE tblrentitem SET isStatus=0 WHERE RentItemID='".$cboRentItem."'");
							
							cRedirect('Customer_Rent.php');
							//$error = 'Success';
							
					}		
			
		}
?>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="./css/jquery.datetimepicker.css"/>
	
	<script language="javascript">
			window.onload = function() { BindEvent(); }

		function BindEvent()
		{
			var elemToBind = document.getElementById ( "cmb1" );
			elemToBind.onchange = function () { SetSel ( this ); }
		}
		function SetSel(elem)
		{
			var secondCombo = document.getElementById ( "cmb2" );
			secondCombo.value = elem.value;   
		}
			 
	</script>
	
	</head>
    <body class="skin-blue">
       
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <div class="row" style="margin:0 auto;>
                   <div class="col-xs-8">
				   <form role="form" method="post" enctype="multipart/form-data">   
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<tbody>	
							  <tr><h3>Add New Rent</h3></tr>
							  <tr>
							  <td  class="col-md-2 text-center">
								<div class="dropdown">
								  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
									Choose Customer
									<span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
									<?php
											$db->disconnect();
											$db->connect();
											  $select=$db->query("CALL sp_Customer_Select('')");
												$rowselect=$db->dbCountRows($select);
												if($rowselect>0){
													while($row=$db->fetch($select)){
													$CustomerID = $row->CustomerID;
													$fullName = $row->fullName;
														echo'<li role="presentation"><a role="mmenuitem" tabindex="-1"
														href="Customer_Rent-new.php?CustomerID='.$CustomerID.'&CusName='.$fullName.'">'.$fullName.'</a></li>';
													}
												}
											//$db->disconnect();
											$getCustomerID=get('CustomerID');
											$getCustomerTemp=get('CusName');
									?>
								  </ul>
								</div>	
							  </td>
							  <td class="col-md-10 text-center"> <input type="text" class="form-control" <?php echo 'value="'.$getCustomerTemp.'"'; ?> readonly></td>
							  </tr>
							
							
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
														href="Customer_Rent-new.php?CustomerID='.$getCustomerID.'&CusName='.$getCustomerTemp.'&CompanyID='.$CompanyID.'&CompanyName='.$CompanyName.'">'.$CompanyName.'</a></li>';
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
														href="Customer_Rent-new.php?CustomerID='.$getCustomerID.'&CusName='.$getCustomerTemp.'&CompanyID='.$CompanyIDTemp.'&CompanyName='.$getCompanyTemp.'&CatID='.$CategoryID.'&CategoryName='.$CategoryName.'">'.$CategoryName.'</a></li>';
													}
												}
											
											
											?>
								  </ul>
								</div>
							</td>
							  <td class="col-md-10 text-center"> <input type="text" class="form-control" <?php echo 'value="'.$CategoryNameTemp.'"'; ?> readonly></td>
							</tr>
							  
						
							  <tr>
							  <td  class="col-md-2 text-left">
								<div class="dropdown" style=" margin-left:35px;">
								  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-expanded="true">
									Choose Item
									<span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu4">
								 
									<?php
											
											$db->disconnect();
											$db->connect();
											
											   $select1=$db->query("select RentItemID,CategoryID,ItemName,Price FROM tblrentitem WHERE CategoryID='".$CategoryIDTemp."' and isStatus=1 ;");
												$rowselect1=$db->dbCountRows($select1);
												if($rowselect1>0){
													
													while($row=$db->fetch($select1)){
													$RentItemID = $row->RentItemID;
													$ItemName 	= $row->ItemName;
													$Price		=  $row->Price;
														echo'<li role="presentation"><a role="mmenuitem" tabindex="-1" 
														href="Customer_Rent-new.php?CustomerID='.$getCustomerID.'&Category='.$CategoryIDTemp.'&CusName='.$getCustomerTemp.'&CompanyID='.$CompanyIDTemp.'&CompanyName='.$getCompanyTemp.'&CatID='.$CategoryIDTemp.'&CategoryName='.$CategoryNameTemp.'&RentItemID='.$RentItemID.'&Price='.$Price.'&ItemName='.$ItemName.'">'.$ItemName.'</a></li>';
													}
												}
											
											?>
								  </ul>
								</div>
							   </td>
								 <td class="col-md-10 text-center"> <input type="text" class="form-control" <?php echo 'value="'.$ItemNameTemp.'"'; ?> readonly></td>
							   </tr>
							</tbody>
							</table>
							
							<div class="form-group">
                                <label>Rent Date</label>
								<input type="text" id="RentDate" name="txtRentDate" class="form-control" <?php $datenow=date("Y-m-d"); echo 'value="'.$datenow.'"'; ?>/>
                            </div>
							
							<div class="form-group">
                                <label>Pay Date</label>
							<!--	<input name="txtPayDate" class="form-control" placeholder="Enter text" required /> -->
									<input type="text" id="PayDate" name="txtPayDate" class="form-control" <?php $datenow=date("Y-m-d"); echo 'value="'.$datenow.'"'; ?>/>
                            </div>
							
							<div class="form-group">
                                <label>Price</label>
								<input name="txtPrice" class="form-control" placeholder="Enter text" <?php echo 'value="'.$PriceTemp.'"'?> required readonly/>
                            </div>
							 
							<div class="form-group">
                                <label>Leave</label><br/>
							<!--	<input name="txtisLeave" class="form-control" placeholder="Enter text" required /> -->
								<input type="radio" name="Leave" value="1"  class="form-control">Yes
								<input type="radio" name="Leave" value="0" checked  class="form-control">No
                            </div>
							
							<div class="form-group">
                                <label>Leave Date</label>
							<!--	<input name="txtLeaveDate" class="form-control" placeholder="Enter text" required /> -->
								<input type="text" id="LeaveDate" name="txtLeaveDate" class="form-control"/>
                            </div>
							       
							<div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="txtDescrpiton" id="editor1" rows="3"></textarea>
                            </div>
										
							<input type="submit" name="btnSave" style="float:right;" class="btn btn-primary" value="Save" onClick='parent.jQuery.fn.colorbox.close();' />
                            
                            <button type="button" class="btn btn-default" style="float:right;"onClick='parent.jQuery.fn.colorbox.close();'>Close</button>
                            
                         
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
        $('#RentDate').datetimepicker({
            timepicker: false, // visible time = false
            format: 'Y-m-d',
            step: 10

 
        });

        $('#PayDate').datetimepicker({
            timepicker: false, //visible time = false
            format: 'Y-m-d',
            step: 10
        });
		
		$('#LeaveDate').datetimepicker({
            timepicker: false, //visible time = false
            format: 'Y-m-d',
            step: 10
        });
    </script>
<?php include 'footer.php';?>