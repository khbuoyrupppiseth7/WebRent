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
						echo '
						<a href="Customer_Rent.php?Customer_RentID='.$Customer_RentID .'">
							<div class="panel panel-default" style="background-color:#F5F5F5;">
							  <div class="panel-body">
								<h4>
								'.$FullName.'
								<small style="color:red;"> &nbsp &nbsp &nbsp Pay Date :'.$PayDate.' &nbsp;Price : $' .$Price. '</small>
								<small class="right-side"><i class="glyphicon glyphicon-list-alt"></i>&nbsp&nbsp'.$ItemName.'</small>
								</h4>
								
							  </div>
							 </div>
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