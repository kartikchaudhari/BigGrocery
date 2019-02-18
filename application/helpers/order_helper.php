<?php 
	function getUserId($CartId){
		$ci=&get_instance();
        $ci->load->model('CartModel');
        
        $data=$ci->UsersModel->FethcUserInfo($UserId);
        if($data){
            return $data;
        }
        else{
            return null;
        }
	}

    function json_to_table_render($json_obj){
        $json_decoded_array=json_decode($json_obj, $assoc_array = true);
        $table="<table border='1' width='100%;'>";
        $table.= "<tr>
                    <th>Quantity</th>
                    <th>Product</th>
                    <th>Product Price</th>
              </tr>";
        for ($i=0; $i <count($json_decoded_array); $i++) { 
            $table.="<tr>
                    <td align='center'>".$json_decoded_array[$i]['quantity']."</td>
                    <td>".$json_decoded_array[$i]['name']."</td>
                    <td align='center'>".$json_decoded_array[$i]['price']."</td>
                  </tr>";
        }
        $table.="</table>";

        return $table;
    }

    function json_to_email_render($json_obj){
        $json_decoded_array=json_decode($json_obj, $assoc_array = true);
        $tr='';
        $tr.='<table class="table table-hover" border="1"><tr>
                <td>';
                    for ($i=0; $i <count($json_decoded_array); $i++) { 
                        $tr.='<li style="list-style: none;">'.$json_decoded_array[$i]['quantity'].' X '.$json_decoded_array[$i]['name'].'</li>';
                    }
                
          $tr.='</td>';
          $tr.='<td align="right">';
                    for ($i=0; $i <count($json_decoded_array); $i++) { 
                        $tr.='<li style="list-style:none;">'.$json_decoded_array[$i]['quantity']*$json_decoded_array[$i]['price'].'</li>';
                    }
            $tr.='</td>
        </tr></table>';
        return $tr;
    }

?>