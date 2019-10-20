<!-- main document container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Sub Category</h1>
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
                <div class="panel-title"><b>Add Sub Category</b></div>
            </div>
            <div class="panel-body">
                    <?=form_open(base_url('SubCategories/add_action'));?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Category :</label>
                            <select class="form-control" name="cat_id" required="">
                                <?php
                                    for ($i=0; $i <count($data['cat']); $i++) { 
                                            echo "<option value='".$data['cat'][$i]['cat_id']."'>".$data['cat'][$i]['cat_name']."</option>";
                                        }    
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Sub Category:</label>
                          <input class="form-control"placeholder="Enter Sub-Category name" name="sub_cat_name" type="text"  required="">
                        </div>
                        <button type="submit" class="btn btn-success">Add</button>
                      </form>
                    </div>    
        </div>
    </div>
    <!-- /.row -->
</div>
<!--./main document contaner ends -->