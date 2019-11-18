
<!-- main document container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Sub Category</h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <?php
        if ($this->session->flashdata('bg_sys_msg')) {
            echo $this->session->flashdata('bg_sys_msg');
        }
        ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title"><b>Update Sub Category Info</b></div>
            </div>
            <div class="panel-body">
                <?=form_open(base_url('SubCategories/doUpdateSubCategory'));?>
                <div class="form-group">
                    <label for="CategoryName">Category Name: </label>
                    <?php
                        $attr=array('class'=>'form-control');
                        echo form_dropdown('cat_name', $cat_list,$sub_cat_info['cat_id'],$attr);
                    ?>
                </div>

                <div class="form-group">
                    <label>Sub Category Name:</label>
                    <input class="form-control" placeholder="Enter Sub Category name" name="sub_cat_name" type="text"  required="" value="<?=$sub_cat_info['sub_cat_name']?>">
                    <input type="hidden" name="sub_cat_id" value="<?=$sub_cat_info['sub_cat_id']?>">
                </div>

                <button type="submit" class="btn btn-success" name="btnUpdate">Update</button>
                <?=form_close();?>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!--./main document contaner ends -->