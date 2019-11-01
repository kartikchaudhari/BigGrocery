<!-- main document container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Categories</h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
    	<div class="col-sm-12 col-md-12 col-lg-12">
            <?php
            if ($this->session->flashdata('bg_sys_msg')) {
                echo $this->session->flashdata('bg_sys_msg');
            }
            ?>
	       	<div class="table-responsive">
		    	<table class="table table-bordered table-hover">
		    		<thead>
		    			<tr class="active">
		    				<th>No.</th>
		    				<th>Category Name</th>
		    				<th>Total Sub-categories</th>
		    				<th>Total Products</th>
		    				<th>Actions</th>
		    			</tr>
		    		</thead>
	    		<tbody>
	    		<?php
	    			$this->load->helper(array('categories','utility'));
	    			if(count($data)>0):
	    				for ($i=0; $i<count($data); $i++): 
	    		?>
		    		<tr>
		    			<td><?=$i+1?>.</td>
		    			<td><?=$data[$i]['cat_name']?></td>
		    			<td><?=countSubCategoryByCategory($data[$i]['cat_id'])?></td>
		    			<td><?=countProductByCategory($data[$i]['cat_id'])?></td>
		    			<td>
		    				<?php 
								$url=array();
								$url['read']=base_url('Categories/view/'.$data[$i]['cat_id']);
								$url['update']=base_url('Categories/update/'.$data[$i]['cat_id']);
								$url['delete']='#';
								echo manage_button_maker('RUD',$url);
		    				?>
		    			</td>
		    		</tr>
		    		<?php endfor;
		    			else:?>
		    		<?php endif; ?>
		    		</tbody>
		    	</table>
			</div>                
		</div>
    </div>
    <!-- /.row -->        
</div>
<!--./main document contaner ends -->
