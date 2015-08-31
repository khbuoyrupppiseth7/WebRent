<?php include 'header.php';?>
        <?php include 'nav.php';?>
        <?php include 'menu.php';?>

    <body class="skin-blue" >
			<div class="container" >
			<aside class="right-side">
			<div class="panel-body">
               <div class="dataTable_wrapper">
                    <!-- Table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
		
				  <h2 ><i class="glyphicon glyphicon-envelope">SeeAll</i></h2>
				  <table class="table table-striped table-hover" style="border: 2px solid #DCDCDC;">
					<thead colspan="12">
					  <tr style="background-color:#4682B4; color:white;">
						<th>Customer Name</th>
						<th>PayDate</th>
						<th>Rent Item</th>
						<th>Price</th>
					  </tr>
					</thead>
					<tbody>
					 
						<?php 
							$db->disconnect();
								$db->connect();
								//Call Select for New company
								$select3=$db->query("CALL spSelectCusPay('".$getComIDUser."')");	
								$rowselect3=$db->dbCountRows($select3);
									if($rowselect3>0){
										while($row1=$db->fetch($select3)){
											$Customer_RentID = $row1->Customer_RentID;
											$FullName = $row1->FullName;
											$ItemName = $row1->ItemName;
											$RentDate = $row1->RentDate;
											$PayDate = $row1->PayDate;
											$Price = $row1->Price;
							echo '<tr>
								
										  
									<td><a href="Customer_Rent.php?Customer_RentID='.$Customer_RentID .'">'.$FullName.'</a></td>
									<td>'.$PayDate.'</td>
									<td>'.$ItemName.'</td>
									<td>$' .$Price. '</td>
								
					        </tr>';
							}
						}
						?>
					 
					</tbody>
				  </table>
				</div>
			</div>
		  </div>
		  </div>
		
		
		
						
		
		</aside>
		</div>
	</body>
<?php include 'footer.php';?>