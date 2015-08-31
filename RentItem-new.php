<?php include 'header.php';

$CompanyIDTemp=get('CompanyID');
$getCompanyTemp=get('CompanyName');
$CategoryNameTemp=get('CategoryName');
$CategoryIDTemp=get('CatID');
//==================== Insert New Category ======================

if(isset($_POST['btnSave'])){
		if($_SESSION['Level']!='1' )
		$cboCompany=$getComIDUser;
		else
		$cboCompany		=   get('CompanyID');
		$cboCategory	=   get('CatID');
		$txtItem		=	post('txtItem');
		$txtPrice		=   post('txtPrice');
		$txtStatus		= 	post('Status');
		$txtDescrpiton	=	post('txtDescrpiton');
		
		$insert=$db->query("CALL sp_RentItem_Insert (
										'".time()."',
										'".$cboCompany."',
										N'".sql_quote($txtItem)."',
										'".$cboCategory."',
										".$txtPrice.",	
										".$txtStatus.",
										N'".sql_quote($txtDescrpiton)."',
										@Insert
										);
										");
	
									$Ins=$db->query(" select @Insert;");	
										$Result= mysql_fetch_row($Ins);
										$In =implode(" ",$Result);
										if($In==1)
											cRedirect('RentItem.php');
										else if($In==0)
											echo'<script>alert("ItemName has exited already");</script>';
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
			   
		
		//========================
	
			   
		</script>
		
	</head>
    <body class="skin-blue" >
	<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side" >
                <!-- Content Header (Page header) -->
                <section class="content-header" >
                <div class="row"  style="margin: 0 auto; >
                   <div class="col-xs-8"  >
                    <form role="form" method="post" enctype="multipart/form-data" >
						
						<table  style="margin: 0 auto;" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<tbody>								
							  <tr> <h3><i class="glyphicon glyphicon-file">New</em></i></h3></tr>
							  <?php 
							  if($_SESSION['Level']=='1'){
							   echo'<tr>';	
								echo'<td  class="col-md-2 text-center">';
								echo'<div class="dropdown">';
								 echo '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
									Choose Company
									<span class="caret"></span>
								  </button>';
								  echo '<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">';
									
											$db->connect();
											  $select=$db->query("CALL sp_Company_Select('')");
												$rowselect=$db->dbCountRows($select);
												if($rowselect>0){
													while($row=$db->fetch($select)){
													$CompanyID = $row->CompanyID;
													$CompanyName = $row->CompanyName;
														echo'<li role="presentation"><a role="mmenuitem" tabindex="-1"
														href="RentItem-new.php?CompanyID='.$CompanyID.'&CompanyName='.$CompanyName.'">'.$CompanyName.'</a></li>';
													}
												}
											$db->disconnect();
											
										
									  echo'</ul>';
									
									 
									echo'</div>';	
								    echo'</td>';
								   ?>
								<td class="col-md-10 text-center"> <input type="text" class="form-control" <?php echo 'value="'.$getCompanyTemp.'"'; ?> readonly></td>
							  <?php echo '</tr>';	}?>	
							   
							<tr>
							  <td  class="col-md-2 text-center">
								<div class="dropdown">
								  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-expanded="true">
									Choose Category
									<span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3">
									<?php
											$db->connect();
											if($_SESSION['Level']=='1')
											    $select=$db->query("SELECT CategoryID,CategoryName FROM tblcategory WHERE CompanyID='".$CompanyIDTemp."' ");
											else 
												$select=$db->query("SELECT CategoryID,CategoryName FROM tblcategory WHERE CompanyID='".$getComIDUser."' ");	
											$rowselect=$db->dbCountRows($select);
												if($rowselect>0){
													
													while($row=$db->fetch($select)){
													$CategoryID = $row->CategoryID;
													$CategoryName = $row->CategoryName;
														echo'<li role="presentation"><a role="mmenuitem" tabindex="-1" 
														href="RentItem-new.php?CompanyID='.$CompanyIDTemp.'&CompanyName='.$getCompanyTemp.'&CatID='.$CategoryID.'&CategoryName='.$CategoryName.'">'.$CategoryName.'</a></li>';
													}
												}
											$db->disconnect();
											
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
							
								<input name="txtItem" class="form-control" placeholder="Enter text"  required />
                            </div>
							 	
							<div class="form-group">
                                <label>Price</label>
							
								<input name="txtPrice" class="form-control" placeholder="Enter Number" onkeypress="return isNumberKey(event)"  required />
                            </div>
							
							<div class="form-group">
                                <label>Status</label><br/>
							<!--	<input name="txtisLeave" class="form-control" placeholder="Enter text" required /> -->
								<input type="radio" name="Status" value="1" checked class="form-control">Free
								<input type="radio" name="Status" value="0"  class="form-control">Busy
								
                            </div>
							
							<div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="txtDescrpiton" id="editor1" rows="3"></textarea>
                            </div>
										
                            <div class="modal-footer">
                            <a href="RentItem.php">
                            <button type="button" class="btn btn-default" data-dismiss="modal" onClick='parent.jQuery.fn.colorbox.close();'>Close</button>
                            </a>
                            <input type="submit" name="btnSave" class="btn btn-primary" value="Save" onClick='parent.jQuery.fn.colorbox.close();'/>
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