<?php include 'header.php';
$CompanyIDTemp=get('CompanyID');
$getCompanyTemp=get('CompanyName');
$CategoryNameTemp=get('CategoryName');
$CategoryIDTemp=get('CategoryID');
$getPrice=get('Price');
//================ Get Field From Page Category =================
	$RentItemIDOld  = get('RentItemID');
	$ItemNameTemp	=	get('ItemName');
	$getCustomerID	=	get('CustomerID');
	$getCustomerTemp=	get('CusName');
	$CompanyIDTemp	=	get('CompanyID');
	$getCompanyTemp	=	get('CompanyName');
	$CategoryIDTemp	=	get('CategoryID');
	$CategoryNameTemp=	get('CategoryName');
	$UserID = $_SESSION['UserID'];
	$StatusGet=get('Status');
	$RentDate = get('RentDate');
	$PayDate= get('PayDate');
	$leavesdate=get('LeaveDate');
	$leaves=get('Leaves');
	$CustomerRentID=get('CustomerRent_ID');
    $_SESSION['Customer_RentID']=$CustomerRentID;
	$Customer_RentID = $_SESSION['Customer_RentID'];
	$S_RentIDOLD = $_SESSION['_RentItemID'];
	$_SESSION['RentDate']=$RentDate;
	$S_Price = $_SESSION['Price'];
	$S_Description = $_SESSION['Desciption'];
	$rentdate=$_SESSION['RentDate'];
	$_SESSION['PayDate']=$PayDate;
	$paydate=$_SESSION['PayDate'];
	
	
