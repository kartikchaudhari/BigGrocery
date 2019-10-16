<script type='text/javascript' src="<?=base_url('assets/js/jquery.mycart.js');?>"></script>

<script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      classCheckoutCart: 'my-cart-checkout',
      showCheckoutModal: true,
      numberOfDecimals: 2,
      affixCartIcon: true,
      <?php if(isset($_COOKIE["tempProductData"])) { ?>
        
      <?php } ?>
      checkoutCart: function(products, totalPrice, totalQuantity) {
      
       var UserId=<?= ($this->session->userdata('bg_sys_ss_user_id'))?$this->session->userdata('bg_sys_ss_user_id'):0; ?>;

       if (UserId!=0) {
          var dataString=JSON.stringify(products);
          $.ajax({
              url: '<?=base_url('cart/AddToCart')?>',
              data: {myData: dataString,tPrice:totalPrice,tQuantity:totalQuantity,user_id:UserId},
              type: 'POST',
              success: function(data) {
                      window.location.href ='<?=base_url('checkout/order');?>/'+data;
                    }
              });
        }
        //else redirect to login 
        else{
            setCookie("tempProductData",JSON.stringify(products),30);
            console.log(document.cookie);
            window.location.href='<?=base_url('user/login');?>';
        }
      },
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
      }
    });

  });

  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
</script>