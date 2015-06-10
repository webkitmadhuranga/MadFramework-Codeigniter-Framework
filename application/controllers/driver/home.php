<?php

/**
*
*
* @copyright  2014
* @license    None
* @version    1.0
* @link       None
* @since      Class available since Release 1.0
*
**/		
		
/***********************************************************************************/
/*                                                                                 */
/* File Name     : Home.php                              					   */
/* Purpose       : 													           	   */
/*                 												                   */
/*                                                                                 */
/***********************************************************************************/

class home extends Driver_Controller
{
	function __construct()
	{
		parent::__construct();
        // laod model
         
	}


	/**
	 * @author                          Madhuranga Senadheera
	 * Purpose of the function          Description
	 * 
	 */
	public function index()
	{ 
		// set sub view 
		$this->data['subview'] = 'driver/driver_home';
		// load the page
		$this->load->view('driver/_layout_main',$this->data );
		
    }
	/*---------------- ---------End of index()---------------------------*/
	

}
/* End of file user.php */
/* Location: ./application/driver/controllers/user.php */

