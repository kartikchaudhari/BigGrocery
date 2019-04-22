<?php
	function snacksOffer(){
		$ci=& get_instance();
		$ci->load->model('OffersModel');
		$data=$ci->OffersModel->getOfferedProducts(1,6);
		foreach ($data as $row) {
			if(count($data)>0){
				echo "<div class='col-md-3 m-wthree'>
					<div class='col-m'>								
						<a href='#' data-toggle='modal' data-target='#myModal1' class='offer-img'>
							<img src='".site_url($row['product_image_full'])."'' class='img-responsive' alt=''>
							<div class='offer'><p><span>offer</span></p></div>
						</a>
						<div class='mid-1'>
							<div class='women'>
								<h6><a href='".site_url('products/product_info/').$row['product_id']."'>".$row['product_name']."</a>(".$row['product_weight'].")</h6>							
							</div>
							<div class='mid-2'>
								<p><label>$2.00</label><em class='item_price'>".$ci->lang->line('rs')."1.50</em></p>
								  <div class='block'>
									<div class='starbox small ghosting'> </div>
								</div>
								<div class='clearfix'></div>
							</div>
							<div class='add'>
							   <button class='btn btn-danger my-cart-btn my-cart-b ' data-id='".$row['product_id']."' data-name='".$row['product_name']."' data-summary='summary 1' data-price='".$row['product_price']."' data-quantity='1' data-image='".site_url($row['product_image'])."' data-image-full='".site_url($row['product_image_full'])."'>Add to Cart</button>
							</div>
							
						</div>
					</div>
			 	</div>";
			}
			else{
				echo "<h3>No Offers Yet</h3>";
			}
		}
	}

	function fruitsVegOffer(){
		$ci=& get_instance();
		$ci->load->model('OffersModel');
		$data=$ci->OffersModel->getOfferedProducts(1,2);
		foreach ($data as $row) {
			if(count($data)>0){
				echo "<div class='col-md-3 m-wthree'>
						<div class='col-m'>								
						<a href='#' data-toggle='modal' data-target='#myModal1' class='offer-img'>
							<img src='".site_url($row['product_image_full'])."' class='img-responsive' alt=''>
							<div class='offer'><p><span>offer</span></p></div>
						</a>
						<div class='mid-1'>
							<div class='women'>
								<h6><a href='".site_url('products/product_info/').$row['product_id']."'>".$row['product_name']."</a>(".$row['product_weight'].")</h6>							
							</div>
							<div class='mid-2'>
								<p><label>$2.00</label><em class='item_price'>".$ci->lang->line('rs')."1.50</em></p>
								  <div class='block'>
									<div class='starbox small ghosting'> </div>
								</div>
								<div class='clearfix'></div>
							</div>
							<div class='add'>
							   <button class='btn btn-danger my-cart-btn my-cart-b ' data-id='".$row['product_id']."' data-name='".$row['product_name']."' data-summary='summary 1' data-price='".$row['product_price']."' data-quantity='1' data-image='".site_url($row['product_image'])."' data-image-full='".site_url($row['product_image_full'])."'>Add to Cart</button>
							</div>
							
						</div>
						</div>
			 		  </div>";
			}
			else{
				echo "<h3>No Offers Yet</h3>";
			}
		}
	}

	function breakCerelOffers(){
		$ci=& get_instance();
		$ci->load->model('OffersModel');
		$data=$ci->OffersModel->getOfferedProducts(1,5);
		foreach ($data as $row) {
			if($data!=NULL){
				echo "<div class='col-md-3 m-wthree'>
					<div class='col-m'>								
						<a href='#' data-toggle='modal' data-target='#myModal1' class='offer-img'>
							<img src='".site_url($row['product_image_full'])."'' class='img-responsive' alt=''>
							<div class='offer'><p><span>offer</span></p></div>
						</a>
						<div class='mid-1'>
							<div class='women'>
								<h6><a href='".site_url('products/product_info/').$row['product_id']."'>".$row['product_name']."</a>(".$row['product_weight'].")</h6>							
							</div>
							<div class='mid-2'>
								<p><label>$2.00</label><em class='item_price'>".$ci->lang->line('rs')."1.50</em></p>
								  <div class='block'>
									<div class='starbox small ghosting'> </div>
								</div>
								<div class='clearfix'></div>
							</div>
							<div class='add'>
							   <button class='btn btn-danger my-cart-btn my-cart-b ' data-id='".$row['product_id']."' data-name='".$row['product_name']."' data-summary='summary 1' data-price='".$row['product_price']."' data-quantity='1' data-image='".site_url($row['product_image'])."' data-image-full='".site_url($row['product_image_full'])."'>Add to Cart</button>
							</div>
							
						</div>
					</div>
			 	</div>";
			}
			else{
				echo "<h3>No Offers Yet</h3>";
			}
		}
	}
?>