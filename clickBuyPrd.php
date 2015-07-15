<?php include 'header.php';
				
		$ProductID = get('ProductID');	
		$ProductName = get('ProductName');
		$ProductCategoryID = get('ProductCategoryID');
		$ProductCode = get('ProductCode');
		$QTY = get('QTY');
		$BuyPrice = get('BuyPrice');
		$SalePrice = get('SalePrice');	
		$sarchprd = get('sarchprd');									
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
							'".$ProductID."',
							N'".sql_quote($ProductName)."',
							N'".sql_quote($ProductCategoryID)."',
							N'".sql_quote($ProductCode)."',
							N'".sql_quote($QTY)."',
							N'".sql_quote($BuyPrice)."',
							N'".sql_quote($SalePrice)."'
							);
							");
			
			if($insert){
				cRedirect('index.php?sarchprd='.$sarchprd);
			}
			else
			{
			$error = "Error Internet Connection!";
			}
	
?>
