<?php include 'header.php';
$id=get('id');
$error = "";
	
	if(isset($_POST['btnSave'])){
		
		$txtDNS	=	post('txtDNS');
		$txtFromDate    =	post('txtFromDate');
		$txtToDate	=	post('txtToDate');
		$txtLiveTime	=	post('txtLiveTime');
		$txtCusName	        =	post('txtCusName');
		$txtPhone	    =	post('txtPhone');
		$txtAddress	    =	post('txtAddress');
		$txtDesc	    =	post('txtDesc');
			
			$thisy = date("Y") + $txtToDate;
			$thism = date('m');
			$thisd = date('d');
			$Thisyear = $thisy.'-'.$thism.'-'.$thisd;
	
		$tCusName = encrypt_decrypt('encrypt', $txtCusName);
		
		$update=$db->query("call spUpdate_dns('".$id."',
											  '".$txtDNS."',
											  '".$txtFromDate."',
											  '".$Thisyear."',
											  '".$txtCusName."',
											  '".$txtPhone."',
											  '".$txtAddress."',
											  '".$txtDesc."');
											  ");
			
			if($update){
				cRedirect('dns.php');
			}
		
		$error = "Error for Update User.";
		
	}



?>

    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
         <?php  include 'nav.php';
		 $select0=$db->query("call spSelect_DnsByID('".$id."');");

	//$select=$db->query("Call spUserAccSeleteForUpdate('".$id."')");
	$numrow=$db->dbCountRows($select0);
	if($numrow>0){
		$row=$db->fetch($select0);
		$dnsID = $row->dnsID;
		$dnsName = $row->dnsName;
		$DateFrom=$row->DateFrom;
		$DateTo = $row->DateTo;
		$IsLiveTime = $row->IsLiveTime;
		$CusName = $row->CusName;
		$CusPhone = $row->CusPhone;
		$CusAddress = $row->CusAddress;
		$CusDesc = $row->CusDesc;
	}
		 ?>
        
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
                            <label>DNS Name:</label>
                                <input name="txtDNS" class="form-control" placeholder="Enter text" value="<?php echo $dnsName; ?>" required />
                          </div>
                          <div class="form-group">
                                <label>Start Date:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="<?php echo $DateFrom; ?>" name="txtFromDate" class="form-control pull-right" id="datemask"/>
                                    </div><!-- /.input group -->
                           </div><!-- /.form group -->
                           
                           
                           <div class="form-group">
                                <label>Choose Year</label>
                                <select class="form-control" name="txtToDate">
                                   <option value="1">1 Year</option>
                                   <option value="2">2 Years</option>
                                   <option value="3">3 Years</option>										
                                </select>
                                
                           </div>
                           
                           <div class="form-group">
                                <label>Is Live Time:</label>
                                <div class="input-group">
                                    <input type="checkbox" name="txtLiveTime" value="Yes" /> Click Here.
                                </div><!-- /.input group -->
                           </div><!-- /.form group -->
                           
                           <div class="form-group">
                            <label>Customer Name:</label>
                                <input name="txtCusName" class="form-control" value="<?php echo $CusName; ?>" placeholder="Enter text"  />
                           </div>
                           
                           <div class="form-group">
                            <label>Phone Number:</label>
                                <input name="txtPhone" class="form-control" value="<?php echo $CusPhone;?>" placeholder="Enter text"  />
                           </div>
                           
                           <div class="form-group">
                            <label>Address:</label>
                                <input type="text" name="txtAddress" value="<?php echo $CusAddress;?>" class="form-control" placeholder="Enter text"  />
                           </div>
                           
                           <div class="form-group">
                            <label>Description:</label>
                                <input name="txtDesc" class="form-control" value="<?php echo $CusDesc;?>" placeholder="Enter text"  />
                           </div>
                           
                            <div class="modal-footer">
                            <a href="dns.php">
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