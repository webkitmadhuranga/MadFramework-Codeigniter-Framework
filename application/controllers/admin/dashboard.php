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
/* File Name     : Dashboard.php                              					   */
/* Purpose       : 													           	   */
/*                 												                   */
/*                                                                                 */
/***********************************************************************************/

class Dashboard extends Admin_Controller
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
		$this->data['subview'] = 'admin/dashboard_view';
		// load the page
		$this->load->view('admin/_layout_main',$this->data );
		
    }
	/*---------------- ---------End of index()---------------------------*/
	

}
/* End of file user.php */
/* Location: ./application/admin/controllers/user.php */

