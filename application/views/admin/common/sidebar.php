<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <li class="sidebar-search">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
            <!-- /input-group -->
        </li>
        <li><a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Design<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href="<?=base_url('design/banner');?>">Banner</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Categories<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href="<?=base_url('Categories/add');?>">Add</a></li>
                <li><a href="<?=base_url('Categories/');?>">Manage</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Sub-Categories<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href="<?=base_url('SubCategories/add');?>">Add</a></li>
                <li><a href="<?=base_url('SubCategories');?>">Manage</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Products<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href="<?=base_url('Products/add');?>">Add</a></li>
                <li><a href="<?=base_url('products/manage_products');?>">Manage</a></li>
            </ul>
        </li>
        <li><a href="forms.html"><i class="fa fa-edit fa-fw"></i> Stock</a></li>
        <li><a href="forms.html"><i class="fa fa-user fa-fw"></i> Customers</a></li>
        <li><a href="forms.html"><i class="fa fa-user fa-fw"></i> Orders</a></li>
        <li><a href="forms.html"><i class="fa fa-user fa-fw"></i> Transactions</a></li>
        <li><a href="forms.html"><i class="fa fa-user fa-fw"></i> Inbox</a></li>
    </ul>
</div>
