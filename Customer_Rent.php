<?php include 'header.php';
$searchTemp=get('srch-normal');
$getdatenotyetpay=get('datanotyetpay');


?>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="./css/jquery.datetimepicker.css"/>
		
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
                    <h1>
                        Customer Rent
                        <small>Customer Rent</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">New Customer Rent</h4>
							<div class="modal-body">
									<?php

										//$_SESSION['S_CompanyNameTemp'] = get('CompanyName');
										$CompanyIDTemp=get('CompanyID');
										$getCompanyTemp=get('CompanyName');
										$CategoryNameTemp=get('CategoryName');
										$CategoryIDTemp=get('CatID');
										$ItemNameTemp=get('ItemName');
										$PriceTemp=get('Price');

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
																	$db->query("call spUpdate_rentitem('".$cboRentItem."');");
																	
																	cRedirect('Customer_Rent.php');
																	//$error = 'Success';
																	
															}		
													
												}
										?>
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
												<input type="radio" name="Leave" value="0"  class="form-control">Yes
												<input type="radio" name="Leave" value="1" checked  class="form-control">No
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
																					
							</div>
							<div class="modal-footer">
							<a href="Category.php">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</a>
							<button type="submit" class="btn btn-primary" name="btnSave">Save</button>
							</div>
						  </div>
						</div>
						</div>
					  </div><!-- /.row -->
					   
                    <!-- Table row -->
                
                  <section class="content invoice">
				   <div class="panel-body">
                   <div class="dataTable_wrapper">
                    <!-- Table row -->
                    <div class="row">
                          <div class="col-xs-12 table-responsive">
							<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        
											<th colspan="12">
												<div style="margin-left:-20px;"class="col-md-6">
														<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file-o"></i> Rent</button>
												</div>
												<div class="col-md-4" style="margin-left:-20px;"> 
                                                     <form class="form-inline">
                                                     <div class="col-md-13 pull-right">
                                                    
                                                     <div class="form-group" >
                                                     <input type="text" id="btnDate" name="datanotyetpay" class="form-control col-md-1" <?php 
													 if($getdatenotyetpay!=""){
													 echo 'value="'.$getdatenotyetpay.'"';
													 }
													 else{
													 $datenow=date("Y-m"); echo 'value="'.$datenow.'"'; 
													 $getdatenotyetpay=date("Y-m");
													 }?>/>  
                   
													 <?php 
														$tomorrow = strtotime($getdatenotyetpay);
														//echo "Month is ".date("m", $tomorrow);

													 ?>
													 </div>
													 </div>
													 </div>
													 <div class="col-md-2" style="margin-left:-10px;">
                                                     <div class="input-group">
                                                      
                                                    <div class="input-group-btn" >
													 <input type="text" class="form-control" placeholder="Search" name="srch-normal" id="search.php?dnsname=name&srch-term" <?php echo 'value="'.$searchTemp.'"'?>>
                                                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                                      
                                                    </div>
                                                    </div>
													</div>
            
                                                    </form>
                                                    
                                                </div>
                                            </th>
                                    </tr> 
                                </thead>
								<thead>
                                    <tr>
									
                                        <th>No</th>
										<th>Customer</th>
                                        <th>RentItem</th>
										<th>Company</th>
										<th>RentDate</th>
										<th>PayDay</th>
										<th>Price</th>
										<th>Leave</th>
										<th>LeaveDate</th>
                                        <th>Description</th>
										<th colspan="2">Action</th>
										
                                    </tr>
                                   
                                </thead>
                                <tbody>
                                    
                                    
                                    <?php
								//	$txtsrch = get('srch-normal');
									if($getdatenotyetpay!=""){								
									$getdatenotyetpays=$getdatenotyetpay."-01";
									$_slide1 = $db->query("CALL sp_Customer_Rent_Select_Company('".$searchTemp."','".$getdatenotyetpays."')");
									}
									else{
									$datenows=$datenow."-01";
									$_slide1 = $db->query("CALL sp_Customer_Rent_Select_Company('".$searchTemp."','".$datenows."')");
									}
									$numrow=$db->dbCountRows($_slide1);
										$i = 1;
									if($numrow>0)
									{
										while($row=$db->fetch($_slide1)){
												$id=$row->Customer_RentID;
												//$FullName=$row->FullName;
												$RentItemID=$row->RentItemID;
												$ItemName = $row->ItemName;
												$CustomerID=$row->CustomerID;
												$CusName=$row->FullName;
												$CompanyID=$row->CompanyID;
												$CompanyName = $row->CompanyName;
												$CategoryID=$row->CategoryID;
												$CategoryName = $row->CategoryName;
												$RentDate = $row->RentDate;
												$NewRentDate= date('d-M-Y',strtotime($RentDate));
												$OldPayDate = $row->PayDate;
												$PayDate= date('d',strtotime($OldPayDate));
												$Price=$row->Price;
												$isLeave = $row->isLeave;
												if($isLeave==1){
												$Leaves="No";
												}
												else{
												$Leaves="Yes";
												}
												$LeaveDate = $row->LeaveDate;
												$Decription = $row->Desciption;	
												
												$_SESSION['Customer_RentID'] = $row->Customer_RentID;
												$_SESSION['_RentItemID'] = $row->RentItemID;
												$_SESSION['RentDate'] = $RentDate;
												$_SESSION['PayDate'] = $OldPayDate;
												$_SESSION['Price'] = $Price;
												$_SESSION['Leaves'] = $Leaves;
												$_SESSION['LeaveDate'] = $LeaveDate;
												$_SESSION['Desciption'] = $Decription;
						
											//date_format($RentDate,"Y/m/d");
											// date("d-M-y",$RentDate);
											echo'<tr class="gradeA">
														<td>'.$i++.'</td>
														<td>'.$CusName.'</td>
														<td>'.$ItemName.'</td>
														<td>'.$CompanyName.'</td>
														<td>'.$NewRentDate.'</td>
														<td>'.$PayDate.'</td>
														<td>'.$Price.'$</td>
														<td>'.$Leaves.'</td>
														<td>'.$LeaveDate.'</td>
														<td>'.$Decription.'</td>
													
														
														<td>
													
													
															<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#Modal" data-whatever="@mdo">
																<i class="glyphicon glyphicon-usd"></i>
																Payment
															</button>
                                                      
													  
														</td>
												
														<td>
														<a class="iframe" href="Customer_Rent-Update.php?RentItemID='.$RentItemID.'
														&ItemName='.$ItemName.'&CustomerID='.$CustomerID.'&CusName='.$CusName.'
														&CompanyID='.$CompanyID.'&CompanyName='.$CompanyName.'&CategoryID='.$CategoryID.'
														&CategoryName='.$CategoryName.'&Leaves='.$Leaves.'
														&Price='.$Price.'&LeaveDate='.$LeaveDate.'&Decription='.$Decription.'">
															<button class="btn btn-sm btn-primary">
																<i class="glyphicon glyphicon-pencil"></i>
																Edit
															</button>
                                                        </a>
														</td>
												</tr>';
											
										}	
										
									}
									else 
										echo'<tr><td  colspan="12"><font color =Red>No Record Found.</font></td></tr>';
								
                                ?>
                                   
                                </tbody>
                            </table>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <button class="btn btn-primary pull-right" onClick="window.print();"><i class="fa fa-print"></i> Print</button>
                           
                        </div>
                    </div>
				</div>
                </div>
				<!--Modal Payment-->
					<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">Payment</h4>
							<div class="modal-body">
									<?php 

										//================ Get Field From Page Category =================
											$Customer_RentID = get('id');
											$RentItemID		=	get('RentItemID');
											$Price=get('Price');
											$UserID = $_SESSION['UserID'];
											$PayYearMonth = get('getdatenotyetpay');
											$PayDay  	=   get('PayDate');
											$txtPayDate = $PayYearMonth."-".$PayDay;
										//==================== Insert New Branch =======================
										if(isset($_POST['btnSave'])){
												$txtPayDate		=	post('txtPayDate');
												$txtRealPayDate =   post('txtRealPayDate');
												$txtPrice 		=	post('txtPrice');
												$txtElectric 	=	post('txtElectric');
												$txtWater 		=	post('txtWater');
												$txtGarbage 	=	post('txtGarbage');
												$txtOther 		=	post('txtOther');
												$txtTotal 		=	post('txtTotal');	 
													
												if($UserID=="1"){
													$update=$db->query("CALL sp_Customer_Rent_Payment_Insert(
															'".$Customer_RentID."',
															'".$UserID."',
															'".$RentItemID."',
															'".$txtPayDate."',
															'".$txtRealPayDate."',
															".$txtPrice.",
															".$txtElectric.",
															".$txtWater.",
															".$txtGarbage.",
															".$txtOther.",
															".$txtTotal."
															)			
												");
													if($update){
														cRedirect('Customer_Rent.php');	
															}
												}
										}
										?>
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
												</script>
												<div class="form-group">
												 <label>Pay Date</label>
												<!--	<input name="txtPayDate" class="form-control" placeholder="Enter text" required /> -->
														<input type="text" name="txtPayDate" class="form-control" value="<?php echo $txtPayDate; ?>" readonly/>
												</div>
												<div class="form-group">
												<label>Real Pay Date</label>
												<!--	<input name="txtPayDate" class="form-control" placeholder="Enter text" required /> -->
														<input type="text" id="RealPayDate" name="txtRealPayDate" class="form-control" <?php $datenow=date("Y-m-d"); echo 'value="'.$datenow.'"'; ?>/>
												</div>
																		
												<div class="form-group">
													<label>Price</label>
													<input name="txtPrice" id="Price" class="form-control" value="<?php echo $Price; ?>" required readonly />
												</div>
												
												<div class="form-group">
													<label>Electric</label>
													<input name="txtElectric" id="Electric" class="form-control" value="0" onkeypress="return isNumberKey(event)" required />
												</div>
												
												<div class="form-group">
													<label>Water</label>
													<input name="txtWater" id="Water" class="form-control" value="0" onkeypress="return isNumberKey(event)" required />
												</div>
												
												<div class="form-group">
													<label>Garbage</label>
													<input name="txtGarbage" id="Garbage" class="form-control" value="0" onkeypress="return isNumberKey(event)" required />
												</div>
												
												<div class="form-group">
													<label>Other</label>
													<input name="txtOther" id="Other" class="form-control" value="0" onkeypress="return isNumberKey(event)" required />
												</div>
												
												<div class="form-group">
													<label>Total</label>
													<input name="txtTotal" id="Total" class="form-control" 
													value="<?php echo $Price; ?>"
													
													required readonly />
												</div>																					  
							</div>
							  <div class="modal-footer">
								<a href="RentItem.php">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</a>
								<input type="submit" name="btnSave" class="btn btn-primary" value="Save" />
							</div>
						  </div>
						</div>
                     </div>
   
                </section>
                    
            </aside><!-- /.right-side -->
            
            
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
		</body>
	<script src="./js/jquery.js"></script>
    <script src="./js/jquery.datetimepicker.js"></script>
    <script>

        //  ** show date and time picker
         $('#btnDate').datetimepicker({
		 	
            timepicker: false, //visible time = false
            format: 'Y-m',
            step: 10
		
        });
		$('#btnDate').click({
		
		});
		
    </script>
<?php include 'footer.php';?>