<?php 
class Start extends CI_Controller
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
        
        public function index()
        {
            $this->load->view('login_form');
        }
        
        function sign()
        {
        	$data['title'] = 'New Member Signup';
           
            
            $this->load->view('includes/sign', $data);
        
        
        }
   
        function login()
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
            $data['main_content'] = 'login_video';
            $this->load->view('includes/login',$data);
        }
        
        function testdrop()
        {
        	
        	$data['main_content'] = 'login_form';
            $this->load->view('start/testdrop',$data);
        
        }
        
        function validate_credentials_old()
        {
            //echo md5('password');
            //print'<pre>';
            //print_r($data);
            $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]|max_length[35]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[32]');
            
            if($this->form_validation->run()==FALSE) // Validations did not run
            {
                //redirect ('user/login');
                $data['title'] = 'Member Login';
                $data['main_content'] = 'login_form';
                $this->load->view('includes/login');
                
            }
            else
            {
            // set variables from the form
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $data = array(
                    'Username' => $username,
                    'Password'=> md5($password)
        
                );
            
            $this->load->model('user_model');
            if ($this->user_model->validate($data)) {
                $user_id    = $this->user_model->getUser($username);
                
                
                // set session user datas
                $session_data = array(
                    'user_id' =>$user_id,
                    'username' => $rows->Username,
                    'email' => $rows->Email,
                    'logged_in' => 1
                );
                   $this->session->set_userdata($session_data);
                   redirect('myjobs/dashboard');
               
                
            } else {
                
                // login failed
                $data['error'] = 'Wrong username or password.';
                
                // send error to the view
                $data['title'] = 'Member Login';
                $data['main_content'] = 'login_form';
                $this->load->view('includes/login');
                
            }
            
        }
                /*
                $this->load->model('user_model');
                
                $username = $this->input->post('username');
                $passwords = $this->input->post('password');
        
                $data = array(
                    'Username' => $username,
                    'Password'=> md5($passwords)
        
                );
                
                redirect('myjobs/dashboard');
                
                $query = $this->user_model->validate($data);
                if($query) { // if credentials are correct 
                    
                //print_r($query);
                
                print'<pre>';
                 print_r($query);
           
                   foreach($query as $key => $rows)
                {
                       $userid = $rows->ID;
                       $password = $rows->Password;
                       //$alert_query = $rows->alert_query;
               
                               
                       //if(($passwords === $rows->Password) || ((ALLOW_ADMIN_LOGIN=='YES')&&(ADMIN_PASSWORD===$passwords))) {
                       if($password) {
                      
                      $session_data = array(
                               'user_id' =>$userid,
                               'username' => $rows->Username,
                               'email' => $rows->Email,
                               'logged_in' => 1
                               );
                           $this->session->set_userdata($session_data);
                           redirect('myjobs/dashboard');
               
                       }else{
               
                           return false;    
                       }
                }
                
                    
                    
                
                }
                else
                {
                    //if credentials are incorrect redirect to login page
                    redirect('user/login1');
                    
                
                }
                */
                
                
            
        }
        
        // Create session and login to account
        function validate_credentials()
        {
            
            $session_data = array(
                'user_id' => $userid,
                'username' => $rows->Username,
                'email' => $rows->Email,
                'logged_in' => 1
                               );
            $this->session->set_userdata($session_data);
            redirect('myjobs/dashboard');
               
        
        
        }
    
        
        
        function signup()
        {
            $data['title'] = 'New Member Signup';
            //$data['main_content'] = 'signup_form';
            //$this->load->view('includes/template-front', $data);
            
            $this->load->view('start/signup', $data);
        }
        
        function send_confirmation_email()
        {
            $email = $this->uri->segment(3);
            
            /*
            $this->load->library('email');
            $this->email->from('carl@careercolony.com', 'Your Name');
            $this->email->to($email);
            //$this->email->cc('another@another-example.com');
            //$this->email->bcc('them@their-example.com');

            $this->email->subject('Email Test');
            $this->email->message('Testing the email class.');

            $this->email->send();

            echo $this->email->print_debugger();
            //redirect('user/email_confirm');
            
            */
            
            $config = array(
                  'protocol' => 'smtp',
                  'smtp_host' => 'ssl://smtp.googlemail.com',
                  'smtp_port' => 465,
                  'smtp_user' => 'flavoursoft@gmail.com', 
                  'smtp_pass' => '4340angel'
                 
            );


            $this->load->library('email', $config);

            $this->email->initialize($config); // Add 

            $this->email->from('flavoursoft@gmail.com');
            $this->email->to($email);
            $this->email->subject('testing');

            $message = 'test';
            $this->email->message($message);

            if($this->email->send()) {
                  echo 'Email sent.';    
            } else {
              print_r($this->email->print_debugger());  
            }
        
            redirect('user/email_confirm');
        }
        
        function live_search()
        {
        	
        	$data['title'] = "Basic Profile";
        	$this->load->view('includes/live_search', $data);
        
        }
        
        
        
        function create_new_member()
        {
            // Validate user input 
            $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|call_back_check_if_email_exists');
            $this->form_validation->set_rules('companyname', 'Company Name', 'trim|required');
            $this->form_validation->set_rules('url', 'Preferred Url', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
            
            if($this->form_validation->run()==FALSE) // Validations did not run
            {
            
                $data['main_content'] = 'signup_form';
                $data['title'] = 'Create new account';
                $this->load->view('includes/template-login', $data);
            }
            
            else
            {
                $this->load->model('user_model');
                if($query = $this->user_model->create_member()) 
                {
                    $data1['site_id']= $query;
                    
                    // update insert_id in users table
                    $query1 = $this->user_model->update_insert_id($data1, $query);
                    // Create user account a redirect to login page
                    $data['account_created']= 'Congrats ! your account has been created';
                    $data['title'] = 'Congrats ! your account has been created';
                    $data['main_content'] = 'signup_setup';
                    $this->load->view('includes/template-login', $data);
                }
                else
                {
                    // Return error and display form again if record is not inserted to the dbase
                    $data['message']= 'Sorry ! your account was not created, please try again';
                    $data['main_content'] = 'signup_form';
                    $this->load->view('includes/template-front', $data);
                }
                
            }

        }

        
        function check_if_username_exists($username)
        {
            $this->load->model('user_model');
            $username_availabe = $this->user_model->check_if_username_exists($username);
            if($username_availabe) {
                return true;
            }else{
                return false;
            }
            
        }
        
        
        function check_if_email_exists($email)
        {
            $this->load->model('user_model');
            $email_availabe = $this->user_model->check_if_username_exists($email);
            if($email_availabe) {
                return true;
            }else{
                return false;
            }
        }
        
        function email_confirm()
        {
            $user_id = $this->session->userdata('user_id');	
            
            $data['title'] = 'Email Confirmation';
            $this->load->view('emails/reset-password.php', $data);
        
        }
        
        function process_confirm()
        {
        	$user_id = $this->session->userdata('user_id');	
			
			$data['back']=$this->agent->referrer();
			$data['title'] = 'Home | Careercolony';
		
		
			$handle_userDetails = curl_init();
			curl_setopt_array(
			$handle_userDetails,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/confirm_email/$user_id",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
		
		
			
			$response_userDetails = curl_exec($handle_userDetails);
			$result_userDetails = json_decode($response_userDetails, true);
			
			redirect('home/frontpage');
			
			
        
        }
        
        function e_status()
        {
        	if($employment_status == '1'){ echo 'enter';}else{ echo 'unemp';} 
        }
        
        
        function basic_profile()
        {
			require_once(APPPATH.'libraries/geoplugin.class.php');
			$geoplugin = new geoPlugin();
			
			//$employment_status = $this->input->post('set_employment_status');
			$employment_status = 'employed';
			

			
			$country_name = $geoplugin->countryName;
			
			
			/*
			echo "Geolocation results for this ip {$geoplugin->ip}: <br />\n".
			"City: {$geoplugin->city} <br />\n".
			"Region: {$geoplugin->region} <br />\n".
			"Area Code: {$geoplugin->areaCode} <br />\n".
			"DMA Code: {$geoplugin->dmaCode} <br />\n".
			"Country Name: {$geoplugin->countryName} <br />\n".
			"Country Code: {$geoplugin->countryCode} <br />\n".
			"Longitude: {$geoplugin->longitude} <br />\n".
			"Latitude: {$geoplugin->latitude} <br />\n".
			"Currency Code: {$geoplugin->currencyCode} <br />\n".
			"Currency Symbol: {$geoplugin->currencySymbol} <br />\n".
			"Exchange Rate: {$geoplugin->currencyConverter} <br />\n";
	
			*/
			
			$user_id = $this->session->userdata('user_id');	
        	$this->load->model('app_model');
    		$industry = $this->app_model->get_industry();
	
			$handle_industry = curl_init();
			curl_setopt_array(
			$handle_industry,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/get_industry",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
		
		
			
			$response_industry = curl_exec($handle_industry);
			$result_industry = json_decode($response_industry, true);
			
		
        	
        	$data['user_id'] = $this->session->userdata('user_id');
        	$data['title'] = "Basic Profile";
        	$data['employment_status'] = $employment_status;
        	$data['country_name'] = $country_name;
        	$data['industry'] = $result_industry;
        	$this->load->view('start/basic_profile', $data);
        }
        
        function mee()
        {
        	
        	$data['user_id'] = $this->session->userdata('user_id');
        	$data['title'] = "Basic Profile";
        	
        	$this->load->view('start/basic', $data);
			
		}
        
        
        
        function logout()
        {
           $this->session->unset_userdata('logged_in');
           session_destroy();
           redirect('user/login');
        }
        
         function reset_password()
        {
            $data['title'] = 'Email Confirmation';
            $this->load->view('includes/forgot_password', $data);
        
        }
                
                
                // Add a new resume 
                function add_new_user()
                {

                    //$data['title'] = 'AbilityBox - Administrative ettings';
                    //$data['main_content'] = 'new_resume_view';

                    $data = array(
                              //'user_id'=>$_POST['user_id'],
                              //'site_id'=>$_POST['site_id'],
                              'firstname' =>$_POST['f_name'],
                              'lastname'=>$_POST['l_name'],
                              //'email'=>$_POST['1_email'],
                              //'department'=>$_POST['1_department'],
                              //'password'=>$_POST['1_password'],
                              //'type'=>$_POST['1_type'],
                              //'mobile'=>$_POST['1_mobile']
                              

                    );

                    // Prepare user session data
                    //$data['user'] = $this->session->userdata('username');

                    $data['user_id'] = $this->session->userdata('user_id');
                    $data['site_id'] = $this->session->userdata('site_id');
                    $data['email'] = $this->session->userdata('email');
                    $data['user_type'] = $this->session->userdata('user_type');
                    $this->load->model('user_model');
                    $this->user_model->add_user_by_admin($data);



                }


}


?>  