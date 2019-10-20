<!-- jQuery -->
    <script src="<?=base_url('assets/sb-admin/js/jquery.min.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('assets/sb-admin/js/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url('assets/sb-admin/js/metisMenu.min.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url('assets/sb-admin/js/sb-admin-2.js')?>"></script>

    <!-- page based required javascript and jQuery code -->
    <script type="text/javascript">
		function addOffers(){
			$("#myModal").modal();
		}

		function ShowOptions(){
			$('#vegNonVegChooser').fadeIn();
		}	

		function HideOptions(){
			$('#vegNonVegChooser').fadeOut();
		}

		$(document).ready(function() {
			$("#product_cat").change(function(){
				var product_cat_id=$("#product_cat").val();
				if (product_cat_id!="") {
					$.ajax({
						url: '<?=base_url('SubCategories/getAllSubCatByCatId');?>',
						type: 'POST',
						data: {cat_id: product_cat_id},
						success:function(data){
							$("#product_sub_cat").html(data);
						}
					})
				}
			});
	
		});
	</script>
</body>
</html>