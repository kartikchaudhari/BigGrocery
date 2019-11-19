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

		function deleteSubCategory(id){
			var url='<?=base_url('SubCategories/remove/');?>'+id;
			if(confirm("Are you sure ?")){
				window.location=url;	
			}
		}

		$(document).ready(function() {
			$("#product_cat").change(function(){
				var product_cat_id=$("#product_cat").val();
				if (product_cat_id!="") {
					$.ajax({
						url: '<?=base_url('SubCategories/getAllSubCatByCatId');?>',
						type: 'POST',
						data: {cat_id: product_cat_id,'<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
						success:function(data){
							$("#product_sub_cat").html(data);
						}
					})
				}
			});
	
		});
	</script>

	<!-- data table -->
	<script type="text/javascript" src="<?=site_url("assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap.min.js");?>"></script>
	<script type="text/javascript" src="<?=site_url("assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js");?>"></script>
	<script type="text/javascript" src="<?=site_url("assets/DataTables/datatables_mark/datatables.mark.min.js");?>"></script>
	<script type="text/javascript" src="<?=site_url("assets/DataTables/datatables.min.js");?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#mytable").DataTable();
		});
	</script>
	

</body>
</html>