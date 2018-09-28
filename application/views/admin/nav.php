<div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="<?=base_url('home');?>" class="navbar-brand" style="padding-left:20px;padding-top: 5px;"><img src='<?=base_url('assets/icon/logo.jpg');?>' height="40px;"></a>
    </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
    <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">[ <?=$data[0]['username'];?> ] <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                    <li class="dropdown-header"><?=$data[0]['username'];?></li>
                    <li><a href="#">Action</a></li>
                    <li class="divider"></li>
                    <li class="active"><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="<?=base_url('admin/logout');?>">Logut</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->