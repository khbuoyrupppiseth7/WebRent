<?php include 'header.php';

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
		
		if($txtLiveTime == 'Yes')
		{
			//cRedirect('http://google.com/');
			$insert=$db->query("INSERT INTO tbldns
				(dnsID, dnsName, DateFrom, DateTo, IsLiveTime, CusName, CusPhone, CusAddress, CusDesc)
				VALUES(
				'".time()."',
				N'".sql_quote($txtDNS)."',
				N'".sql_quote($txtFromDate)."',
				N'2100-01-01',
				N'2100-01-01',
				N'".sql_quote($tCusName)."',
				N'".sql_quote($txtPhone)."',
				N'".sql_quote($txtAddress)."',
				N'".sql_quote($txtDesc)."'
				)");
			
			if($insert){
				cRedirect('dns.php');
			}
		}
		else
			{
			$insert=$db->query("INSERT INTO tbldns
					(dnsID, dnsName, DateFrom, DateTo, IsLiveTime, CusName, CusPhone, CusAddress, CusDesc)
					VALUES(
					'".time()."',
					N'".sql_quote($txtDNS)."',
					N'".sql_quote($txtFromDate)."',
					N'".sql_quote($Thisyear)."',
					N'',
					N'".sql_quote($tCusName)."',
					N'".sql_quote($txtPhone)."',
					N'".sql_quote($txtAddress)."',
					N'".sql_quote($txtDesc)."'
					)");
				
				if($insert){
					cRedirect('dns.php');
				}
		}
		$error = "Error for Create New User.";
		
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
				
								<div class="row">
						   <div class="col-xs-8">
							<form role="form" method="post" enctype="multipart/form-data">
								  <div class="form-group">
									<label>DNS Name:</label>
										<input name="txtDNS" class="form-control" placeholder="Enter text" required />
								  </div>
								  <div class="form-group">
										<label>Start Date:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" name="txtFromDate" class="form-control pull-right" id="datemask"/>
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
										<input name="txtCusName" class="form-control" placeholder="Enter text"  />
								   </div>
								   
								   <div class="form-group">
									<label>Phone Number:</label>
										<input name="txtPhone" class="form-control" placeholder="Enter text"  />
								   </div>
								   
								   <div class="form-group">
									<label>Address:</label>
										<input name="txtAddress" class="form-control" placeholder="Enter text"  />
								   </div>
								   
								   <div class="form-group">
									<label>Description:</label>
										<input name="txtDesc" class="form-control" placeholder="Enter text"  />
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