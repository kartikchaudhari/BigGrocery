 <!--container-->
    <div class="content-row" style="padding: 0px;">
        <div class="row">
            <div class="panel panel-danger">
                <?php 
                    if ($this->session->flashdata('bg_sys_msg')) {
                        echo $this->session->flashdata('bg_sys_msg');
                    }
                ?>
                    <div class="panel-heading">
                        <div class="panel-title"><b>Delete Sub Categories</b></div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th class="active">Sub-Category ID</th>
                                    <th class="active">Sub-Category Name</th>
                                    <th class="active">Category</th>
                                    <th class="active">Action</th>
                                </tr>
                                <?php 
                                    for ($i=0; $i <count($data) ; $i++) { 
                                        echo "<tr>
                                                    <td>".$data[$i]['sub_cat_id']."</td>
                                                    <td>".$data[$i]['sub_cat_name']."</td>
                                                    <td>".$data[$i]['cat_id']."</td>
                                                    <td><a href='".base_url('sub_categories/delete_action')."/".$data[$i]['sub_cat_id']."'><button type='button' class='btn btn-danger'><span class='glyphicon glyphicon-trash'> </span>&nbsp;&nbsp;Delete</button></a>&nbsp;<strong>&middot;</strong>&nbsp;<a href=''><button type='button' class='btn btn-primary' onclick='viewSubCatInfo(".$data[$i]['sub_cat_id'].")'><span class='glyphicon glyphicon-info-sign'> </span>&nbsp;&nbsp;Info</button></a></td>
                                              </tr>";
                                    }
                                ?>
                            </table>
                        </div>
                    </div>    
                </div>
        </div>                 
    </div>
    <!--/container-->

    <!-- load the js -->
    <script type="text/javascript">
        function viewSubCatInfo(SubCatId){
            alert(SubCatId);
        }

        function deleteSubCat(SubCatId){
            alert(SubCatId);
        }
    </script>
  </body>
</html>
