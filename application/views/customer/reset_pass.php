<!DOCTYPE html>
<html>
    <head>
        <title>Reset Passowrd :: BigGrocery</title>
        <!-- for-mobile-apps -->
        <?php $this->load->view('customer/head'); ?>
    <body>
        <div class="header">
            <div class="container">
                <div class="logo">
                    <?php $this->load->view('site/site_logo_tagline'); ?>
                </div>
                <div class="head-t">
                    <?php $this->load->view('customer/customer_nav'); ?>	
                </div>
                <!-- site_nav -->
                <?php $this->load->view('site/site_nav'); ?>
            </div>			
        </div>
        <!---->
        <!--login-->
        <div class="login">
            <?php
            if ($this->session->flashdata('bg_sys_msg')) {
                echo "<div class='col-md-4 col-md-offset-4'>" . $this->session->flashdata('bg_sys_msg') . "</div>";
            }
            ?>
            <div class="main-agileits">
                <div class="form-w3agile">
                    <h3 style="margin-bottom: 15px;">Reset Password</h3>
                    <h5 style="margin-bottom: 15px;">Hello <span><?=$data['firstName']?></span>, Please enter your password 2x below to reset.</h5>
                    <?=form_open(base_url('User/reset_password/token/'.$data['token']));?>
                        <div class="key">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input  placeholder="Password" type="text" name="pass" required="">
                            <div class="clearfix"></div>
                        </div>
                        <div class="key">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input placeholder="Confirm Passowrd" type="password" name="cpass" required="">
                            <div class="clearfix"></div>
                        </div>
                        <input class="btn btn-lg btn-block" name="btnResetPassword" type="submit" value="Reset Password">
                    <?=form_close();?>
                </div>
                <div class="forg">
                    <a href="#" class="forg-left">[ Login ]</a>
                    <a href="register.html" class="forg-right">Register</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--footer-->
        <div class="footer">
            <?php $this->load->view('site/site_footer'); ?>
        </div>
        <!-- //footer-->
        <!-- smooth scrolling -->
        <script type="text/javascript">
            $(document).ready(function () {
                $().UItoTop({easingType: 'easeOutQuart'});
            });
        </script>
        <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
        <!-- //smooth scrolling -->

  
    </body>
</html>