<!DOCTYPE html>
<html>
<head>
<title>Dashboard :: BirGrocery</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="" />

<!-- site css and js header -->
	<?php $this->load->view('customer/head'); ?>
	<link href="<?=base_url('assets/css/custom.css');?>" rel='stylesheet' type='text/css' />
<!--//site css and js header -->

<style type="text/css">
    
</style>
</head>
<body>
<div class="header">
	<div class="container">
		<div class="logo">
			<?php $this->load->view('site/site_logo_tagline'); ?>
		</div>
		<div class="head-t">
			<?php $this->load->view('customer/customer_nav'); ?>
		</div>
		<!-- navbar_main -->
			<?php $this->load->view('site/site_nav'); ?>
		<!-- navbar_main ends -->
	</div>			
</div>
  <!---->
<!-- content -->
<div class="check-out">	 
	<div class="container" style="margin-top: -5%;padding-left: 25px;padding-right: 25px;">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 style="margin-top: -10px;margin-bottom: -8px;" class="panel-title text-center">Avatar</h3>
                    </div>
                    <div class="panel-body" style="text-align: center;padding: 10px;">
                        <img align="center" height="200px" width="200px" class="img-thumbnail" src="<?=base_url($data['avatar']);?>">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 style="margin-top: -10px;margin-bottom: -8px;" class="panel-title">Information &middot; <i class="fa fa-pencil" data-toggle="modal" data-target="#updateProfileInfoModal"></i></h3>
                    </div>
                    <div class="panel-body" style="padding: 10px;">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <td width="115"><strong>Name:</strong></td>
                                    <td>&nbsp;<?=$data['fname']." ".$data['lname'];?></td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>&nbsp;<?=$data['email'];?></td>
                                </tr>
                                <tr>
                                    <td><strong>Contact No.:</strong></td>
                                    <td>&nbsp;<?=$data['contact']?></td>
                                </tr>
                                <tr>
                                    <td><strong>Address:</strong></td>
                                    <td>&nbsp;<?=$data['address']?></td>
                                </tr>
                                <tr>
                                    <td><strong>Delivery Address:</strong></td>
                                    <td>&nbsp;<?=$data['delivery_address']?></td>
                                </tr>
           
                            </table>
                        </div>
                    </div>
                </div>            
            </div>      
        </div>
	</div>
</div>
<!-- Modal -->
<div id="updateProfileInfoModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:1px solid lightgrey;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Information</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="tbFname">First Name:</label>
            <input type="text" class="form-control" id="tbFname" value="<?=$data['fname'];?>">
          </div>
          <div class="form-group">
            <label for="tbLname">Last Name:</label>
            <input type="text" class="form-control" id="tbLname" value="<?=$data['lname'];?>">
          </div>
          <div class="form-group">
            <label for="tbEmail">Email:</label>
            <input type="email" class="form-control" id="tbEmail" value="<?=$data['email'];?>">
          </div>
          <div class="form-group">
            <label for="tbContact">Contact No.:</label>
            <input type="email" class="form-control" id="tbContact" value="<?=$data['contact'];?>">
          </div>
          <div class="form-group">
            <label for="tbAddress">Address:</label>
            <input type="email" class="form-control" id="tbAddress" value="<?=$data['address'];?>">
          </div>
          <div class="form-group">
            <label for="tbDeliveryAddress">Delivery Address.:</label>
            <input type="email" class="form-control" id="tbDeliveryAddress" value="<?=$data['delivery_address'];?>">
          </div>
          <button type="submit" class="btn btn-success" onclick="updateProfileInfo();">Update</button>
            <strong>&middot;</strong>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </form><br><br>
      </div>
    </div>

  </div>
</div>
<!-- model -->
<!--footer-->
<div class="footer">
	<?php $this->load->view('site/site_footer'); ?>
</div>
<!-- //footer-->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

<script type="text/javascript">
    function updateProfileInfo(){
        $.post('<?=base_url('user/updateProfile');?>',
        {
            fname:$('#tbFname').val(),
            lname:$('#tbLname').val(),
            email:$('#tbEmail').val(),
            contact:$('#tbContact').val(),
            daddress:$('#tbDeliveryAddress').val(),
            address:$('#tbAddress').val()
          },
          function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
            $("#updateProfileInfoModal").modal("hide");
            location.reload();
          });
    }
</script>
<?php $this->load->view('cart/cart');?>
</body>
</html>