<?php
/**
*
*
* @copyright  2015
* @license    None
* @version    1.0
* @link       None
* @since      Class available since Release 1.0
*
**/     
        
/***********************************************************************************/
/*                                                                                 */
/* File Name     : User.php                                           */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class User extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		// $this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('user_model');
	}	
	
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
	function index()
	{
        // $this->load->model('user_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('user/user/index');
        $config['total_rows'] = $this->user_model->count();
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->user_model->get('id,first_name,last_name,password,male,email,status,user_type', NULL, FALSE,$config['per_page'],$this->uri->segment(3));
        $this->data['meta_title'] = $this->data['meta_title'].' - User list';
        $this->data['sub_view'] = 'user_list';

        $this->load->view('developer/_layout_main',$this->data);

	}//Function End Index()---------------------------------------------------FUNEND()

	
    
    /*************************Start Function edit()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
    function edit($id=NULL)
    {
        // load form valition
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        $this->data['add_or_save'] = 'Add';
        // validate form
        if($id)
        {
            $this->data['add_or_save'] ='Edit';
            $this->data['result'] = $this->user_model->get('id,first_name,last_name,password,male,email,status,user_type', $id,TRUE,1,0);
            count($this->data['result']) || ($this->data['error'][] = 'page could not be found');
        }
        else
        {
            $this->data['result'] = $this->user_model->get_new();
        }

        // Set up the form and rules         
        $this->form_validation->set_rules($this->user_model->rules);

        // process the form
        if($this->form_validation->run() == TRUE){
            // get the data from form
            $data = $this->post_get_as_array(array("id","first_name","last_name","password","male","email","status","user_type"));
            // data save                      
            if ($this->user_model->save($data, $this->input->post('id')) == TRUE)
            {
                redirect(site_url('developer/user/index/'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

            }
        }

        // load individula view        
        $this->data['meta_title'] = $this->data['meta_title'].' - '.$this->data['add_or_save'].' User';

        $this->data['sub_view'] = 'user_edit';
        // load view
        $this->load->view('developer/_layout_modal',$this->data);
    }//Function End edit()---------------------------------------------------FUNEND()
    


    /*************************Start Function view()***********************************/
    //Owner : Madhuranga Senadheera
    // View individual 
    //@ type :
    //#return type :
    function view($id)
    {
        //  get data
        $this->data['result'] = $this->user_model->get('id,first_name,last_name,password,male,email,status,user_type', $id,TRUE,1,0);
        
        $this->data['sub_view'] = 'user_view';
        // load view
        $this->load->view('developer/layout_modal',$this->data);
    }

	/*************************Start Function view()***********************************/
    //Owner : Madhuranga Senadheera
    // Delete 
    //@ type :
    //#return type :
    function delete($id)
    {
        if($this->user_model->delete($id))
        {
            redirect(site_url('developer/user/index/?msg=Successfully delete'));
        }
        else
        {
            redirect(site_url('developer/user/index/?error=Not delete'));
        }
        
    }
}

/* End of file user.php */
/* Location: ./system/application/controllers/user.php */