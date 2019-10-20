<?php 
	function alert_style($type,$message){
		$msg='';
		switch ($type) {
			case 'success':
				$msg.='<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
                    .$message.
                    '</div>';
			break;

			case 'info':
				$msg.='<div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
                    .$message.
                    '</div>';
			break;

			case 'warning':
				$msg.='<div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
                    .$message.
                    '</div>';
			break;
			
			case 'danger':
				$msg.='<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
                    .$message.
                    '</div>';
			break;
			
			
			default:
				$msg.='<div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
                    .$message.
                    '</div>';
			break;

		}
		return $msg;
	}

	function manage_button_maker($type,$url){
		$btn_html='';
		switch ($type) {
			case 'CRUD':
				$btn_html.='
					<a href="'.$url['create'].'"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i>  Create</button></a>
					<a href="'.$url['read'].'"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>  View</button></a>
					<a href="'.$url['update'].'"><button type="button" class="btn btn-nfo"><i class="fa fa-pencil"></i>  Update</button></a>
					<a href="'.$url['delete'].'"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i>  Delete</button></a>
					';	
			break;
			
			case 'RUD':
				$btn_html.='
					<a href="'.$url['read'].'">
						<button type="button" class="btn btn-success"><i class="fa fa-eye"></i>  View</button></a>

					<a href="'.$url['update'].'"><button type="button" class="btn btn-info"><i class="fa fa-pencil"></i>  Update</button></a>

					<a href="'.$url['delete'].'"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i>  Delete</button></a>
					';	
			break;
			
			default:
				# code...
				break;
		}

		return $btn_html;
	}
?>