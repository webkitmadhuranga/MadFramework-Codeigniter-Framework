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
/* File Name     : user.php                              */
/* Purpose       : 													           */
/*                 												                   */
/*                                                                                 */
/***********************************************************************************/

class user extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
        // laod model
        $this->load->model('admin_model');
	}


	/**
	 * @author                          Madhuranga Senadheera
	 * Purpose of the function          Description
	 * 
	 */
	public function index()
	{
        redirect('admin/user/login');
    }
	/*---------------- ---------End of index()---------------------------*/
	

	/**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     */
    public function registration()
    {
        
    }



    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * 
     */
    public function login()
    { 
        // load form vadaiton
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';

        $this->form_validation->set_rules($this->admin_model->login_rules);
        // validate form
        if ($this->form_validation->run() == false)
        { 
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             $this->data['result'] = array(); 
        }
        else
        {
            $this->admin_model->user_login(set_value('email'),set_value('password'));

        }

        $this->data['meta_title'] = $this->data['meta_title'].' - Admin User login';

        $this->load->view('admin/login_view',$this->data);

    }
    /*---------------- ---------End of login()---------------------------*/
    


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * 
     */
    public function forget_password()
    {

        // load form vadaiton
        $this->load->library('form_validation'); 

        if ($this->admin_model->is_logged())
        {
            redirect('admin/user/login');
            return false;
        }


        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|email');
        if ($this->form_validation->run()==FALSE)
        {
            $this->load->view('forget_password', $this->data, FALSE);
        }
        else
        {

        }
        
    }
    /*---------------- ---------End of forget_password()---------------------------*/
    


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * 
     */
    public function reset_password()
    {
        
    }
    /*---------------- ---------End of reset_password()---------------------------*/
    



    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          log out
     * 
     */
    public function logout()
    {
       if ($this->admin_model->log_out())
       {
           redirect('admin/user/login');
       }
       else
       {
            $this->session->set_flashdata('error', 'Not logged correct contact ',$this->config->item('blog_settings'));
            redirect('admin/user/login');
       }
       
    }
    /*---------------- ---------End of logout()---------------------------*/
    

}
/* End of file user.php */
/* Location: ./application/admin/controllers/user.php */

