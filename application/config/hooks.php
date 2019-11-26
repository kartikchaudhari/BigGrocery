<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['post_controller_constructor']=function(){
	$ci=&get_instance();
	$settings=$ci->SiteModel->loadSiteWideSettings();

	if($settings){
		foreach($settings as $key=>$value)
        {
            $ci->config->set_item($key,$value);
        }
	}
};
