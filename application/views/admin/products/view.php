<?php 
	$this->load->helper('product');
?>
<table class="table table-responsive" style="width:95%; margin-left: 2%;margin-right: 20%;" border="1">
	<tr class="active">
		<td>Sr. No.</td>
		<td>Product<br>Category</td>
		<td>Product<br>Sub-Category</td>
		<td>Product Name</td>
		<td>Thumbnail</td>
		<td>Price</td>
		<td>Avail. Stock</td>
	</tr>
	<?php 
		for ($i=0,$j=1; $i <count($data) ; $i++,$j++) { 
			$tr="<tr>";
			$tr.="\t<td>".$j."</td>\n";
			$tr.="\t<td>".getCatNameByCatId($data[$i]['cat_id'])."</td>\n";
			$tr.="\t<td>".getSubCatNameBySubCatId($data[$i]['sub_cat_id'])."</td>\n";
			$tr.="\t<td width='350'>".$data[$i]['product_name']."</td>\n";
			$tr.="\t<td><img src='".base_url($data[$i]['product_image'])."' height='40px' width='40px'></td>\n";
			$tr.="\t<td> ₹".$data[$i]['product_price']."</td>\n";
			$tr.="\t<td>".$data[$i]['product_stock']."</td>\n";
			$tr.="</tr>\n";
			echo $tr;
		}
		

	?>

</table>
