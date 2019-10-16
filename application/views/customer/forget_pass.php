<!DOCTYPE html>
<html>
    <head>
        <title>Forgo Passowrd :: BigGrocery</title>
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
            <div class="row">
                <?php
                if ($this->session->flashdata('bg_sys_msg')) {
                    echo "<div class='col-md-4 col-md-offset-4'>" . $this->session->flashdata('bg_sys_msg') . "</div>";
                }
                ?>
            </div>
            <div class="main-agileits">
                <div class="form-w3agile">
                    <h3>Forgot Password ?</h3>
                    <form action="<?= base_url('User/forgot_password'); ?>" enctype="pplication/x-www-form-urlencoded" method="post">
                        <div class="key">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <input id="email"   placeholder="Enter email or phone" type="text" name="email" required="">
                            <div class="clearfix"></div>
                        </div>
                        <input name="btnSendPassword" type="submit" value="Send Password">
                    </form>
                </div>
                <?php if(isset($forgot_link)): ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?=$forgot_link;?>
                </div>
                <?php endif; ?>
                <?php echo form_error('email') ?>
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