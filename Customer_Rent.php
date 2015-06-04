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
                
                  <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> 
                                
                             
                            </h2>
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                   
                     </div><!-- /.row -->
                   
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        
											<th colspan="4">
											 <a href="Customer_Rent-new.php">
													<button class="btn btn-primary" data-toggle="modal" data-target="#NewFloor"><i class="fa fa-file-o"></i> Rent</button>
													</a>
											</th>
                                            <th colspan="10">
                                                <div class="row">
                                                    
                                                     <form class="form-inline">
                                                     <div class="col-md-13 pull-right">
                                                    
                                                     <div class="form-group">
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
                                                      <div class="input-group">
                                                      
                                                    <div class="input-group-btn">
													 <input type="text" class="form-control" placeholder="Search" name="srch-normal" id="search.php?dnsname=name&srch-term" <?php echo 'value="'.$searchTemp.'"'?>>
                                                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                                      
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
										<th>Action</th>
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
														<a class="iframe" href="Customer-Rent-Payement.php?id='.$id.'&RentItemID='.$RentItemID.'&ItemName='.$ItemName.'&Price='.$Price.'&Decription='.$Decription.'&PayDate='.$PayDate.'&getdatenotyetpay='.$getdatenotyetpay.'">
															<button class="btn btn-sm btn-warning">
																<i class="glyphicon glyphicon-usd"></i>
																Payment
															</button>
                                                        </a>
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
										echo'<tr><td  colspan="7"><font color =Red>No Record Found.</font></td></tr>';
								
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