<?php 

class Home extends Frontend_Controller
{
/*********************Construct()******************************/
	function __construct()
    {
    	parent::__construct();
    }

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          load the item list
     * @variable 						: type
     * @return 							void 
     */
    public function index()
    {
        // set sub view 
		$this->data['subview'] = 'front/home';
		// load the page
		$this->load->view('front/_layout_main',$this->data );
    }
    /*---------------End of index()---------------*/


    
}// End items --------------Class{}
//Owner : Madhuranga Senadheera

 ?>