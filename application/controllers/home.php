<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
        	if($this->session->userdata('logged_in') == FALSE)
			{
				redirect('user/login');
			}
			else
			{
			
			}
            
    }

	// This is a phrase

	public function frontpage()
	{
		$user_id = $this->session->userdata('user_id');	
			
		$data['back']=$this->agent->referrer();
		
		$data['title'] = 'Home | Careercolony';
		
		
		$handle_userDetails = curl_init();
		curl_setopt_array(
		$handle_userDetails,
			array(
				CURLOPT_URL => "http://localhost/neo4j-moviedb/web/get_basic/$user_id",
				CURLOPT_POST => false,
				CURLOPT_RETURNTRANSFER => true
			)
			
		);
		
		
			
		$response_userDetails = curl_exec($handle_userDetails);
		$result_userDetails = json_decode($response_userDetails, true);
		
		
		
		$data['user_id'] = $this->session->userdata('user_id');
		$data['main_content'] = 'home/dashboard';
		$data['userdetails'] = $result_userDetails;
		$this->load->view('includes/template_a', $data); 
	
	}
	
	public function index()
	{
		$data['title'] = 'Careercolony - A community for professionals';
		$this->load->view('home_page', $data);
	}
	
	function test()
	{
		echo 'This is a test message';
	
	}
	
	


}