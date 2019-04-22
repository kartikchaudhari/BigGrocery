<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Paytm
{
	protected $ci;
	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function test(){
		echo "SALT:=".generateSalt_e(10);
		echo "<br>Merchant ID:=".PAYTM_MERCHANT_MID;
	}

}

/* End of file Paytm.php */
/* Location: ./application/libraries/Paytm.php */

?>