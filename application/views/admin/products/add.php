	<style>
		.hide_s{display: none;}
		.show_s{display: block;}
	</style>
	<?php 
		if ($this->session->flashdata('bg_sys_msg')) {
			echo $this->session->flashdata('bg_sys_msg');
		}
	?>
	<hr>
	<?=form_open_multipart(base_url('products/doAddProduct'));?>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<select class="form-control" id="product_cat" name="product_cat">
					<option value="-1" selected="selected">--- Select Product Category ---</option>
					<?php 
						for ($i=0;$i<count($product_cat); $i++) { 
							echo "<option value='".$product_cat[$i]['cat_id']."'>".$product_cat[$i]['cat_name']."</option>";
						}
					?>
				</select>
			</div>
			<div class="col-md-4">
				<select class="form-control" id="product_sub_cat" name="product_sub_cat">	
					<option value='-1' selected='selected'>--- Select Sub Category ---</option>
				</select>
			</div>
			<div class="col-md-4">
				<?php 
					$attr=array('name'=>'product_name','value'=>set_value('product_name'),'class'=>'form-control','placeholder'=>'Product Name');
						echo form_input($attr);
					?>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<?php
					$attr=array('name'=>'product_company', 'value'=>set_value('product_company'),'class'=>'form-control','placeholder'=>'Product Company Name');
					echo form_input($attr);
				?>	
			</div>
			<div class="col-md-4">
				<span>Product Thumbnail:</span>
				<input type="file" name="product_thumb_image">
			</div>
			<div class="col-md-4">
				<span>Product Full Image: </span>
				<input type="file" name="product_image_full">
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<div style="width:310spx;border: 1px solid gray;border-radius: 5px;padding-left: 15px;padding-right: 15px;padding-bottom: 6px;padding-top: 6px;">
					<?php 
						$edibleProduct=array('name'=>'isEdible','type'=>'radio','value'=>1,'onClick'=>'ShowOptions();');
						echo form_input($edibleProduct)."  <span>Edible</span>";
					?>
					&nbsp;&nbsp;&nbsp;
					<?php 
						$NonedibleProduct=array('name'=>'isEdible','type'=>'radio','value'=>0,'onClick'=>'HideOptions();');
						echo form_input($NonedibleProduct)."  <span>Non-edible</span>";
					?>
					<div class="hide_s" id="vegNonVegChooser" style="position: relative;padding: 0px;border:1px dashed red;margin:6px;">
						<input type="radio" name="veg_nonveg" value="0">
						<span style="margin-left: 5px;">Vegitarian</span>
						&nbsp;&nbsp;
						<input type="radio" name="veg_nonveg" value="1">
						<span style="margin-left: 5px;">Non-vegitarian</span>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<?=form_input(array('name'=>'product_weight','type'=>'number','class'=>'form-control','placeholder'=>'Product Weight'));?>
			</div>
			<div class="col-md-4">
				<?php  
					$options = array(
						'-- Select Unit --'=>'-- Select Unit --',
			        	'gm'=> 'Gram (gm)',
			        	'kg'=> 'Kilogram (kg)',
			        	'ml'=> 'Mililiter (ml)',
			        	'ltr'=> 'Liter (ltr)',
			        	'pcs'=>'Pices (pcs)'	
					);
				echo form_dropdown('weight_unit', $options,NULL,'class="form-control"');
				?>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<?=form_input(array('name'=>'product_discount','type'=>'number','class'=>'form-control','placeholder'=>'Product Discount'));?>
			</div>
			<div class="col-md-4">
				<?=form_input(array('name'=>'product_price','type'=>'number','class'=>'form-control','placeholder'=>'Product Price'));?>
			</div>
			<div class="col-md-4" style="border: 1px solid #aab2bd;padding-left: 15px;padding-right: 10px;padding-top: 4px;width: 310px;height: 34px;margin-left:16px;border-radius: 4px;">
				<label>Offers ?  </label>
					<?=form_input(array('name'=>'has_offers','type'=>'radio','value'=>'1'));?>Yes 
					<label id="lblOffers">
						<button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Link</button>
					</label>
					<?=form_input(array('name'=>'has_offers','type'=>'radio','value'=>'0'));?>No
					
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-8">
				<?php 
					$value='<h4>Heading</h4><hr><p id="prod_abt_desc">Some Test</p><br><br><h4>Heading2</h4><hr><p>Some text</p><br><br>';
					echo form_textarea(array('id'=>'editor-remove-me','name'=>'product_desc','rows'=>6,'cols'=>60,'style'=>'overflow-y:scroll;','value'=>$value,'class'=>'form-control'));?>
			</div>
			<div class="col-md-4">
				<?=form_input(array('name'=>'product_stock','type'=>'number','class'=>'form-control','placeholder'=>'Product Stock'));?><br>
				<?=form_input(array('type'=>'submit','value'=>'Add Product','class'=>'btn btn-success btn-lg'));?>
				&nbsp;<strong>&middot;</strong>&nbsp;
				<?=form_input(array('type'=>'reset','value'=>'Reset','class'=>'btn btn-danger btn-lg'));?>
			</div>
			
		</div>
	</div>
	
	<!-- product offers model -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Add Offer to This Product</h4>
	      		</div>
	      		<div class="modal-body">
					<div class="col-md-4">
						<?php 
							$attr=array('name'=>'offer_name','value'=>set_value('offer_name'),'class'=>'form-control','placeholder'=>'Offer Name');
								echo form_input($attr);
						?>
					</div>
					<div class="col-md-4">
						<?php 
							$attr=array('name'=>'offer_price','value'=>set_value('offer_price'),'class'=>'form-control','placeholder'=>'Offer Name','type'=>'number');
								echo form_input($attr);
						?>
					</div>
  				</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Add Offers</button>
	      		</div>
	    	</div>
	  	</div>
	</div>
	<!--/product offers model -->
	
	<?=form_close();?>


	<!-- load the js -->
    <script type="text/javascript" src="<?=base_url(BOOTFLAT_DIST_JS_FILE);?>"></script>
    <?php $this->load->view('admin/common/jquery'); ?>
	<script type="text/javascript">
		function addOffers(){
			$("#myModal").modal();
		}

		function ShowOptions(){
			$('#vegNonVegChooser').fadeIn();
		}	

		function HideOptions(){
			$('#vegNonVegChooser').fadeOut();
		}

		$(document).ready(function() {
			$("#product_cat").change(function(){
				var product_cat_id=$("#product_cat").val();
				if (product_cat_id!="") {
					$.ajax({
						url: '<?=base_url('sub_categories/getAllSubCatByCatId');?>',
						type: 'POST',
						data: {cat_id: product_cat_id},
						success:function(data){
							$("#product_sub_cat").html(data);
						}
					})
				}
			});
	
		});
	</script>
</body>
</html>