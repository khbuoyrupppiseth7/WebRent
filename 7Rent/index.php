
<?php include 'header.php';?>

<?php
	// Add new product to Produtct Tem
	if(isset($_POST['btnAddNewPrd'])){
		$txtprdname = $_POST['txtprdname'];
		$txtcode	=	post('txtcode');
		$txtqty    =	post('txtqty');
		$ProductCategoryID    =	post('cboPrdCate');
		$txtbuyprice	=	post('txtbuyprice');
		$txtsaleprice	=	post('txtsaleprice');
		$cboBranch = post('cboBranch');
		
		$insert=$db->query("INSERT INTO tblprdtem (
							IP
							, ProductID
							, ProductName
							, ProductCategoryID
							, ProductCode
							, QTY
							, BuyPrice
							, SalePrice)
							VALUES(
							'".$ip."',
							'".time()."',
							N'".sql_quote($txtprdname)."',
							N'".sql_quote($ProductCategoryID)."',
							N'".sql_quote($txtcode)."',
							N'".sql_quote($txtqty)."',
							N'".sql_quote($txtbuyprice)."',
							N'".sql_quote($txtsaleprice)."'
							);
							");
			
			if($insert){
				cRedirect('index.php');
			}
		
		$error = "Error Internet Connection!";
		
		}
	
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
                       
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
               
                 <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <div class="row">
                                                    
                                                    <div class="col-md-3">
                                                      	<button type="button" class="glyphicon glyphicon-plus btn btn-primary"  data-toggle="modal" data-target="#NewUser"></button>
                                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                                            Choose branch
                                                            <span class="caret"></span>
                                                          </button>
                                                          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                                           
                                                            <?php
                                                                $select=$db->query("SELECT BranchID, BranchName FROM `tblbranch`;");
                                                                $rowselect=$db->dbCountRows($select);
                                                                if($rowselect>0){
                                                                    while($row=$db->fetch($select)){
                                                                    $BranchID = $row->BranchID;
                                                                    $BranchName = $row->BranchName;
                                                                        echo'<li role="presentation"><a role="menuitem" tabindex="-1" href="frmOrder.php?branchid='.$BranchID.'">'.$BranchName.'</a></li>';
                                                                    } 
                                                                }
                                                           ?>
                                                            
                                                          </ul>
                                                    </div>
                                                    
                                                    <div class="col-md-6 pull-center">
                                                      	
                                                            <button type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> 
  
														<?php
                                                            $select=$db->query("SELECT COUNT(ProductID) AS TotalOrder FROM `tblprdtem` WHERE IP = '".$ip."';");
                                                            $rowselect=$db->dbCountRows($select);
                                                            if($rowselect>0){
                                                                
                                                                while($row=$db->fetch($select)){
                                                                $TotalOrder = $row->TotalOrder;
                                                            
                                                                    echo'Total: ' . $TotalOrder;
                                                                }
                                                                
                                                            }
                                                       ?>
  </span>
