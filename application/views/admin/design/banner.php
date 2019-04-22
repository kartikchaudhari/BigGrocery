<!DOCTYPE html>
<html>
<head>
    <title>Banner</title>
    <?php $this->load->view('admin/common/head'); ?>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<a href="<?=base_url('design/add');?>" target="DashboardFrame"><button type="button" class="btn btn-primary">Add Banner</button></a>
		</div>
	</div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> Banner List</h3>
      </div>
      <div class="panel-body">
        <form action="http://localhost/opencart/admin/index.php?route=design/banner/delete&amp;user_token=D2wWtKpwlNr5GpRybrGGcQ7Uevf8bFhi" method="post" enctype="multipart/form-data" id="form-banner">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></td>
                  <td class="text-left">                    <a href="http://localhost/opencart/admin/index.php?route=design/banner&amp;user_token=D2wWtKpwlNr5GpRybrGGcQ7Uevf8bFhi&amp;sort=name&amp;order=DESC" class="asc">Banner Name</a>
                    </td>
                  <td class="text-left">                    <a href="http://localhost/opencart/admin/index.php?route=design/banner&amp;user_token=D2wWtKpwlNr5GpRybrGGcQ7Uevf8bFhi&amp;sort=status&amp;order=DESC">Status</a>
                    </td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
                                                <tr>
                  <td class="text-center">                    <input type="checkbox" name="selected[]" value="7">
                    </td>
                  <td class="text-left">Home Page Slideshow</td>
                  <td class="text-left">Enabled</td>
                  <td class="text-right"><a href="http://localhost/opencart/admin/index.php?route=design/banner/edit&amp;user_token=D2wWtKpwlNr5GpRybrGGcQ7Uevf8bFhi&amp;banner_id=7" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
                </tr>
                                <tr>
                  <td class="text-center">                    <input type="checkbox" name="selected[]" value="6">
                    </td>
                  <td class="text-left">HP Products</td>
                  <td class="text-left">Enabled</td>
                  <td class="text-right"><a href="http://localhost/opencart/admin/index.php?route=design/banner/edit&amp;user_token=D2wWtKpwlNr5GpRybrGGcQ7Uevf8bFhi&amp;banner_id=6" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
                </tr>
                                <tr>
                  <td class="text-center">                    <input type="checkbox" name="selected[]" value="8">
                    </td>
                  <td class="text-left">Manufacturers</td>
                  <td class="text-left">Enabled</td>
                  <td class="text-right"><a href="http://localhost/opencart/admin/index.php?route=design/banner/edit&amp;user_token=D2wWtKpwlNr5GpRybrGGcQ7Uevf8bFhi&amp;banner_id=8" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
                </tr>
                                              </tbody>
            </table>
          </div>
        </form>
        <div class="row">
          <div class="col-sm-6 text-left"></div>
          <div class="col-sm-6 text-right">Showing 1 to 3 of 3 (1 Pages)</div>
        </div>
      </div>
    </div>>
</div>
<!-- load the js -->
<?php $this->load->view('admin/common/js'); ?>
</body>
</html>
