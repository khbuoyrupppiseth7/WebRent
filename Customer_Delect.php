<?php include 'header.php';
$CustomerRent_ID=get('id');
$Customer_Name=get('Customer_Name');
$dateCancel=date("y-m-d");

	$db->connect();
	$Update=$db->query("Update customer_rent_pay set IsCancel=0,UserCancel='".$Customer_Name."',
							CancelDate='".$dateCancel."' where Customer_RentID='".$CustomerRent_ID."';");
							
		if(Update){
			cRedirect('Customer_Rent_Detail.php');
		}
	$db->disconnect();
?>
<?php include 'footer.php';?>