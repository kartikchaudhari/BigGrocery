<ul class="card">
	
	<?php if ($this->session->userdata('bg_sys_ss_user_id')): ?>
		<li><a href="<?=base_url('user/wishlist/'.$this->session->userdata('bg_sys_ss_user_id'));?>" title="Your wishlist"><i class="fa fa-heart" aria-hidden="true"></i>Wishlist</a></li>


		<li><a href="<?=base_url('user/order_history');?>" title="View your Order history"><i class="fa fa-file-text-o" aria-hidden="true"></i>Order History</a></li>
	<?php endif ?>

	<?php if (!$this->session->userdata('bg_sys_ss_user_id')): ?>
	<li><a href="<?=base_url('user/login');?>" title="Customer Login"><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
	

	<li><a href="<?=base_url('user/register');?>" title="Create an Account on BigGrocery"><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
	<?php endif ?>	

	<li><a href="<?=base_url('user/shipping');?>" title="Shippping Information"><i class="fa fa-ship" aria-hidden="true"></i>Shipping</a></li>
	

	<?php if ($this->session->userdata('bg_sys_ss_user_id')): ?>
		<li>[<a href="<?=base_url('user/shipping');?>" title="Shippping Information">+ Kartik Chaudhari</a>]</li>
		<li>[<a href="<?=base_url('user/logout');?>" title="Log out">Logout</a>]</li>	
	<?php endif ?>
	
</ul>