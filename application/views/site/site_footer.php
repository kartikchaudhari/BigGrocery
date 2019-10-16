<style type="text/css">white{color:white;} hover{color:#FAB005;}.footer-nav{list-style: none;display: inline;line-height: 1;}</style>
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 footer-grid ">
				<h3>BigGrocery</h3>
				<ul>
					<li><a href="<?=site_url('site/about');?>">About us</a></li>
					<li><a href="<?=site_url('site/privacy');?>">Privacy Policy</a></li>
					<li><a href="<?=site_url('#');?>">Affiliate</a></li>
					<li><a href="<?=site_url('service/terms');?>">Terms & Conditions</a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-grid ">
				<h3>Help</h3>
				<ul>
					<li><a href="<?=site_url('service/faq');?>">Faqs</a></li>
					<li><a href="<?=site_url('service/shipping');?>">Shipping</a></li>
					<li><a href="<?=site_url('site/contact');?>">Contact</a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-grid">
				<h3>Developers</h3>
				<ul>
					<li><a href="<?php echo site_url('rest_server'); ?>">API</a></li>
					<?php if (file_exists(FCPATH.'documentation/index.html')) : ?>
	        		<li><a href="<?php echo base_url('documentation/index.html'); ?>" target="_blank">API Documentation</a></li>
	        		<?php endif ?>
				</ul>
			</div>
			<div class="col-md-3 footer-grid">
				<h3>Get Social With Us</h3>
					<ul class="social-fo" style="text-align: center;">
						<li><a href="#" class="face">
								<white><i class="fa fa-facebook" aria-hidden="true"></i></white>
							</a>
						</li>
						<li>
							<a href="#" class="twi">
								<white><i class="fa fa-twitter" aria-hidden="true"></i></white>
							</a>
						</li>
						<li>
							<a href="#" class="pin">
								<white><i class="fa fa-pinterest-p" aria-hidden="true"></i></white>
							</a>
						</li>
						<li>
							<a href="#" class="dri">
								<white><i class="fa fa-dribbble" aria-hidden="true"></i></white>
							</a>
						</li>
					</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<br>
		<div class="row" style="border-top:1px solid white;padding-top: 20px;">
			<div class="col-md-2"><span><hover>POPULAR CATEGORIES:</hover></span></div>
			<div class="col-sm-9 col-md-9 col-lg-9 footer-grid">
				<ul>
					<?php
						$x="Fruits & Vegetables, Basmati Rice, Green Tea, OTC, Cheese, Dry Fruits, Foodgrains, Oil & Masala, Chocolates & Sweets, Soft Drinks, Energy Drinks, Bakery, Cakes & Dairy, Olive Oils, Sunflower Oils, Liquid Soaps & Bars ";
						$y=explode(",", $x);
						for($i=0;$i<count($y);$i++){
							echo "<li class='footer-nav'><a href='".site_url('site/about')."'>".$y[$i]."</a>, </li>";
						}
					?>
				</ul>
			</div>
		</div>
		<div class="row" style="padding-top: 20px;">
			<div class="col-md-2"><span><hover>POPULAR BRANDS:</hover></span></div>
			<div class="col-sm-9 col-md-9 col-lg-9 footer-grid">
				<ul>
					<?php
						$x="Amul,Haldirams ,Tropicana,Kelloggs,Dettol,MTR,Bru ,McCain,Ariel ,Britannia,Nescafe , Colgate,Horlicks,Galaxy,Complan";
						$y=explode(",", $x);
						for($i=0;$i<count($y);$i++){
							echo "<li class='footer-nav'><a href='".site_url('site/about')."'>".$y[$i]."</a>, </li>";
						}
					?>
				</ul>
			</div>
		</div>
		<div class="row" style="padding-top: 20px;">
			<div class="col-md-2"><span><hover>CITIES WE SERVE:</hover></span></div>
			<div class="col-sm-9 col-md-9 col-lg-9 footer-grid">
				<ul>
					<?php
						$x="Bangalore,Hyderabad,Mumbai,Pune,Chennai,Delhi,Mysore,Coimbatore,Vijayawada-Guntur,Kolkata,Ahmedabad-Gandhinagar,Lucknow-Kanpur,Gurgaon,Vadodara,Visakhapatnam,Surat,Nagpur,Patna,Indore,Chandigarh Tricity,Jaipur,Bhopal,Noida-Ghaziabad";
						$y=explode(",", $x);
						for($i=0;$i<count($y);$i++){
							echo "<li class='footer-nav'><a href='".site_url('site/about')."'>".$y[$i]."</a>, </li>";
						}
					?>
				</ul>
			</div>
		</div>
		<div class="row" style="padding-top: 20px;">
			<div class="col-md-2"><span><hover>PAYMENT OPTIONS:</hover></span></div>
			<div class="col-sm-9 col-md-9 col-lg-9 footer-grid">
				<ul>
					<?php
						$x="visa, master, payu,paytm";
						$y=explode(",", $x);
						for($i=0;$i<count($y);$i++){
							echo "<li class='footer-nav'><i class='payment ".$y[$i]."'> </i></li>";
						}
					?>
					
				</ul>
			</div>
		</div>
		<div class="footer-bottom">
				<div class="logo">
					<h1>
						<a href="<?=site_url('home');?>" title="Home :: The BigGrocery ">
							<b>T<br>H<br>E</b>
							&nbsp;<white>BigGrocery</white>
							<span><white>The Best Supermarket</white></span>
						</a>
					</h1>
				</div>
		</div>
		<div class="copy-right">
			<p> &copy; 2020 BigGrocery. All Rights Reserved. | Designed and Developed by Kartik Chaudhari</p>
		</div>
	</div>

<script type="text/javascript" src="<?=site_url('assets/js/bootstrap.js');?>"></script>