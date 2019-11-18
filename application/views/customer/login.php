<!DOCTYPE html>
<html>
    <head>
        <title>Customer Login :: BigGrocery</title>
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
                  <h3>Login</h3>
                  <?=form_open('user/login_user');?>
                      <div class="key">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input id="email"   placeholder="Email or Phone" type="text" name="uname" required="">
                        <div class="clearfix"></div>
                      </div>
                      <div class="key">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input id="pass"  type="password" name="password" required="" placeholder="Password">
                        <div class="clearfix"></div>
                      </div>
                      <input type="submit" value="Login">
                  <?=form_close();?>
                </div>
                <div class="forg">
                    <a href="<?= base_url('User/forgot_password');?>" class="forg-left">Forgot Password</a>
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

        <script type='text/javascript' src="<?= base_url('assets/js/jquery.mycart.js'); ?>"></script>
        <script type="text/javascript">
          $(function () {
              $('.my-cart-btn').myCart({
                  classCartIcon: 'my-cart-icon',
                  classCartBadge: 'my-cart-badge',
                  affixCartIcon: true,
                  checkoutCart: function (products) {
                      $.each(products, function () {
                          console.log(this);
                      });
                  },
                  clickOnAddToCart: function ($addTocart) {
                      goToCartIcon($addTocart);
                  },
                  getDiscountPrice: function (products) {
                      var total = 0;
                      $.each(products, function () {
                          total += this.quantity * this.price;
                      });
                      return total * 1;
                  }
              });

          });
        </script>
    </body>
</html>