<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login :: Administrator Login</title>
    <?php $this->load->view('admin/head');?>
    <style>
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #303641;
        color: #C1C3C6
      }
    </style>
  </head>
  <body>
    <div class="container">
      <form class="form-signin" role="form" method="post" action="<?=base_url('admin/do_login');?>">
        <h3 align="center" class="form-signin-heading">Login to System</h3><hr>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <input type="text" class="form-control" name="uname" id="username" placeholder="Username" autocomplete="off" />
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class=" glyphicon glyphicon-lock "></i>
            </div>
            <input type="password" class="form-control" name="pass" id="password" placeholder="Password" autocomplete="off" />
          </div>
        </div>

        <label class="checkbox">
          <input type="checkbox" value="remember-me"> &nbsp Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div>
    <div class="clearfix"></div>
    <br><br>
    <?php $this->load->view('admin/js'); ?>
  </body>
</html>
