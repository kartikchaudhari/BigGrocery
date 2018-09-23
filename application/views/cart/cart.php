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
      checkoutCart: function(products, totalPrice, totalQuantity) {
       var dataString=JSON.stringify(products);
       
       //get user_id
       //if user is not logged in then set the varaible to zero
       var UserId=<?= ($this->session->userdata('bg_sys_ss_user_id'))?$this->session->userdata('bg_sys_ss_user_id'):0; ?>;

       //if user is logged in then 
       //do following
       if (UserId!=0) {
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
          window.location.href='<?=base_url('user/login');?>'
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
</script>
 
