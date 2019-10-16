<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<table id="tblProducts" class="" style="width:95%; margin-left: 2%;margin-right: 20%;" border="1">
	<tr class="active">
		<td>Sr. No.</td>
		<td>Product<br>Category</td>
		<td>Product<br>Sub-Category</td>
		<td>Product Name</td>
		<td>Thumbnail</td>
		<td>Price</td>
		<td>Avail. Stock</td>
	</tr>
</table>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>	
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    	$('#tblProducts').DataTable();
	});
</script>