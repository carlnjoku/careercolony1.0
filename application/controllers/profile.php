<?php 
class Profile extends CI_Controller
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
        
        
        
        public function edit_profile()
         {
            $user_id = $this->session->userdata('user_id');	
           
        	
        	// Get Company details
        	$handle_profile = curl_init();
			curl_setopt_array(
			$handle_profile,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/get_profile/$user_id",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
	
		   $response_profile = curl_exec($handle_profile);
		   $result_profile = json_decode($response_profile, true);
		   
		   
		   // Get Work -experience
        	$handle_work = curl_init();
			curl_setopt_array(
			$handle_work,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/work/$user_id",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
	
		   $response_work = curl_exec($handle_work);
		   $result_work = json_decode($response_work, true);
		   
		   // Get Work -experience
        	$handle_school = curl_init();
			curl_setopt_array(
			$handle_school,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/school/$user_id",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
	
		   $response_shcool = curl_exec($handle_school);
		   $result_school = json_decode($response_shcool, true);
		 	
		 	
		  
            $data['title'] = ' Edit Profile | Careercolony';
            $data['experience'] = $result_work;
            $data['profile'] = $result_profile;
            $data['result_school'] = $result_school;
            $data['main_content'] = 'profile/edit-profile';
			$this->load->view('includes/template_a', $data); 
        }
        
        public function profile_p()
         {
            $user_id = $this->session->userdata('user_id');	
           
        	
        	// Get Company details
        	$handle_profile = curl_init();
			curl_setopt_array(
			$handle_profile,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/get_profile/$user_id",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
	
		   $response_profile = curl_exec($handle_profile);
		   $result_profile = json_decode($response_profile, true);
		   
		   
		   // Get Work -experience
        	$handle_work = curl_init();
			curl_setopt_array(
			$handle_work,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/work/$user_id",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
	
		   $response_work = curl_exec($handle_work);
		   $result_work = json_decode($response_work, true);
		  
		 	
		   
            $data['title'] = ' Edit Profile | Careercolony';
            $data['profile'] = $result_profile;
            $data['experience'] = $result_work;
			$data['user_id'] = $user_id;
            //$data['main_content'] = 'profile/profile-public';
			$data['main_content'] = 'profile/profile-public-new';
			$this->load->view('includes/template_a', $data); 
        }
        
        
        
        public function blur()
        {
            $data['title'] = 'Edit Profile';
            $data['main_content'] = 'profile/blur';
			$this->load->view('includes/template_a', $data); 
        }
        
        public function images()
        {
            $data['title'] = 'Edit Profile';
            $data['main_content'] = 'profile/images';
			$this->load->view('includes/template_a', $data); 
        }
        
        function bg()
        {
        	// Send file name to database using curl
        $user_id = '1';
        $name = 'cali.jpg';
        
        //echo $user_id;
        $data = array('user_id'=>$user_id, 'profile_background'=>$name);
        // Url encode the array data
                    $encoded = '';
                    foreach($data as $name => $value){
                    @$encoded .= urlencode($name).'='.urlencode($value).'&';
                    }
                    // chop off the last ampersand
                    $encoded = substr($encoded, 0, strlen($encoded)-1);
           
                    // This cvdump
                    $handle2 = curl_init();

                    curl_setopt_array(
                    $handle2,
                    array(
                    	CURLOPT_URL => "http://localhost/neo4j-moviedb/web/profile",
                    	CURLOPT_POST => 1,
                		CURLOPT_POSTFIELDS => $encoded,
                		CURLOPT_RETURNTRANSFER => 1
                    )
           
                    );
           
                    echo $response2 = curl_exec($handle2);
                    
                    curl_close($handle2);
        
        }


}


?>  