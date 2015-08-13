<?php include 'header.php';?>
        <?php include 'nav.php';?>
        <?php include 'menu.php';?>

    <body class="skin-blue" >
		<div class="container" style="margin-left:130px;">
		<aside class="right-side">
            <section class="col-md-10 content-header">
			 <?php 
					$db->disconnect();
					$db->connect();
					//Call Select for New company
					$select3=$db->query("CALL spSelectCusPay()");	
					$rowselect3=$db->dbCountRows($select3);
						if($rowselect3>0){
							while($row1=$db->fetch($select3)){
								$Customer_RentID = $row1->Customer_RentID;
								$FullName = $row1->FullName;
								$ItemName = $row1->ItemName;
								$RentDate = $row1->RentDate;
								$PayDate = $row1->PayDate;
								$Price = $row1->Price;
								echo '
										<a href="Customer_Rent.php?Customer_RentID='.$Customer_RentID .'">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example">
											<tbody>	
											<tr>
												<td class="col-md-2">
												<h4>
													'.$FullName.'
													<small class="right-side"><i class="fa fa-clock-o"></i>'.$ItemName.'</small>
												</h4>
													<p>Pay Date :'.$PayDate.' &nbsp;Price : $' .$Price. '</p>
												</td>
											</tr>
											</tbody>
										</table>
										</a>
									';
											
							}
											
					}
			?>
			</select>
		</aside>
		</div>
	</body>
<?php include 'footer.php';?>