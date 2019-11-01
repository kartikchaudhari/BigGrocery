
<!-- main document container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Category</h1>
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
                <div class="panel-title"><b>Update Category Info</b></div>
            </div>
            <div class="panel-body">
                <?=form_open(base_url('Categories/doUpdateCategory'));?>
                <div class="form-group">
                    <label for="CategoryName">Category Name: </label>
                    <input id="CategoryName" class="form-control" placeholder="Enter Category name" name="cat_name" type="text"  required="" value="<?=$cat_info_data['cat_name']?>">
                    <input type="hidden" name="cat_id" value="<?=$cat_info_data['cat_id']?>">
                </div>
                <button type="submit" class="btn btn-success" name="btnUpdate">Update</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!--./main document contaner ends -->