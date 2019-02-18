<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<style>
		.hide{
			display: none;
		}

		.show{
			display: block;
		}
	</style>
	<script src="<?=base_url('assets/ckeditor/ckeditor.js')?>"></script>
	<script src="<?=base_url('assets/ckeditor/samples/js/sample.js')?>"></script>
	<link rel="stylesheet" href="<?=base_url('assets/ckeditor/js/samples/css/samples.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/ckeditor/js/samples/toolbarconfigurator/lib/codemirror/neo.css')?>">
</head>
<body id="main">
	<h1 align="center">Add new Product</h1><br>
	<?php 
		if ($this->session->flashdata('bg_sys_msg')) {
			echo $this->session->flashdata('bg_sys_msg');
		}
	?>
	<hr>
	<?=form_open_multipart(base_url('products/doAddProduct'));?>
	<table border="1" align="center" width="92%;">
		<tr>
			<td width="200" align="right"><?=form_label('Product Category :', 'pro_cat');?></td>
			<td>
				<select id="product_cat" name="product_cat">
					<option value="-1" selected="selected">--- Select Product Category ---</option>
					<?php 
						for ($i=0;$i<count($product_cat); $i++) { 
							echo "<option value='".$product_cat[$i]['cat_id']."'>".$product_cat[$i]['cat_name']."</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right"><?=form_label('Product Sub-category :', 'product_sub_cat');?></td>
			<td>
				<select id="product_sub_cat" name="product_sub_cat">
					<option value='-1' selected='selected'>--- Select Sub Category ---</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right"><?=form_label('Product Name :');?></td>
			<td><?php 
					$attr=array('name'=>'product_name','value'=>set_value('product_name'));
					echo form_input($attr);
				?>
			</td>
		</tr>
		<tr>
			<td align="right"><?=form_label('Product Company :');?></td>
			<td><?php
					$attr=array('name'=>'product_company', 'value'=>set_value('product_company'));
					echo form_input($attr);
				?>
			</td>
		</tr>
		<tr>
			<td align="right"><?=form_label('Product thumbnail :');?></td>
			<td><input type="file" name="product_thumb_image" style="overflow-x: hidden;width: 173px;"><span style="margin-left:20px;color:red;">Image must be in 150px x 150px resolution.</span></td>
		</tr>
		<tr>
			<td align="right"><?=form_label('Product Image :');?></td>
			<td><input type="file" name="product_image_full" style="overflow-x: hidden;width: 173px;"><span style="margin-left:20px;color:red;">Image must be in 300px x 300px resolution.</span></td>
		</tr>
		<tr>
			<td align="right"><?=form_label('Product Type :');?></td>
			<td>
				<?php 
					$edibleProduct=array('name'=>'isEdible','type'=>'radio','value'=>1,'onClick'=>'ShowOptions();');
					echo form_input($edibleProduct)."  <span>Edible</span>";
				?>
				&nbsp;&nbsp;&nbsp;
				<?php 
					$NonedibleProduct=array('name'=>'isEdible','type'=>'radio','value'=>0,'onClick'=>'HideOptions();');
					echo form_input($NonedibleProduct)."  <span>Non-edible</span>";
				?>
				
				<div class="hide" id="vegNonVegChooser" style="position: relative;padding: 0px;border:1px dashed red;margin:6px;">
					<input type="radio" name="veg_nonveg" value="0">
					<span style="margin-left: 5px;">Vegitarian</span>
					&nbsp;&nbsp;
					<input type="radio" name="veg_nonveg" value="1">
					<span style="margin-left: 5px;">Non-vegitarian</span>
				</div>

			</td>
		</tr>
		<tr>
			<td align="right"><?=form_label('Product Description :');?></td>
			<td><?=form_textarea(array('id'=>'editor-remove-me','name'=>'product_desc','rows'=>6,'cols'=>60,'style'=>'overflow-y:scroll;','value'=>'<h1>Some Text</h1>'));?></td>
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
    <?php $this->load->view('admin/jquery'); ?>
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
	<script>
		initSample();
	</script>
</body>
</html>