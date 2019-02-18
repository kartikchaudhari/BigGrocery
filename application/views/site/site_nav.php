<?php $this->load->helper(['site']); ?>	
<div class="nav-top" style="background-color:#353535;">
					<nav class="navbar navbar-default">
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav ">
							<li ><a href="<?=base_url('home');?>" class="hyper"><span>Home</span></a></li>	
							
							<li  class="dropdown ">
								<a href="#" class="dropdown-toggle  hyper" data-toggle="dropdown" ><span>Kitchen<b class="caret"></b></span></a>
								<ul class="dropdown-menu multi">
									<div class="row">
										<div class="col-12">
											<div class="table-responsive">
												<table width="100%" border="0" style="text-align: left;">
													<tr>
														<?php
															$i=1;
															$SubCategories=DisplayKitchenSubCategories();
															if (count($SubCategories)>1) {
																foreach ($SubCategories as $key => $value) {
																	if($i%5==0){
																		echo "<tr></tr>";
																	
																	}
																	echo "<td><li><i class='fa fa-angle-right' aria-hidden='true'></i> <a href='".base_url('products/view_products/'.$value['sub_cat_id'].'')."' title='".$value['sub_cat_name']."'> ".$value['sub_cat_name']." </li></td>";
																	$i++;
																}	
															}
															else{
																echo "<strong>No Sub Categories here.</strong>";
															}
															
														?>
													<tr>
												</table>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>	
								</ul>
							</li>
							<li class="dropdown">
							
								<a href="#" class="dropdown-toggle hyper" data-toggle="dropdown" ><span> Personal Care <b class="caret"></b></span></a>
								<ul class="dropdown-menu multi multi1">
									<div class="row">
										<div class="col-12">
											<div class="table-responsive">
												<table width="100%" border="0" style="text-align: left;">
													<tr>
														<?php
															$i=1;
															$SubCategories=DisplayPersonalCareSubCategories();
															if (count($SubCategories)>0) {
																foreach ($SubCategories as $key => $value) {
																if($i%5==0){
																	echo "<tr></tr>";
																	
																}
																echo "<td><li><i class='fa fa-angle-right' aria-hidden='true'></i> <a href='".base_url('products/view_products/'.$value['sub_cat_id'].'')."' title='".$value['sub_cat_name']."'> ".$value['sub_cat_name']." </li></td>";
																$i++;
															  }
															}
														?>
													<tr>
												</table>
											</div>
										</div>

										<div class="clearfix"></div>
									</div>	
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle hyper" data-toggle="dropdown" ><span>Household<b class="caret"></b></span></a>
								<ul class="dropdown-menu multi multi2">
									<div class="row">
										<div class="col-12">
											<div class="table-responsive">
												<table width="100%" border="0" style="text-align: left;">
													<tr>
														<?php
															$i=1;
															$SubCategories=DisplayHouseHoldSubCategories();
															if (count($SubCategories)>0) {
																foreach ($SubCategories as $key => $value) {
																	if($i%5==0){
																		echo "<tr></tr>";
																	}
																	echo "<td><li><i class='fa fa-angle-right' aria-hidden='true'></i> <a href='".base_url('products/view_products/'.$value['sub_cat_id'].'')."' title='".$value['sub_cat_name']."'> ".$value['sub_cat_name']." </li></td>";
																	$i++;
																}
															}
														?>
													<tr>
												</table>
											</div>
										</div>

										<div class="clearfix"></div>
									</div>	
								</ul>
							</li>
							<li><a href="<?=base_url('contact');?>" class="hyper"><span>Contact Us</span></a></li>
							<?php 
								if ($this->session->userdata('bg_sys_ss_user_id')) {
									echo "<li><a href=".base_url('user/dashboard')." class='hyper'><i class='fa fa-dashboard'></i>&nbsp;&nbsp;<span>Dashboard</span></a></li>";
								}
							?>
						</ul>
					</div>
					</nav>
					 <div class="cart" >
						<span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
					</div>
					<div class="clearfix"></div>
			</div>