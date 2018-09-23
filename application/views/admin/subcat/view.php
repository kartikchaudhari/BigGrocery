<!DOCTYPE html>
<html>
  <head>
    <title>View Sub Categories</title>
    <?php $this->load->view('admin/head'); ?>
  </head>
  <body style="background-color: #FFF;">
    <!--container-->
    <div class="content-row" style="padding: 0px;">
        <div class="row">
            <div class="content-row"><br><br>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title"><b>View Sub Categories</b></div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th class="active">Sub-Category ID</th>
                                    <th class="active">Sub-Category Name</th>
                                    <th class="active">Category</th>
                                </tr>
                                <?php 
                                    for ($i=0; $i <count($data) ; $i++) { 
                                        echo "<tr>
                                                    <td>".$data[$i]['sub_cat_id']."</td>
                                                    <td>".$data[$i]['sub_cat_name']."</td>
                                                    <td>".$data[$i]['cat_id']."</td>
                                        </tr>";
                                    }
                                ?>
                            </table>
                        </div>
                    </div>    
                </div>
            </div>
        </div>                 
    </div>
    <!--/container-->

    <!-- load the js -->
    <?php $this->load->view('admin/js'); ?>
  </body>
</html>
