<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

 	function __construct()
    {
            
            parent::__construct();
             $this->load->library('user_agent');
            $site_lang = 'french';
        		if ($site_lang) {
            		$this->lang->load('signup',$site_lang);
        		} else {
            		$this->lang->load('signup','english');
        		}
            
            
			
			
    }

	public function login()
	{
		 /*
            //$this->load->library('user_agent'); 
                if ($this->agent->is_referral()) { 
                    $redirect_url = $this->agent->referrer();
                    //echo $redirect_url; 
                    redirect( $redirect_url );
                }
            */
            //$data['back']=$this->agent->referrer();
            
            $data['msg_first_name'] = $this->lang->line("msg_first_name");
            $data['title'] = 'Member Login';
            $data['main_content'] = 'login_form';
            $this->load->view('includes/login',$data);
	
	}

	public function home()
	{
		$id = $this->session->userdata('user_id');	
			
			
			// This cvdump
			$handle = curl_init();

			curl_setopt_array(
			$handle,
			array(
				CURLOPT_URL => "http://localhost/restfulserver/api/candidates/getCandidate/$id",
				CURLOPT_POST => false,
				//CURLOPT_POSTFIELDS => $data,
				CURLOPT_RETURNTRANSFER => true
			)
			
			);
			
			
			$response = curl_exec($handle);
			$result = json_decode($response, true);
			curl_close($handle);
			
	
			
		
			
			// Call the sidebar function
			$this->youMayKnow();
			$this->sidebar_candidate();
			
			$data['back']=$this->agent->referrer();
		
			$data['title'] = 'Welcome to Cvdump Resources';
			$data['result']= $result;
			
			
			$data['user_id'] = $this->session->userdata('user_id');
			
			//$data['main_content'] = 'dashboard';
			//$this->load->view('includes/template', $data);
			
			$data['main_content'] = 'candidates/dashboard';
			$this->load->view('includes/template_a', $data); 
	
	}
	
	public function index()
	{
		
		
		$data['title'] = 'Careercolony - A community for professionals';
		$this->load->view('home_page', $data);
	}
	
	


}