//==================== Insert New Branch =======================
if(isset($_POST['btnSave'])){
		$cboCustomers	=   get('CustomerID');
		$cboCompany		=   get('CompanyID');
		$cboRentItem	=   get('RentItemID');
		$txtRentDate	=	post('txtRentDate');
		$txtPayDate		=   post('txtpaydate');
		$txtPrice		=   post('txtPrice');
		$Leave			=   post('txtLeave');
		$txtLeaveDate	=   post('txtLeaveDate');
		$txtDescrpiton	=	post('txtDescrpiton');
			
		//echo $txtRentDate."+".$txtPayDate."+".$txtPrice."+".$Leave;
		//echo $cboRentItem."".$txtPrice."ID=".$Customer_RentID;
	
		if($UserID=="1"){
			$update=$db->query("CALL sp_Customer_Rent_Update(
					'".$Customer_RentID."',
					'".$cboCustomers."',
					'".$cboRentItem."',
					'".$cboCompany."',
					'".$txtRentDate."',
					'".$txtPayDate."',
					".$txtPrice.",
					".$Leave.",
					'".$txtLeaveDate."',
					N'".sql_quote($txtDescrpiton)."'
					)			
		"); 
		
		
			if($update){
				if($RentItemIDOld!=$S_RentIDOLD)
				{
				//echo "wrong ".$cboRentItem;
				$db->query("call spUpdate_rentitemStu1('".$S_RentIDOLD."'); ");
				$db->query("call spUpdate_rentitem('".$cboRentItem."' );");
				}
				
				cRedirect('Customer_Rent.php');
			}
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

		function isNumberKey(evt)
			   {
				  var charCode = (evt.which) ? evt.which : evt.keyCode;
				  if (charCode != 46 && charCode > 31 
					&& (charCode < 48 || charCode > 57))
					 return false;
				  return true;
			   }
		function GetPayDate(){
			var Paydate=document.getElementById("PayDate");
				document.getElementById("txtPayD").value=Paydate;
		}
		$('#datetimepicker').datetimepicker({
			dayOfWeekStart : 1,
			lang:'en',
			disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
			startDate:	'1986/01/05'
			});
			$('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});

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
														
														href="Customer_Rent-Update.php?CustomerID='.$CustomerID.'
														&CusName='.$fullName.'">'.$fullName.'</a></li>';
													}
													
												}
										
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
														href="Customer_Rent-Update.php?CustomerID='.$getCustomerID.'
														&CusName='.$getCustomerTemp.'&CompanyID='.$CompanyID.'
														&CompanyName='.$CompanyName.'">'.$CompanyName.'</a></li>';
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
											
											  $select=$db->query("call spCategory_Select('".$CompanyIDTemp."'); ");
												$rowselect=$db->dbCountRows($select);
												if($rowselect>0){
													
													while($row=$db->fetch($select)){
													$CategoryID = $row->CategoryID;
													$CategoryName = $row->CategoryName;
														echo'<li role="presentation"><a role="mmenuitem" tabindex="-1" 
														href="Customer_Rent-Update.php?CustomerID='.$getCustomerID.'
														&CusName='.$getCustomerTemp.'&CompanyID='.$CompanyIDTemp.'
														&CompanyName='.$getCompanyTemp.'&CategoryID='.$CategoryID.'
														&CategoryName='.$CategoryName.'">'.$CategoryName.'</a></li>';
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
								<div class="dropdown">
								  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-expanded="true">
									Choose Item
									<span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu4">
									<?php
											$db->disconnect();
											$db->connect();
											
											   $select1=$db->query("CALL spSelect_RentitemStu1('".$CategoryIDTemp."');");
												$rowselect1=$db->dbCountRows($select1);
												if($rowselect1>0){	
													while($row=$db->fetch($select1)){
													$RentItemID = $row->RentItemID;
													$ItemName 	= $row->ItemName;
													$Price		=  $row->Price;
														echo'<li role="presentation"><a role="mmenuitem" tabindex="-1" 
														href="Customer_Rent-Update.php?CustomerID='.$getCustomerID.'
														&CusName='.$getCustomerTemp.'&CompanyID='.$CompanyIDTemp.'
														&CompanyName='.$getCompanyTemp.'&CatID='.$CategoryIDTemp.'
														&CategoryName='.$CategoryNameTemp.'&RentItemID='.$RentItemID.'
														&Price='.$Price.'&ItemName='.$ItemName.'">'.$ItemName.'</a></li>';
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
							
								<input type="text" id="RentDate" name="txtRentDate" class="form-control" <?php echo 'value="'.$rentdate.'"'; ?>"/> 
                            </div>
							<div class="form-group">
                                <label>Pay Date</label>
							<!--	<input name="txtPayDate" class="form-control" placeholder="Enter text" required /> -->
									<input type="text" value="" id="datetimepicker" name="txtpaydate" class="form-control" <?php echo 'value="'.$paydate.'"'; ?>/>
									<input type="text" id="PayDate" name="txtpaydate" class="form-control" <?php echo 'value="'.$paydate.'"'; ?>"/>
                            </div>
							<input type="text" id="txtPayD" name="txtPayDateTime" class="form-control" <?php echo 'value="'.$paydate.'"'; ?>"/>
							<div class="form-group">
                                <label>Price</label>
								<input name="txtPrice" class="form-control" placeholder="Enter text" <?php 
								if($getPrice=="")
								echo 'value="'.$S_Price.'"';
								else
								echo 'value="'.$getPrice.'"';
								?> required readonly/>
                            </div>
							
							<div class="form-group">
                                <label>Leave</label><br/>
							<!--	<input name="txtisLeave" class="form-control" placeholder="Enter text" required /> -->
								<input type="radio" name="txtLeave" value="0" <?php if($leaves=="No") echo 'checked' ?> class="form-control">No
								<input type="radio" name="txtLeave" value="1" <?php if($leaves=="Yes") echo 'checked' ?> class="form-control">Yes
                            </div>
					
							<div class="form-group">
                                <label>Leave Date</label>
							<!--	<input name="txtLeaveDate" class="form-control" placeholder="Enter text" required /> -->
								<input type="text" id="LeaveDate" name="txtLeaveDate" class="form-control" value="<?php echo $leavesdate; ?>"/>
                            </div>
							       
							<div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="txtDescrpiton" id="editor1" rows="3" value="<?php echo $S_Description; ?>"></textarea>
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