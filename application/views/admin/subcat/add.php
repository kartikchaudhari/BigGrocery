<!DOCTYPE html>
<html>
  <head>
    <title>Add Sub Categories</title>
    <?php $this->load->view('admin/head'); ?>
  </head>
  <body style="background-color: #FFF;">
    <!--container-->
    <div class="content-row" style="padding: 0px;">
        <div class="content-row"><br><br>
            <div class="panel panel-default">
                <?php 
                    if ($this->session->flashdata('bg_sys_msg')) {
                        echo $this->session->flashdata('bg_sys_msg');
                    }
                ?>
                <div class="panel-heading">
                    <div class="panel-title"><b>Add Sub Category</b></div>
                </div>
                <div class="panel-body">
                    <?=form_open(base_url('sub_categories/add_action'));?>
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
                          <input class="form-control" id="exampleInputPassword1" placeholder="Enter Sub-Category name" name="sub_cat_name" type="text" required="">
                        </div>
                        <button type="submit" class="btn btn-success">Add</button>
                      </form>
                    </div>    
            </div>
        </div>                 
    </div>
    <!--/container-->

    <!-- load the js -->
    <?php $this->load->view('admin/js'); ?>
  </body>
</html>
