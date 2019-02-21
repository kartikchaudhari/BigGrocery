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
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<?php
					$attr=array('name'=>'product_company', 'value'=>set_value('product_company'),'class'=>'form-control','placeholder'=>'Product Company Name');
					echo form_input($attr);
				?>	
			</div>
			<div class="col-md-4">
				<span>Product Thumbnail</span>
				<input type="file" name="product_thumb_image">
			</div>
			<div class="col-md-4">
				<input type="file" name="product_image_full">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
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
	</div>
	
		
		<table style="display: none;" border="1" align="center" width="92%;">
		<tr>
			<td align="right"><?=form_label('Product Description :');?></td>
			<td><?php 
					$value='<h4>Heading</h4><hr><p>Some Test</p><br><br><h4>Heading2</h4><hr><p>Some text</p><br><br>';
					echo form_textarea(array('id'=>'editor-remove-me','name'=>'product_desc','rows'=>6,'cols'=>60,'style'=>'overflow-y:scroll;','value'=>$value));?></td>
		</tr>
		<tr>
			<td align="right"><?=form_label('Product Weight :');?></td>
			<td>
				<?=form_input(array('name'=>'product_weight','type'=>'number'));?>
				&nbsp;
				<?php  
					$options = array(
						'-- Select Unit --'=>'-- Select Unit --',
			        	'gm'=> 'Gram (gm)',
			        	'kg'=> 'Kilogram (kg)',
			        	'ml'=> 'Mililiter (ml)',
			        	'ltr'=> 'Liter (ltr)',
			        	'pcs'=>'Pices (pcs)'	
					);
				echo form_dropdown('weight_unit', $options);
				?>
			</td>
		</tr>
		<tr>
			<td align="right"><?=form_label('Product Discount :');?></td>
			<td><?=form_input(array('name'=>'product_discount','type'=>'number'));?></td>
		</tr>
		<tr>
			<td align="right"><?=form_label('Product Price :');?></td>
			<td><?=form_input(array('name'=>'product_price','type'=>'number'));?></td>
		</tr>
		<tr>
			<td align="right"><?=form_label('Any offers on this Product ? :');?></td>
			<td><?=form_input(array('name'=>'has_offers','type'=>'radio','value'=>'1','onClick'=>'addOffers();'));?><span>Yes (add it later.)</span>&nbsp;&nbsp;&nbsp;&nbsp;<?=form_input(array('name'=>'has_offers','type'=>'radio','value'=>'0'));?><span>No</span></td>
		</tr>
		<tr>
			<td align="right"><?=form_label('Product Stock :');?></td>
			<td><?=form_input(array('name'=>'product_stock','type'=>'number'));?></td>
		</tr>
		<tr>
			<td align="right"><?=form_input(array('type'=>'submit','value'=>'Add Product'));?></td>
			<td><?=form_input(array('type'=>'reset','value'=>'Reset'));?>
			</td>
		</tr>
	</table>
	<?=form_close();?>

	<!-- load the js -->
    <?php $this->load->view('admin/common/jquery'); ?>
	<script type="text/javascript">
		function addOffers(){
			alert('Add Offers');
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