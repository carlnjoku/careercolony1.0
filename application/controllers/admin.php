<?php 
class Admin extends CI_Controller
{
    public $data = array('subview'=>'Sorry you have not subview loaded');
        function __construct()
        {
            
            parent::__construct();
            $this->load->library('user_agent');
            $site_lang = 'english';
        		if ($site_lang) {
            		$this->lang->load('signup',$site_lang);
        		} else {
            		$this->lang->load('signup','english');
        		}
        		
        	if($this->session->userdata('logged_in') == FALSE)
			{
				redirect('user/login');
			}
			else
			{
			
			}
		
            
        }
        
        
        
        
        public function addIndustry()
        {
            $data['title'] = 'Add Industry';
            $data['main_content'] = 'admin/add-industry';
			$this->load->view('includes/template_a', $data); 
        }
        
        


}


?>  