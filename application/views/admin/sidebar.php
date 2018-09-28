<div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
    <ul class="list-group panel panel-info">
        <li class="list-group-item panel-heading"><i class="glyphicon glyphicon-align-justify"></i> <b><?=strtoupper($admin_name);?></b></li>
        <li class="list-group-item"><input type="text" class="form-control search-query" placeholder="Search Something" onkeydown="javascript:alert('searching...');" onkeyup="javascript:alert('searching...');"></li>
        
        <li><a class="list-group-item"  href="<?=base_url('admin/dashboard_content');?>" target="DashboardFrame"><i class="glyphicon glyphicon-home"></i>Dashboard </a></li>
        
        <li><a class="list-group-item" href="<?=base_url('categories');?>" target="DashboardFrame"><i class="glyphicon glyphicon-certificate"></i>Categories</a></li>
        <li>
            <a href="#SubCatOps" class="list-group-item" data-toggle="collapse"><i class="glyphicon glyphicon-th-list"></i>Sub-Categories&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
            <li class="collapse" id="SubCatOps">
              <a style="padding-left: 60px;" href="<?=base_url('sub_categories');?>" target="DashboardFrame" class="list-group-item">View</a>
              <a style="padding-left: 60px;" href="<?=base_url('sub_categories/add');?>" target="DashboardFrame" class="list-group-item">Add New</a>
              <a style="padding-left: 60px;" href="<?=base_url('sub_categories/remove');?>" target="DashboardFrame" class="list-group-item">Remove</a>
            </li>
        </li>
        <li>
            <a href="#ProductsOps" class="list-group-item" data-toggle="collapse"><i class="glyphicon glyphicon-th-list"></i>Products&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
            <li class="collapse" id="ProductsOps">
              <a style="padding-left: 60px;" href="" class="list-group-item">View</a>
              <a style="padding-left: 60px;" href="" class="list-group-item">Add New</a>
              <a style="padding-left: 60px;" href="" class="list-group-item">Remove</a>
            </li>
        </li>
        
        <li>
            <a class="list-group-item" href="timeline.html" ><i class="glyphicon glyphicon-indent-left"></i>Stock</a>
        </li>
        
        <li>
            <a class="list-group-item" href="calendars.html" ><i class="glyphicon glyphicon-calendar"></i>Customers</a>
        </li>
        <li>
            <a class="list-group-item" href="typography.html" ><i class="glyphicon glyphicon-font"></i>Orders</a></li>
        <li>
            <a class="list-group-item" href="footers.html" ><i class="glyphicon glyphicon-minus"></i>Transactions</a></li>
        <li>
            <a class="list-group-item" href="panels.html" ><i class="glyphicon glyphicon-list-alt"></i>Inbox</a>
        </li>
        <li>
            <a class="list-group-item" href="panels.html" ><i class="glyphicon glyphicon-list-alt"></i>Developer</a></li>
       <li>
    </li>
  </ul>
</div>