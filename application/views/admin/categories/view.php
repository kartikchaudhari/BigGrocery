
<!-- main document container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category:  <u><?=$cat_info_data['cat_name'];?></u></h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Total Subcategories</h3>
                </div>
                <div class="panel-body">
                    <h2 align="center"><?=$cat_info_data['count_sub_cat'];?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Total Products</h3>
                </div>
                <div class="panel-body">
                    <h2 align="center"><?=$cat_info_data['count_product'];?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Operations</h3>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!--./main document contaner ends -->