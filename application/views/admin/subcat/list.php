<?php $this->load->helper(array('utility','product')); ?>
<!-- main document container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Sub Categories</h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tr>
                    <th class="active">Sub-Category ID</th>
                    <th class="active">Sub-Category Name</th>
                    <th class="active">Category</th>
                    <th class="active">Action</th>
                </tr>
                <?php 
                    $url=array();
                    for ($i=0; $i <count($data) ; $i++) { 
                        $url['read']=base_url('SubCategories/view/'.$data[$i]['sub_cat_id']);
                        $url['update']=base_url('SubCategories/update/'.$data[$i]['sub_cat_id']);
                        $url['delete']=base_url('SubCategories/remove/'.$data[$i]['sub_cat_id']);

                        $attr['read']='';
                        $attr['update']="";
                        $attr['delete']='';
                        echo "<tr>
                                    <td>".$data[$i]['sub_cat_id']."</td>
                                    <td>".$data[$i]['sub_cat_name']."</td>
                                    <td>".$data[$i]['cat_id']."</td>
                                    <td>".manage_button_maker('RUD',$url,$attr)."</td>
                        </tr>";
                    }
                ?>
            </table>
        </div>
    </div>
    <!-- /.row -->
</div>
<!--./main document contaner ends -->