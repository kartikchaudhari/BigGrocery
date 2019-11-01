<?php $this->load->helper('utility'); ?>
<!-- main document container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Products</h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <table class="table table-responsive table-bordered" id="mytable">
	      <thead>
	        <tr>
		        <th>Product ID</th>
		        <th>Category</th>
		        <th>Sub-Category</th>
		        <th>Name</th>
		        <th>Image</th>
		        <th>Price</th>
		        <th>Stock</th>
		        <th>Action</th>
	        </tr>
	      </thead>
	      <?php 
	      		if (count($products)>0):
	      			for($i=0;$i<count($products);$i++):
	      ?>
			      	<tr>
			      		<td><?=$products[$i]['product_id']?></td>
			      		<td><?=getCatNameByCatId($products[$i]['cat_id'])?></td>
			      		<td><?=getSubCatNameBySubCatId($products[$i]['sub_cat_id'])?></td>
			      		<td><?=$products[$i]['product_name']?></td>
			      		<td><img style="height: 50px;width: 50px;" src="<?=base_url($products[$i]['product_image']);?>"></td>
			      		<td><?=$products[$i]['product_price']?></td>
			      		<td><?=$products[$i]['product_stock']?></td>
			      		<td><?php
                            $url=array();
                            $url['read']=base_url('Categories/view/'.$products[$i]['product_id']);
                            $url['update']='#';
                            $url['delete']='#';
                            echo manage_button_maker('RUD',$url);
                            ?></td>
			      	</tr>
			<?php 
					endfor;
				endif;
			?>
    	</table>
    </div>
    <!-- /.row -->
</div>
<!--./main document contaner ends -->