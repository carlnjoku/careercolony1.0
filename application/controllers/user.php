<?php 
class User extends CI_Controller
{
    public $data = array('subview'=>'Sorry you have not subview loaded');
        function __construct()
        {
            
            
            parent::__construct();
            $this->load->library('user_agent');
            	
            	/*
            	$site_lang = 'french';
        		if ($site_lang) {
            		$this->lang->load('signup',$site_lang);
        		} else {
            		$this->lang->load('signup','french');
        		}
        		
        		*/
        		
        		$site_lang = 'english';
        		if ($site_lang) {
            		$this->lang->load('signup',$site_lang);
        		} else {
            		$this->lang->load('signup','english');
        		}
        		
            
            
        }
        
        
        public function index()
        {
            $this->load->view('start/login');
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
            $this->load->view('start/login',$data);
        }
        
        function create_session_after_login()
        {
        	$user_id = $this->uri->segment(3);
        	$session_data = array(
                'user_id' => $user_id,
                'logged_in' => 1
                               );
            $this->session->set_userdata($session_data);
            redirect('home/frontpage');
        }
        
        /*
        function validate_login()
        {
        
        	$email = $this->input->post('email');
        	$password = $this->input->post('password');
        	$password = md5($password);
        	
        	$email = $this->input->post('email');
        	$password = $this->input->post('password');
        	$password = md5($password);
        	
        	$formData = array(
				'email'=>$email,
				'password'=>$password
				
				
			);
			
			
			$encoded = '';
			foreach($formData as $name => $value){
				$encoded .= urlencode($name).'='.urlencode($value).'&';
			}
			// chop off the last ampersand
			$encoded = substr($encoded, 0, strlen($encoded)-1);
			
			
			// This cvdump
			$handle_user = curl_init();

			curl_setopt_array(
			$handle_user,
			array(
				CURLOPT_URL => "http://localhost/neo4j-moviedb/web/login",
				CURLOPT_POST => 1,
				CURLOPT_POSTFIELDS => $encoded,
				CURLOPT_RETURNTRANSFER => 1
			)
			
			);
			
			
			$response_user = curl_exec($handle_user);
			$result_user = json_decode($response_user, true);
			
			
			$user_id = $result_user['user_id'];
			$email =$result_user['email'];
			
			if(!$user_id) {redirect("user/login");}
			else
			{
			
			// set session user data
            $session_data = array(
                'user_id' =>$user_id,
                'email' => $email,
                'logged_in' => 1
            );
           $this->session->set_userdata($session_data);
           redirect("home/frontpage");
           }

        }
        */
        
        
        function signup()
        {
            $data['title'] = 'New Member Signup';
            //$data['main_content'] = 'signup_form';
            //$this->load->view('includes/template-front', $data);
            
            $this->load->view('start/signup', $data);
        }
        
        function create_session_after_signup()
        {
        	$user_id = $this->uri->segment(3);
        	$session_data = array(
                'user_id' => $user_id,
                'logged_in' => 1
                               );
            $this->session->set_userdata($session_data);
            redirect('start/basic_profile');
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
            $data['title'] = 'Email Confirmation';
            $this->load->view('includes/email_confirmation', $data);
        
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
            $this->load->view('start/reset_password', $data);
            
        
        }
        
        function process_reset_password()
        {
        	$email = urldecode($this->uri->segment(3));
        	echo 'password reset was successfully sent to '.$email;
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
                
        function sendMail()
		{
    		# Include the Autoloader (see "Libraries" for install instructions)
			require 'vendor/autoload.php';
			//use Mailgun\Mailgun;

			# Instantiate the client.
			$mgClient = new Mailgun('key-6a055f0b617724d4900848909eebe756');
			$domain = "sandbox9d8c359b09004c299b7932b976c9c4e2.mailgun.org";

			# Make the call to the client.
			$result = $mgClient->sendMessage("$domain",
                  array('from'    => 'Mailgun Sandbox <postmaster@sandbox9d8c359b09004c299b7932b976c9c4e2.mailgun.org>',
                        'to'      => 'Carl Njoku <carlnjoku@yahoo.com>',
                        'subject' => 'Hello Carl Njoku',
                        'text'    => 'Congratulations Carl Njoku, you just sent an email with Mailgun!  You are truly awesome!  You can see a record of this email in your logs: https://mailgun.com/cp/log .  You can send up to 300 emails/day from this sandbox server.  Next, you should add your own domain so you can send 10,000 emails/month for free.'));
    

	}


}


?>  