</button>
													<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                                            All all Cart
                                                            <span class="caret"></span>
                                                          </button>
                                                          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                                           
                                                            <?php
                                                                $select=$db->query("SELECT ProductID , ProductName, count(ProductName) AS Total, QTY FROM `tblprdtem`  WHERE IP = '".$ip."' GROUP BY ProductID,  QTY, ProductName;");
                                                                $rowselect=$db->dbCountRows($select);
                                                                if($rowselect>0){
                                                                    while($row=$db->fetch($select)){
																	$ProductID = $row->ProductID;
                                                                    $ProductName = $row->ProductName;
                                                                    $QTY = $row->QTY;
																	$Total = $row->Total;
                                                                        echo'<li role="presentation"><a role="menuitem" tabindex="-1" href="#">'.$ProductName.' ( '.$Total.' ) </a> </li>';
                                                                    } 
                                                                }
                                                           ?>
                                                            
                                                          </ul>
                                                       
                                                    </div>
                                                    
                                                    <form  role="search">
                                                    <div class="col-md-3 pull-right">
                                                      	
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Search" value="<?php echo $sarchprd; ?>" name="sarchprd" autofocus>
                                                                <div class="input-group-btn">
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
                                            
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>QTY</th>
                                            <th>BuyPrice</th>
                                            <th>SalePrice</th>  
                                            <th>Total</th>
                                            <th>Order Action</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--<tr class="odd gradeX">
                                            <td>Trident</td>
                                            <td>Internet Explorer 4.0</td>
                                            <td>Win 95+</td>
                                            <td class="center">4</td>
                                            <td class="center">4</td>
                                        </tr>
                                        <tr class="even gradeC">
                                            <td>Trident</td>
                                            <td>Internet Explorer 5.0</td>
                                            <td>Win 95+</td>
                                            <td class="center">5</td>
                                            <td class="center">4</td>  
                                        </tr>-->
                                        
                                        <?php
										if($sarchprd == "")
										{
											$select=$db->query("SELECT 
															`tblproducts`.ProductID,
															`tblproducts`.ProductName,
															`tblproducts`.ProductCategoryID,
															tblproductcategory.ProductCategoryName,
															`tblproducts`.ProductCode,
															`tblproducts`.Qty,
															`tblproducts`.BuyPrice,
															`tblproducts`.SalePrice
															 FROM `tblproducts`
															INNER JOIN tblproductcategory
															ON tblproducts.ProductCategoryID = tblproductcategory.ProductCategoryID
															WHERE ProductName = N'%".$sarchprd."%' 
															OR ProductCategoryName = N'%".$sarchprd."%' ");
										}
										else
										{
											$select=$db->query("SELECT 
															`tblproducts`.ProductID,
															`tblproducts`.ProductName,
															`tblproducts`.ProductCategoryID,
															tblproductcategory.ProductCategoryName,
															`tblproducts`.ProductCode,
															`tblproducts`.Qty,
															`tblproducts`.BuyPrice,
															`tblproducts`.SalePrice
															 FROM `tblproducts`
															INNER JOIN tblproductcategory
															ON tblproducts.ProductCategoryID = tblproductcategory.ProductCategoryID
															WHERE ProductName LIKE N'%".$sarchprd."%' 
															OR ProductCategoryName LIKE N'%".$sarchprd."%' ");
										}
											
											$rowselect=$db->dbCountRows($select);
											if($rowselect>0){
												$i = 1;
												while($row=$db->fetch($select)){
												$ProductID = $row->ProductID;
												$ProductCategoryID = $row->ProductCategoryID;
												$ProductName = $row->ProductName;
												$ProductCategoryName = $row->ProductCategoryName;
												$ProductCode = $row->ProductCode;
												$Qty = $row->Qty;
												$BuyPrice = $row->BuyPrice;
												$SalePrice = $row->SalePrice;
												$x = $i++;
												echo'<tr class="even">
														<td>'.$ProductCategoryName.'</td>
														<td>'.$ProductName.'</td>
														<td>'.$ProductCode.'</td>
														<td>'.$Qty.'</td>
														<td class="center">'.$BuyPrice.'</td>
														<td class="center">'.$SalePrice.'</td> 
														<td class="center">100</td> 
														<td class="center">
														<a href="clickBuyPrd.php?ProductID='.$ProductID.'
														&ProductName='.$ProductName.'
														&ProductCategoryID='.$ProductCategoryID.'
														&ProductCode='.$ProductCode.'
														&QTY='.$QTY.'
														&BuyPrice='.$BuyPrice.'
														&SalePrice='.$SalePrice.'
														&sarchprd='.$sarchprd.'
														">
														<button type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
</button></a>
														</td>
													</tr>';
													
													
												} 
											}
											else
											{
												echo '<tr class="even">
														<td  colspan="8"><font size="+1" color="#CC0000"> No Products Selected.</font></td>
													
														</td>
													</tr>';	
											}
									   ?>    
                                             
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                      </div>
                        <!-- /.panel-body -->
                        <!-- New User -->
               <div class="modal fade" id="NewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">                    
                  <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                         
                      </div>
                      <div class="modal-body">
                        <form role="form" method="post">
                        
                          <!--<div class="form-group">
                                <label>Choose Branch</label>
                                <select class="form-control" name="cboBranch">
                                   
                               <?php
                                 /*	$select=$db->query("SELECT BranchID, BranchName FROM `tblbranch`;");
								  	$rowselect=$db->dbCountRows($select);
                                    if($rowselect>0){
                                        
                                        while($row=$db->fetch($select)){
                                        $BranchID = $row->BranchID;
                                        $BranchName = $row->BranchName;
                                            echo'<option value='.$BranchID.'>'.$BranchName.'</option>';
                                        }
                                        
                                    }*/
                               ?>
                                </select>
                                
                          </div>-->
                          <div class="form-group">
                                <label>Choose Category</label>
                                <select class="form-control" name="cboPrdCate">
                                   
                               <?php
                                 	$select=$db->query("SELECT ProductCategoryID, ProductCategoryName FROM `tblproductcategory`;");
								  	$rowselect=$db->dbCountRows($select);
                                    if($rowselect>0){
                                        
                                        while($row=$db->fetch($select)){
                                        $ProductCategoryID = $row->ProductCategoryID;
                                        $ProductCategoryName = $row->ProductCategoryName;
                                            echo'<option value='.$ProductCategoryID.'>'.$ProductCategoryName.'</option>';
                                        }
                                        
                                    }
                               ?>
                                </select>
                                
                          </div>
                          <div class="form-group">
                            	<label>Product Name: </label>
                                <input name="txtprdname" class="form-control" placeholder="Enter text" required />
                          </div>
                          <div class="form-group">
                                <label>Products Code:</label>
                                <input name="txtcode" class="form-control" placeholder="Enter text" />
                          </div>
                          <div class="form-group">
                                <label>Products QTY:</label>
                                <input name="txtqty" class="form-control" placeholder="Enter text" />
                          </div>
                          <div class="form-group">
                                <label>Buy Price:</label>
                                <div class="input-group"> 
                                <span class="input-group-addon">$</span>
                                <input type="number" name="txtbuyprice" value="1" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" />
                            	</div>
                          </div>
                          <div class="form-group">
                                <label>Sale Price:</label>
                                <div class="input-group"> 
                                <span class="input-group-addon">$</span>
                                <input type="number" value="1" name="txtsaleprice" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" />
                            	</div>
                          </div>
                     
                           <!--<div class="form-group">
                                <label>User Limit &nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <label class="radio-inline">
                                    <input type="radio" name="rdstatus" id="optionsRadiosInline1" value="1" checked>Active
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="rdstatus" id="optionsRadiosInline2" value="0">Suspend
                                </label>
                               
                            </div>
                        -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            
                            <input type="submit" name="btnAddNewPrd" class="btn btn-primary" value="Save" />
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End New User -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
<?php include 'footer.php';?>