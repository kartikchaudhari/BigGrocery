<script src="<?=site_url('assets/js/jquery-1.11.1.min.js');?>"></script>
<script type="text/javascript" src="<?=site_url('assets/js/move-top.js');?>"></script>
<script type="text/javascript" src="<?=site_url('assets/js/easing.js');?>"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
