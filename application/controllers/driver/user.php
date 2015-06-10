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
/* File Name     : user.php                                                        */
/* Purpose       : 													               */
/*                 												                   */
/*                                                                                 */
/***********************************************************************************/

class User extends Driver_Controller
{
	function __construct()
	{
		parent::__construct();
        // laod model
        $this->load->model('driver_model');
	}


	/**
	 * @author                          Madhuranga Senadheera
	 * Purpose of the function          Description
	 * 
	 */
	public function index()
	{
        redirect('driver/user/login');
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

        $this->form_validation->set_rules($this->driver_model->login_rules);
        // validate form
        if ($this->form_validation->run() == false)
        { 
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             $this->data['result'] = array(); 
        }
        else
        {
            $this->driver_model->user_login(set_value('email'),set_value('password'));

        }

        $this->data['meta_title'] = $this->data['meta_title'].' - Driver User login';

        $this->load->view('driver/login_view',$this->data);

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
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|email');
        if ($this->form_validation->run()==FALSE)
        {
            $this->load->view('driver/forget_password', $this->data, FALSE);
        }
        else
        {
            $result = $this->driver_model->get_by(array('email'=>$this->input->post('email')), NULL,  NULL, TRUE);
            
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
       if ($this->driver_model->log_out())
       {
           redirect('driver/user/login');
       }
       else
       {
            $this->session->set_flashdata('error', 'Not logged correct contact ',$this->config->item('blog_settings'));
            redirect('driver/user/login');
       }
       
    }
    /*---------------- ---------End of logout()---------------------------*/
    

}
/* End of file user.php */
/* Location: ./application/driver/controllers/user.php */

