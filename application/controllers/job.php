<?php 
class Job extends CI_Controller
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
        
        public function home()
        {
        	$data['title'] = 'Member Login';
            $data['main_content'] = 'company/all_companies_home';
			$this->load->view('includes/template_a', $data); 
        
        }
        
        public function chk_if_exists()
        {
        	$company = '1';
        	if($company =='0') {redirect('company/c_info');}else{redirect('company/all_c_home');}
        
        }
        
        public function all_c_home() // All suggested companies including companies your are following
        {
            $data['title'] = 'Member Login';
            $data['main_content'] = 'company/all_companies_home';
			$this->load->view('includes/template_a', $data); 
        }
        
         public function admin_home()
        {
            $data['title'] = 'Member Login';
            $data['main_content'] = 'company/admin_home';
			$this->load->view('includes/template_a', $data); 
        }
        
        public function view_profile()
        {
            $data['title'] = 'Member Login';
            $data['main_content'] = 'company/view-profile';
			$this->load->view('includes/template_a', $data); 
        }
        
        
        public function edit_company()
        {
            $data['title'] = 'Member Login';
            $data['main_content'] = 'company/edit-company';
            $this->load->view('includes/template_a', $data); 
        }
        
        public function p_home()
        {
            $data['title'] = 'Member Login';
            $data['main_content'] = 'company/public-view-home';
            $this->load->view('includes/template_a', $data); 
        }
        
        public function p_about()
        {
            $data['title'] = 'Member Login';
            $data['main_content'] = 'company/public-view-about';
            $this->load->view('includes/template_a', $data); 
        }
        
        public function p_careers()
        {
            $data['title'] = 'Member Login';
            $data['main_content'] = 'company/public-view-careers';
            $this->load->view('includes/template_a', $data); 
        }
        
        public function p_gallery()
        {
            $data['title'] = 'Member Login';
            $data['main_content'] = 'company/public-view-gallery';
            $this->load->view('includes/template_a', $data); 
        }
        
        public function p_follow()
        {
            $data['title'] = 'Member Login';
            $data['main_content'] = 'company/public-view-follow';
            $this->load->view('includes/template_a', $data); 
        }
        
        function create_company()
        {
        	$user_id = $this->session->userdata('user_id');	
        	$this->load->model('app_model');
    		$result = $this->app_model->get_industry();
    		
    		$data['title'] = 'Create New Company';
    		$data['industry'] = $result;
    		$data['user_id'] = $user_id;
            $data['main_content'] = 'company/create-company';
            $this->load->view('includes/template_a', $data); 
        
        }
        
        	
		
		function do_upload()
		{
    		$config['upload_path'] = './uploads/';
    		$config['allowed_types'] = 'gif|jpg|png';
    		$config['max_size'] = '100';
    		$config['max_width']  = '1024';
    		$config['max_height']  = '768';
    		$config['overwrite'] = TRUE;
    		$config['encrypt_name'] = FALSE;
    		$config['remove_spaces'] = TRUE;
    		if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
    			$this->load->library('upload', $config);
    		if ( ! $this->upload->do_upload('userfile')) {
       			 echo 'error';
    		} else {

        		return array('upload_data' => $this->upload->data());
    		}
		}
		
		function upload_me()
		{
			$this->load->view('company/testupload');
		
		}
		
		function setup_email_create_company()
		{
			echo "Hi Carl,
 
				You're all set up! Start using your Company Page to share company news, interact with customers, and build your brand today. Go to your page
 				A few tips to get you started:
			•	
 
			How-to video: Promoting your Company Page
 
			•	
 
			Tips: 15 Tips for Compelling Company Page Updates
 
			•	
 
			Company Page FAQs and Best Practices";
 

		
		}
		
		function cropit()
		{
			$this->load->view('company/cropit'); 
		
		}
		
		function process_cropit()
		{
		
			define('UPLOAD_DIR', 'uploads/');
			$img = $_POST['image-data'];
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = UPLOAD_DIR . uniqid() . '.png';
			
			$success = file_put_contents($file, $data);
			
			$file_name = substr($file, 8);
			
			$coy = $_POST['companyname'];
			echo $coy;
			echo $file_name;

		}

}


?>