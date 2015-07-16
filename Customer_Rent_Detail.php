<?php include 'header.php';
$searchTemp=get('srch-normal');
$getdatenotyetpay=get('datanotyetpay');
$getdatepayTo=get('dateyetpayto');

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
                        Customer Rent Detail
                    </h1>
                    
                </section>

                <!-- Main content -->
                
                  <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                          
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                   
                     </div><!-- /.row -->
                   
                    <!-- Table row -->
                   <div class="panel-body">
                   <div class="dataTable_wrapper">
						
						<div class="row">
					
                        <div class="col-xs-12 table-responsive">
							<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        
											<th colspan="12">
											<div class="col-md-2"  style="margin-left:-20px;">
													<button class="btn btn-primary" data-toggle="modal" data-target="#NewFloor"><i class="fa fa-file-o"></i> Rent</button>
													
											</div>
                                           <div class="col-md-10"> 
													<form class="form-inline">
                                                     <div class=" pull-right" >
                                                    
                                                     <div class="form-group">
												
                                                     <input type="text" id="btnDate" name="datanotyetpay" class="form-control col-md-1" <?php 
													 if($getdatenotyetpay!=""){
													 echo 'value="'.$getdatenotyetpay.'"';
													 }
													 else{
													 $datenow=date("Y-m"); echo 'value="'.$datenow.'"'; 
													 $getdatenotyetpay=date("Y-m");
													 }?>/>  
													 
												     <input type="text" id="btnDateTo" name="dateyetpayto" class="form-control col-md-1" <?php 
													 if($getdatepayTo!=""){
													 echo 'value="'.$getdatepayTo.'"';
													 }
													 else{
													 $datenow=date("Y-m"); echo 'value="'.$datenow.'"'; 
													 $getdatepayTo=date("Y-m");
													 }?>/>  
													 
													
													 <?php 
														$tomorrow = strtotime($getdatenotyetpay);
														echo "Month is ".date("m", $tomorrow);

													 ?>
													 </form>
													  <div class="input-group">
													 <div class="input-group-btn">
													 <input type="text" class="form-control" placeholder="Search" name="srch-normal" id="search.php?dnsname=name&srch-term" <?php echo 'value="'.$searchTemp.'"'?>/>
                                                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                                      
                                                    </div>
                                                    </div>
											</div>
											
                                            </th>
										
                                       
                                    </tr>
                                   
                                </thead>
								<thead>
                                    <tr>
                                        <th>No</th>
										<th>RentItem</th>
										<th>Customer</th>
										<th>PayDay</th>
										<th>Real PayDay</th>
										<th>Price</th>
										<th>Electric</th>
										<th>Water</th>
                                        <th>Garbage</th>
										<th>Other</th>
										<th>Total</th>
										<th>Action</th>
                                    </tr>
                                   
                                </thead>
                                <tbody>
                                    
                                    
                                    <?php
									
									$TotalAll="";
								//	$txtsrch = get('srch-normal');
									if($getdatenotyetpay!="" && $getdatepayTo!=""){								
									$getdatenotyetpays=$getdatenotyetpay."-01";
									$getdatepayTos=$getdatepayTo."-01";
									$_slide1 = $db->query("CALL sp_Customer_Rent_Payment_Detail('".$searchTemp."','".$getdatenotyetpays."','".$getdatepayTos."')");
									}
									else{
									$datenows=$datenow."-01";
									$_slide1 = $db->query("CALL sp_Customer_Rent_Payment_Detail('".$searchTemp."','".$datenows."','".$datenows."')");
									}
									$numrow=$db->dbCountRows($_slide1);
										$i = 1;
									if($numrow>0)
									{		$TotalAll=0;
										while($row=$db->fetch($_slide1)){
												$id=$row->Customer_RentID;
												$UserID=$row->UserID;
												$RentItemID=$row->RentItemID;
												$ItemName = $row->ItemName;
												$CustomerID=$row->CustomerID;
												$CusName=$row->fullName;
												$OldPayDate = $row->PayDate;
												$PayDate= date('d',strtotime($OldPayDate));
												$RealPayDate= $row->RealPayDate;
												$Price=$row->Price;
												$Electric = $row->Electric;
												$Water = $row->Water;	
												$garbage = $row->garbage;	
												$Other = $row->Other;	
												$TotalPay = $row->TotalPay;
										
												$TotalAll=$TotalAll+ $TotalPay;
											echo '<tr class="gradeA">
														<td>'.$i++.'</td>
														<td>'.$ItemName.'</td>
														<td>'.$CusName.'</td>
														<td>'.$RealPayDate.'</td>
														<td>'.$RealPayDate.'</td>
														<td>'.$Price.'$</td>
														<td>'.$Electric.'$</td>
														<td>'.$Water.'$</td>
														<td>'.$garbage.'$</td>
														<td>'.$Other.'$</td>
														<td>'.$TotalPay.'$</td>
														<td>
														<a class="iframe" href="Customer-Rent-Payement.php?id='.$id.'&RentItemID='.$RentItemID.'&ItemName='.$ItemName.'&Price='.$Price.'&PayDate='.$PayDate.'&getdatenotyetpay='.$getdatenotyetpay.'">
															<button class="btn btn-sm btn-danger">
																<i class="glyphicon glyphicon-remove"></i>
																Delete
															</button>
                                                        </a>
														</td>
												</tr>';
											
										}	
										
									}
									else 
										echo'<tr><td  colspan="12"><font color =Red>No Record Found.</font></td></tr>';
								
                                ?>
                                   <tr>
								   <td class="text-right" colspan="11">Total</td>
								   <td><?php echo $TotalAll."$" ?></td>
								   </tr>
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
		
		$('#btnDateTo').datetimepicker({
		 	
            timepicker: false, //visible time = false
            format: 'Y-m',
            step: 10
		
        });
		
		btnDateTo
		
		$('#btnDate').click({
		
		});
		
    </script>
<?php include 'footer.php';?>