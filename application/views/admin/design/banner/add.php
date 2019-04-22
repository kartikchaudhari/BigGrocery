<!DOCTYPE html>
<html>
<head>
    <title>Add Banner</title>
    <?php $this->load->view('admin/common/head'); ?>
</head>
<body>
<div class="container">
    <div class="row">
      <?php if ($this->session->flashdata('msg')) 
        echo $this->session->flashdata('msg');;
      ?>
    </div>
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Banner</h3>
      </div>
      <div class="panel-body">
        <form action="<?=base_url('design/doAddBanner');?>" method="post" enctype="multipart/form-data" id="form-banner" class="form-horizontal">
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name">Banner Name</label>
            <div class="col-sm-10">
              <input type="text" name="b_name" value="" placeholder="Banner Name" id="input-name" class="form-control" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status">Status</label>
            <div class="col-sm-10">
            	<select name="status" id="input-status" class="form-control" required="required">
                	<option value="1" selected="selected">Enabled</option>
                	<option value="0">Disabled</option>
                </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10">
            	<button type="submit" class="btn btn-success">Add</button>
            	<strong>&nbsp;&middot;&nbsp;</strong>
            	<button type="reset" class="btn btn-danger">Reset</button>
            </div>
          </div>
          <br>
        <form>
      </div>
    </div>
    <div class="row">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Available Banners</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Banner Id</th>
                  <th>Banner Name</th>
                  <th>Banner Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  for ($i=0;$i<count($data); $i++) { 
                    echo "<tr>
                              <td>".$data[$i]['banner_id']."</td>
                              <td>".$data[$i]['name']."</td>
                              <td>".$data[$i]['status']."</td>
                              <td><a href='".base_url('design/add_banner_info/').$data[$i]['banner_id']."'><button type='button' data-bid='".$data[$i]['banner_id']."'>Update Info  </button></a>&middot;<button data-bid='".$data[$i]['banner_id']."'>Edit</button>&middot;<button data-bid='".$data[$i]['banner_id']."'>Delete</button></td>
                              
                    </tr>";
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- load the js -->
<?php $this->load->view('admin/common/js'); ?>
</body>
</html>
