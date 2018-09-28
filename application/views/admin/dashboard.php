<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard</title>
    <?php $this->load->view('admin/head'); ?>
  </head>
  <body>
    <!--nav-->
    <nav role="navigation" class="navbar navbar-custom">
        <?php $this->load->view('admin/nav',['admin_data'=>$data[0]]); ?>    
    </nav>
    <!--/nav -->
    
    <!--container-->
    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-left">
            <!-- page sidebar -->
            <?php $this->load->view('admin/sidebar',['admin_name'=>$data[0]['username']]);?>
            <!-- page sidebar -->
               
            <!-- page body -->
            <div class="col-xs-12 col-sm-9 content">
                <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span style="color:white;" class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Dashboard</h3>
              </div>
              <div class="panel-body" style="padding-left: 5px;">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <iframe name="DashboardFrame" style="width: 100%;height: 100vh;position: relative;" src="<?=base_url('admin/dashboard_content');?>" frameborder="0" allowfullscreen>
                    </iframe>
                </div>
              </div><!-- panel body -->
            </div>
            <!--/ page body -->
        </div>
      </div>
    </div>
    <!--/container-->
    

    <!-- load the js -->
    <?php $this->load->view('admin/js'); ?>
  </body>
</html>
