<?php include 'header.php';
$searchTemp=get('srch-normal');
$getCompanyTemp=get('CompanyName');
$CategoryNameTemp=get('CategoryName');
$CategoryIDTemp=get('CatID');
?>

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
                        RentItem
                        <small>RentItem</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                    <!-- title row -->
                    <div class="panel-body">
                   <div class="dataTable_wrapper">
						
						<div class="row">
					
                        <div class="col-xs-12 table-responsive">
							<table class="table table-bordered  table-hover">
								<thead>
									<tr>
									<th colspan="12">
										<div class="col-md-8">
										<a class='iframe' href="RentItem-new.php">
											<button style="margin-left:-20px;"type="button" class="btn btn-primary"><i class="fa fa-file-o"></i>New</button>
										</a>
										
										</div>
										
										<div class="col-md-4"> 
										 <form class="navbar-form" role="search">
										  <div class=" pull-right" style="margin-top:-8px;">
											<div class="input-group">
											  
											  <input type="text" class="form-control" placeholder="Search" name="srch-normal" id="search.php?dnsname=name&srch-term" <?php echo 'value="'.$searchTemp.'"'?>>
											  <div class="input-group-btn">
												 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
											  </div><!-- /btn-group -->
											</div><!-- /input-group -->
										   </div><!-- /.col-lg-3 -->
										  </form>
										</div>
									
										
									
									</tr>
								</thead>
                                <thead>
                                    <tr style="background-color:#4682B4; color:white;">
                                        <th>No </th>
										<th>Item Name</th>
										<th>Company</th>
										<th>Category</th>
										<th>Price</th>
										<th>Status</th>
                                        <th>Description</th>
										<th>Action</th>
                                    </tr>
                                   
                                </thead>
                                <tbody>
                                    
                                    
                                    <?php
									$db->disconnect();
									$db->connect();
								//	$txtsrch = get('srch-normal');
								
									$_slide1 = $db->query("CALL sp_RentItem_Select_Company('".$searchTemp."','".$getComIDUser."')");
						
									$numrow=$db->dbCountRows($_slide1);
										$i = 1;
									if($numrow>0)
									{
										while($row=$db->fetch($_slide1)){
												$id=$row->RentItemID;
												$ItemName = $row->ItemName;
												$CompanyID=$row->CompanyID;
												$CompanyName=$row->CompanyName;
												$CategoryID=$row->CategoryID;
												$CategoryName = $row->CategoryName;
												$Price=$row->Price;
												$Status=$row->isStatus;
												if($Status==1)
												$isStatus="Free";
												else
												$isStatus="Busy";
												$Decription = $row->Desciption;	
											
											echo'<tr class="gradeA">
														<td>'.$i++.'</td>
														<td>'.$ItemName.'</td>
														<td>'.$CompanyName.'</td>
														<td>'.$CategoryName.'</td>
														<td>'.$Price.'$</td>
														<td>'.$isStatus.'</td>
														<td>'.$Decription.'</td>
														<td>
														<a class="iframe" href="RentItem-Update.php?id='.$id.'&CompanyID='.$CompanyID.'&CompanyName='.$CompanyName.'&ItemName='.$ItemName.'&CategoryID='.$CategoryID.'&CategoryName='.$CategoryName.'&Price='.$Price.'&Status='.$Status.'&Decription='.$Decription.'">
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
                      
                  </div>
                  <script type="text/javascript">
				  	function GetValueCompany(){
						var id=document.getElementById("CompanyName").value;
				
						document.getElementById('txtcompanyName').value=id;
						}
					function GetValueCategory(){
						var CategoryName=document.getElementById("Category").value;
						document.getElementById('txtCategory').value=CategoryName;
						
					}
					function GetCompanyID(){
						var id=document.getElementById("CompanyName").value;
						return id;
					}
					
				  </script>
                    
                    
            </aside><!-- /.right-side -->
            
            
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
<?php include 'footer.php';?>