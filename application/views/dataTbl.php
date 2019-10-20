<?php $this->load->helper('product');?>
<!DOCTYPE html>
<html>
<head>
	<title>DataTables Demo</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<?php $this->load->view('assets/dataTablesCss');?>
</head>
<body>
    <table class="table table-responsive table-bordered" id="mytable">
      <thead>
        <tr>
          <th>Product ID</th>
          <th>Category</th>
          <th>Sub-Category</th>
          <th>Name</th>
          <th>Image</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>

     <!-- Modal delete Product-->
    <form id="add-row-form" action="<?php echo site_url('crud/delete');?>" method="post">
        <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="myModalLabel">Delete Product</h4>
                   </div>
                   <div class="modal-body">
                       <input type="hidden" name="product_code" class="form-control" required>
                     <strong>Are you sure to delete this record?</strong>
                   </div>
                   <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success">Yes</button>
                   </div>
                    </div>
            </div>
         </div>
     </form>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php $this->load->view('assets/dataTablesJs');?>
<script type="text/javascript">

  function renderCategory(c_id){
    $.post("<?=base_url('products/cat_name_by_id');?>",{
      id:c_id
    },
    function(data, status){
      return data;
    });
    
  }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        // Setup datatables
      $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
      {
          return {
              "iStart": oSettings._iDisplayStart,
              "iEnd": oSettings.fnDisplayEnd(),
              "iLength": oSettings._iDisplayLength,
              "iTotal": oSettings.fnRecordsTotal(),
              "iFilteredTotal": oSettings.fnRecordsDisplay(),
              "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
              "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
          };
      };
 
      var table = $("#mytable").dataTable({
          initComplete: function() {
              var api = this.api();
              $('#mytable_filter input')
                  .off('.DT')
                  .on('input.DT', function() {
                      api.search(this.value).draw();
              });
          },
              oLanguage: {
              sProcessing: "loading..."
          },
              processing: true,
              serverSide: true,
              ajax: {"url": "<?php echo base_url('products/get_product_json');?>", 
                    "type": "POST"},
                    columns: [
                        {"data": "product_id"},
                        {"data": "cat_id"},
                        {"data": "sub_cat_id"},
                        {"data": "product_name"},
                        {"data": "product_image",render:function(data){return '<img class="img-rounded" style="height:60px;width:60px;" src="<?=base_url();?>/'+data+'">'}},
                        {"data": "product_price"},
                        {"data": "product_stock"},
                        {"data": "view"}
                  ],
                order: [[1, 'asc']],
          rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              $('td:eq(0)', row).html();
          }
 
      });
            // end setup datatables
            // get Edit Records
            $('#mytable').on('click','.edit_record',function(){
            var code=$(this).data('code');
                        var name=$(this).data('name');
                        var price=$(this).data('price');
                        var category=$(this).data('category');
            $('#ModalUpdate').modal('show');
            $('[name="product_code"]').val(code);
                        $('[name="product_name"]').val(name);
                        $('[name="price"]').val(price);
                        $('[name="category"]').val(category);
      });
            // End Edit Records
            
            // get delete Records
            $('#mytable').on('click','.delete_record',function(){
            var p_id=$(this).data('product_id');
            $('#ModalDelete').modal('show');
            $('[name="product_code"]').val(code);
      });
            // End delete Records
    });
</script>

</body>
</html>