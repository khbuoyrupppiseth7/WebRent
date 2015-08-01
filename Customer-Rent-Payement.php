<?php include 'header.php';

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
		$txtPayDate	   =	post('txtPayDate');
		$txtRealPayDate =   post('txtRealPayDate');
		$txtPrice 		=	post('txtPrice');
		$txtElectric 	=	post('txtElectric');
		$txtWater 		=	post('txtWater');
		$txtGarbage 	=	post('txtGarbage');
		$txtOther 		=	post('txtOther');
		$txtTotal 		=	post('txtTotal');	 
			
		if($UserID=="1"){
			$payment=$db->query("CALL sp_Customer_Rent_Payment_Insert(
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
			if($payment){
				cRedirect('Customer_Rent.php');	
				$db->query(" UPDATE tblcustomer_rent SET isPaid=0  WHERE Customer_RentID='".$Customer_RentID."'");
				$db->query(" Update tblrentitem set isStatus=1 where RentItemID='".$RentItemID."'");
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
		</script>
	</head>
    <body class="skin-blue">
       
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <div class="row" style="margin: 0 auto;>
                   <div class="col-xs-8">
                    <form role="form" method="post" enctype="multipart/form-data" id="myForm">
                     		  <label><h3>Payment</h3></label>				  
						    <div class="form-group">
                             <label>Pay Date</label>
							<!--	<input name="txtPayDate" class="form-control" placeholder="Enter text" required /> -->
									<input type="text" name="txtPayDate" class="form-control" value="<?php echo $txtPayDate	; ?>" readonly/>
                            </div>
							<div class="form-group">
							<label>Real Pay Date</label>
							<!--	<input name="txtPayDate" class="form-control" placeholder="Enter text" required /> -->
									<input type="text" id="RealPayDate" name="txtRealPayDate" class="form-control" <?php $datenow=date("Y-m-d"); echo 'value="'.$datenow.'"'; ?>/>
                            </div>
								<?php $Price=get('Price');	?>					
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
							<input type="submit" name="btnSave" style="float:right;"  class="btn btn-primary" value="Save" onClick='parent.jQuery.fn.colorbox.close();'/>
                            <button type="button" class="btn btn-default" style="float:right;" onClick='parent.jQuery.fn.colorbox.close();'>Close</button>
                            
                         
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
    		
		$('#RealPayDate').datetimepicker({
            timepicker: false, //visible time = false
            format: 'Y-m-d',
            step: 10
        });
		
		
    </script>
	<!-- Event KeyPress -->
	<script type="text/javascript">
            $("#myForm input").each(function(){
                $(this).keyup(function(){
                    var Price = $("#Price").val();
                    var Electric = $("#Electric").val();
                    var Water = $("#Water").val();
                    var Garbage = $("#Garbage").val();
                    var Other = $("#Other").val();
                    Price = $.isNumeric(Price)?Price:0;
                    Electric = $.isNumeric(Electric)?Electric:0;
                    Water = $.isNumeric(Water)?Water:0;
                    Garbage = $.isNumeric(Garbage)?Garbage:0;
                    Other = $.isNumeric(Other)?Other:0;
                    $("#Total").val(parseFloat(Price)+parseFloat(Electric)+parseFloat(Water)+parseFloat(Garbage)+parseFloat(Other));
                });
            });
        </script>
		
		
<?php include 'footer.php';?>