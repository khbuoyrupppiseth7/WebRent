<aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php  echo $U_Acc; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
							
					
		
						
						 <li class="treeview">
                            <a href="#"><i class="fa fa-gear fa-fw"></i> <span>Setting</span>
							<i class="fa fa-angle-left pull-right"></i>
							</a>
									<ul class="treeview-menu">
										<?php
										if($_SESSION['Level']=='1')
										echo'<li><a href="Company.php"><i class="fa fa-angle-double-right"></i> Company</a></li>';
										echo'<li><a href="Category.php"><i class="fa fa-angle-double-right"></i> Category</a></li>';
										echo'<li><a href="RentItem.php"><i class="fa fa-angle-double-right"></i> Rent Item</a></li>';
										echo'<li><a href="Customer.php"><i class="fa fa-angle-double-right"></i> Customer</a></li>';
										echo'<li><a href="Customer_Rent.php"><i class="fa fa-angle-double-right"></i> Customer Rent</a></li>';
										echo'<li><a href="Customer_Rent_Detail.php"><i class="fa fa-angle-double-right"></i> Customer History</a></li>';
										?>
									</ul>
                        </li>
		
						
						
					
						
						<li class="treeview">
                            <a href="userAccount.php">
                                <i class="fa fa-user fa-fw"></i> <span>User Account</span>
								<i class="fa fa-angle-left pull-right"></i>
                            </a>
					
									<ul class="treeview-menu">
										<?php
										if($_SESSION['Level']=='1')
										echo'<li><a href="userAccount.php"><i class="fa fa-angle-double-right"></i>User</a></li>';
										echo'<li ><a class="iframe_Changepwd" href="UserChangePassword.php"><i class="fa fa-angle-double-right"></i> Change Password</a></li>';
										echo'<li><a href="logout.php"><i class="fa fa-angle-double-right"></i> Logout</a></li>';
										?>
									</ul>
						
						</li>
                        
                    </ul>
			
                </section>
                <!-- /.sidebar -->
            </aside>