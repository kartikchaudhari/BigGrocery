<div class="container">
    <div class="row">

        <div class="col-md-4 col-md-offset-4">

            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <?php 
                        if($this->session->flashdata('msg')){
                            echo $this->session->flashdata('msg');
                        }
                    ?>
                    <?=form_open('admin/do_login');?>
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Username" name="uname" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="1">Logged me in for 1 Month !!
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
                        </fieldset>
                    <?=form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>