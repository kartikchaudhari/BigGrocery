<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?=base_url('assets/css/bootstrap.css');?>" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?=base_url('assets/css/style.css');?>" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<!-- js -->
   <script src="<?=base_url('assets/js/jquery-1.11.1.min.js');?>"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?=base_url('assets/js/move-top.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/easing.js');?>"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="<?=base_url('assets/css/font-awesome.css');?>" rel="stylesheet"> 