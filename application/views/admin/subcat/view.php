
<!-- main document container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sub Category:  <u><?=$subcat_info_data['sub_cat_name'];?></u></h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Category Name</h3>
                </div>
                <div class="panel-body">
                    <h2 align="center"><?=$subcat_info_data['cat_name'];?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Total Products</h3>
                </div>
                <div class="panel-body">
                    <h2 align="center"><?=$subcat_info_data['count_product'];?></h2>
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

    <!-- list of products according to category -->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Products of <u><?=$subcat_info_data['sub_cat_name'];?></u> subcategory</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-bordered" id="mytable">
          <thead>
            <tr>
                <th>Product ID</th>
                <th>Category</th>
                <th>Sub-Category</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
          </thead>
          <?php 
                if (count($products)>0):
                    for($i=0;$i<count($products);$i++):
          ?>
                    <tr>
                        <td><?=$products[$i]['product_id']?></td>
                        <td><?=getCatNameByCatId($products[$i]['cat_id'])?></td>
                        <td><?=getSubCatNameBySubCatId($products[$i]['sub_cat_id'])?></td>
                        <td><?=$products[$i]['product_name']?></td>
                        <td><img style="height: 50px;width: 50px;" src="<?=base_url($products[$i]['product_image']);?>"></td>
                        <td><?=$products[$i]['product_price']?></td>
                        <td><?=$products[$i]['product_stock']?></td>
                    </tr>
            <?php 
                    endfor;
                endif;
            ?>
        </table>
                </div>
            </div>
        </div>
        
    </div>
    <!--./category-->
</div>
<!--./main document contaner ends -->