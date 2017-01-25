<?php 
class Company extends CI_Controller
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
        
        public function view_profile()
        {
            $data['title'] = 'Member Login';
            $data['main_content'] = 'company/view-profile';
			$this->load->view('includes/template_a', $data); 
        }
        
        
        
        
        function create_company()
        {
        	$user_id = $this->session->userdata('user_id');	
        	$this->load->model('app_model');
    		$industry = $this->app_model->get_industry();
    		$companyType = $this->app_model->get_companytype();
    		
    		$data['title'] = 'Create New Company';
    		$data['industry'] = $industry;
    		$data['companyType'] = $companyType;
    		$data['user_id'] = $user_id;
            $data['main_content'] = 'company/create-company';
            $this->load->view('includes/template_a', $data); 
        
        }
        
        public function chk_if_exists()
        {
        	$user_id = $this->session->userdata('user_id');	
        	
        	$handle_companyDetails = curl_init();
			curl_setopt_array(
			$handle_companyDetails,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/chk_if_company_exists/$user_id",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
	
		   $response_company = curl_exec($handle_companyDetails);
		
        	if($response_company =='0') {redirect('company/companies');}else{redirect('company/mycoys');}
        
        }
        
        function companies()
        {
        	// List of companies you may follow as per your selected industry
        	
        	
        	
        	// Link to create a company
        	
        	$data['title'] = 'Company Home';
        	$data['main_content'] = 'company/home';
            $this->load->view('includes/template_a', $data); 
        
        }
        
        public function all_c_home() // All suggested companies including companies your are following
        {
           
            
            
            $data['title'] = 'Member Login';
            $data['main_content'] = 'company/all_companies_home';
			$this->load->view('includes/template_a', $data); 
        }
        
         public function mycoys()
         {
            $data['title'] = 'Company Home Page';
            $data['main_content'] = 'company/admin_home';
			$data['user_id'] = $this->session->userdata('user_id');
			$this->load->view('includes/template_a', $data); 
        }
		public function admin_home_partials()
		{
			$data['user_id'] = $this->session->userdata('user_id');	
            $this->load->view('company/partials/edit/admin-home', $data); 
		}

		
        public function coypg()
         {
            $user_id = $this->session->userdata('user_id');	
            $coyID = $this->uri->segment(3);
        	
        	// Get Company details
        	$handle_companyDetails = curl_init();
			curl_setopt_array(
			$handle_companyDetails,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/get_company/$coyID",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
	
		   $response_companyDetails = curl_exec($handle_companyDetails);
		   $result_companyDetails = json_decode($response_companyDetails, true);
		
		   foreach($result_companyDetails as $key=>$value)
		   {
		   		$companyname = $value['companyname']; 
		   }
           
           
           // Get company posts
        	$handle_companyPosts = curl_init();
			curl_setopt_array(
			$handle_companyPosts,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/get_company_posts/$coyID",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
	
		   $response_companyPosts = curl_exec($handle_companyPosts);
		   $result_companyPosts = json_decode($response_companyPosts, true);
        	
            $data['title'] = $companyname.' Page Overview | Careercolony';
            $data['companyDetails'] = $result_companyDetails;
            $data['companyPosts'] = $result_companyPosts;
            $data['main_content'] = 'company/company-page';
			$this->load->view('includes/template_a', $data); 
        }
        
        
        public function coypg_dev()
         {
            $user_id = $this->session->userdata('user_id');	
            $coyID = $this->uri->segment(3);
        	
        	// Get Company details
        	$handle_companyDetails = curl_init();
			curl_setopt_array(
			$handle_companyDetails,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/get_company/$coyID",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
	
		   $response_companyDetails = curl_exec($handle_companyDetails);
		   $result_companyDetails = json_decode($response_companyDetails, true);
		
		   foreach($result_companyDetails as $key=>$value)
		   {
		   		$companyname = $value['companyname']; 
		   }
           
           
           // Get company posts
        	$handle_companyPosts = curl_init();
			curl_setopt_array(
			$handle_companyPosts,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/get_company_posts/$coyID",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
	
		   $response_companyPosts = curl_exec($handle_companyPosts);
		   $result_companyPosts = json_decode($response_companyPosts, true);
        	
           $data['title'] = $companyname.' Page Overview | Careercolony';
           $data['companyDetails'] = $result_companyDetails;
           $data['companyPosts'] = $result_companyPosts;
           $data['main_content'] = 'company/dev-company-page';
		   $this->load->view('includes/template_a', $data); 
        }
        
        public function load_more_post()
         {
            $user_id = $this->session->userdata('user_id');	
           
            
            // get request params
			$last_id = $_POST['last_id'];
			$coyID = $_POST['coyID'];
        	
            //return $last_id; 
			$limit = 6; // default value
			if (isset($_POST['limit'])) {
				$limit = intval($_POST['limit']);
			}
           
           $data = array('coyID'=>$coyID, 'last_id'=>$last_id);
           
           //echo $coyID;
           //echo $last_id; 
           //print_r($data);
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
                    	CURLOPT_URL => "http://localhost/neo4j-moviedb/web/load_more_company_posts",
                    	CURLOPT_POST => 1,
                		CURLOPT_POSTFIELDS => $encoded,
                		CURLOPT_RETURNTRANSFER => 1
                    )
           
                    );
           
                   $more_posts = curl_exec($handle2);
                   $result_post = json_decode($more_posts, true);
                    
                   curl_close($handle2);
			

		   $last_id = 0;
		   foreach ($result_post as $rows) {
    			$last_id = $rows['postID'];
    			$postID = $rows['postID'];
				$companyname = $rows['companyname'];
				$post_text = $rows['post_text'];
				$post_time = $rows['post_time'];
				$post_image = $rows['post_image'];
				$post_video = $rows['post_video'];
    			
    			echo'
    				<img class="media-object pull-left thumb" src="'.base_url().'uploads/57c5648e67fd8.png" width="90" alt="Image" />

    				<div class="media-body">

			<div class="widget widget-heading-simple widget-body-white">
	<div class="widget-body padding-none">
		
		<div class="innerAll">
			<div class="muted separator bottom">
				<div class="pull-right label label-default"> <em>3 days ago</em></div>
				<h5 class="strong muted text-uppercase"><i class="fa fa-user "></i>'.$postID.' '.$companyname.'</h5>
				<span>on <a href="#">Quick Admin Template</a><span>
			</div>
			<p class="margin-none">'.$post_text.'</p>
		</div>
		<div class="bg-inverse">
			<img src="'.base_url().'uploads/company_banner/banner2.jpg" class="img-responsive" />
		</div>
		<div class="bottom-social border-bottom innerAll half bg-gray">
			<a href=""><i class="fa fa-comment"></i> Comment</a> 
			<a href=""><i class="fa fa-share"></i> Share Post</a>
		</div>
		
		<div class="innerAll">
			<ul class="list-group social-comments margin-none">
				<li class="list-group-item">
					<img src="'.base_url().'assets/images/avatar-36x36.jpg" alt="Avatar" class="pull-left" />
				 	<div class="user-info">
					 	<div class="row">
					 		<div class="col-md-3">
						 		<a href="">Adrian Demian</a> 
						 		<abbr>4 days ago</abbr>
						 	</div>
							<div class="col-md-9">
					 			<span> Wow... nice post</span>
					 	 	</div>
					 	 </div>
				 	</div>
				</li>
				<li class="list-group-item">
					<img src="'.base_url().'assets/images/6.jpg" alt="Avatar" width="40" class="pull-left" />
					<div class="user-info">
						<div class="row">
						 	<div class="col-md-3">
							 	<a href="">Adrian Demian</a> 
							 	<abbr>4 days ago</abbr>
							</div>
							<div class="col-md-9">
						 		<span> Wow... nice post</span>
						 	</div>
						</div>
					</div>
				</li>
				<li class="list-group-item innerAll">
					<form id="comment<?php echo $postID; ?>">
					<input type="text" onkeydown="myFunction('.$postID.')" id="message" name="message" id="message" class="form-control input-sm" placeholder="Comment here cool..." />
					
					<button type="submit" onclick="addComment('.$postID.');" style="display:none; margin:5px 5px 0px 0px" class="btn btn-xs btn-info comment_button" id="submit"><i class="fa fa-reply"></i> Reply</button>
					<form>
				</li>
				<script>
					function myFunction() {
    					$(".comment_button").show();
					}
				</script>
			</ul>
		</div>
	</div>
</div>



</div>';
			}



			if ($last_id != 0) {
				echo '<script type="text/javascript">var last_id = '.$last_id.';</script>';
			}
        	
        
          
        }
        
        public function coypg_dev1()
         {
            $user_id = $this->session->userdata('user_id');	
            $coyID = $this->uri->segment(3);
        	
        	// Get Company details
        	$handle_companyDetails = curl_init();
			curl_setopt_array(
			$handle_companyDetails,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/get_company/$coyID",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
	
		   $response_companyDetails = curl_exec($handle_companyDetails);
		   $result_companyDetails = json_decode($response_companyDetails, true);
		
		   foreach($result_companyDetails as $key=>$value)
		   {
		   		$companyname = $value['companyname']; 
		   }
           
           
           // Get company posts
        	$handle_companyPosts = curl_init();
			curl_setopt_array(
			$handle_companyPosts,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/get_company_posts/$coyID",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
	
		   $response_companyPosts = curl_exec($handle_companyPosts);
		   $result_companyPosts = json_decode($response_companyPosts, true);
        	
            $data['title'] = $companyname.' Page Overview | Careercolony';
            $data['companyDetails'] = $result_companyDetails;
            $data['companyPosts'] = $result_companyPosts;
            $data['main_content'] = 'company/dev1-company-page';
			$this->load->view('includes/template_a', $data); 
        }
        
        function coypost()
        {
        	$coyID = $this->uri->segment(3);
        	// Get company posts
        	$handle_companyPosts = curl_init();
			curl_setopt_array(
			$handle_companyPosts,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/get_company_posts/$coyID",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
	
		   echo $response_companyPosts = curl_exec($handle_companyPosts);
        
        }
        
        
        public function edit_company()
        {
            $user_id = $this->session->userdata('user_id');	
            $coyID = $this->uri->segment(3);
        	
        	$this->load->model('app_model');
    		$query1 = $this->app_model->get_industry();
    		$query2 = $this->app_model->get_companytype();
    		
    		
    		
    		
    		
    		$handle_companyDetails = curl_init();
			curl_setopt_array(
			$handle_companyDetails,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/get_company/$coyID",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
		
		
			
			$response_companyDetails = curl_exec($handle_companyDetails);
			$result_companyDetails = json_decode($response_companyDetails, true);

			//print'<pre>';
			//print_r($result_companyDetails);
		
		
    		
            $data['title'] = 'Update Company Page';
            $data['query1'] = $query1;
            $data['query2'] = $query2;
            $data['user_id'] = $this->session->userdata('user_id');	
            $data['companyDetails'] = $result_companyDetails;
            $data['main_content'] = 'company/edit-company';
            $this->load->view('includes/template_a', $data); 
        }
        
        
        
        function editCompany()
        {
        	
        	
        	$user_id = $this->session->userdata('user_id');	
        	$this->load->model('app_model');
        	
        	$user_id = $this->input->post('user_id');
        	$coyID = $this->input->post('coyID');
        	$companyname = $this->input->post('companyname');
        	$companytype = $this->input->post('companytype');
        	$companyemail = $this->input->post('companyemail');
        	$companydescription = $this->input->post('companydescription');
        	$founded = $this->input->post('founded');
        	$website = $this->input->post('website');
        	$address = $this->input->post('address');
        	$city = $this->input->post('city');
        	$state = $this->input->post('state');
        	$country = $this->input->post('country');
        	
        
        
        
        	// Get image file name - cropit
        	define('UPLOAD_DIR', 'uploads/');
			$img = $_POST['image-data'];
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = UPLOAD_DIR . uniqid() . '.png';
			
			$success = file_put_contents($file, $data);
			
			$logo = substr($file, 8);
			
			
        	$formData = array(
            	'user_id' => $user_id,
            	'coyID' => $coyID,
            	'companyname' => $companyname,
            	'companytype' => $companytype,
            	'companyemail' => $companyemail,
            	'companydescription' => $companydescription,
            	'founded' => $founded,
            	'website' => $website,
            	'logo' => $logo,
            	'address' => $address,
            	'city' => $city,
            	'state' => $state,
            	'country' => $country
        	);
       
        	
        	
        	// Process the serialize job alert query string to extract the value
			$encoded = '';
			foreach($formData as $name => $value){
				$encoded .= urlencode($name).'='.urlencode($value).'&';
			}
			// chop off the last ampersand
			$encoded = substr($encoded, 0, strlen($encoded)-1);
        	
        	
        	// 
			$handle = curl_init();

			curl_setopt_array(
			$handle,
			array(
				CURLOPT_URL => "http://localhost/neo4j-moviedb/web/update_company",
				CURLOPT_POST => 1,
				CURLOPT_POSTFIELDS => $encoded,
				CURLOPT_RETURNTRANSFER => 1
			)
			
			);
			
			echo $response = curl_exec($handle);
			$result = json_decode($response, true);
			
			//return $response;
			
			
			
			
			curl_close($handle);
        
        }
        
        
		

		function main_company_page()
		{

		}

		function home_company_name()
		{
			$data['title'] = 'Company Name';
            $data['main_content'] = 'company/public-view-company-home';
            $this->load->view('includes/template_a', $data); 
		}
        
        public function p_home()
        {
            $data['title'] = 'Home';
            $data['user_id'] = $user_id = $this->session->userdata('user_id');
            $this->load->view('company/partials/public-view-home', $data); 
			
        }
        

        public function p_about()
        {
            $data['title'] = 'About Us';
            $data['user_id'] = $user_id = $this->session->userdata('user_id');
            $this->load->view('company/partials/public-view-about', $data); 
        }

		public function p_services()
        {
            $data['title'] = 'Srevices';
            $data['user_id'] = $user_id = $this->session->userdata('user_id');
            $this->load->view('company/partials/public-view-services', $data); 
			
        }
        
        public function p_careers()
        {
            $data['title'] = 'Careers';
            $data['user_id'] = $user_id = $this->session->userdata('user_id');
            $this->load->view('company/partials/public-view-careers', $data); 
        }
        
        public function p_events()
        {
            $data['title'] = 'Events';
            $data['user_id'] = $user_id = $this->session->userdata('user_id');
            $this->load->view('company/partials/public-view-events', $data); 
        }
        
        public function p_follow()
        {
            $data['title'] = 'Member Login';
            $data['main_content'] = 'company/public-view-follow';
            $this->load->view('includes/template_a', $data); 
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
		
		function test_uploader()
		{
			$data['title'] = 'Test uploader';
            $data['main_content'] = 'company/test-uploader';
            $this->load->view('includes/template_a', $data); 
		
		}
		
		function sticky()
		{
			
			
			$data['main_content'] = 'company/sticky';
            $this->load->view('includes/template_a', $data); 
		
		}
		
		
		function new_coy_page()
		{
			$data['title'] = 'Test uploader';
            $data['main_content'] = 'company/test-company-page.php';
            $this->load->view('includes/template_a', $data); 
		
		}
		
		function uploadtest()
		{
			 
			  $data['main_content'] = 'company/uploadtest';
            $this->load->view('includes/template_a', $data); 

		}
		
		function lazyloader()
		{
			
			// Get company posts
        	$handle_companyPosts = curl_init();
			curl_setopt_array(
			$handle_companyPosts,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/usersall",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
	
		   $response_companyPosts = curl_exec($handle_companyPosts);
		   $result_users = json_decode($response_companyPosts, true);
        	
            $data['title'] =' Page Overview | Careercolony';
            $data['result_users'] = $result_users;
            $data['main_content'] = 'company/lazyloader';
            $data['user_id'] = $this->session->userdata('user_id');
			$this->load->view('includes/template_a', $data); 
		
		}
		
		
		function load_more()
		{
			// get request params
			$last_id = $_POST['last_id'];
			
			//return $last_id; 
			$limit = 5; // default value
			if (isset($_POST['limit'])) {
				$limit = intval($_POST['limit']);
			}
			
			// Get company posts
        	$handle_companyPosts = curl_init();
			curl_setopt_array(
			$handle_companyPosts,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/usersall_loadmore/$last_id",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
	
		    $response_companyPosts = curl_exec($handle_companyPosts);
		    $result_users = json_decode($response_companyPosts, true);
		 
		    
		    $last_id = 0;
			foreach ($result_users as $rs) {
    			$last_id = $rs['user_id'];
    			echo '<li>';
    			echo '<h5>'.$rs['firstname'].' '.$rs['lastname'];'</h5>';
    			echo '<img class="media-object pull-left thumb" width="40" src="http://localhost/careercolony1.0/uploads/logo_flavour.png">';
    			echo '<p>'.$rs['email'].'</p>';
    			echo '</li>';
			}



			if ($last_id != 0) {
				echo '<script type="text/javascript">var last_id = '.$last_id.';</script>';
			}
			
		}
		
		// Newest Version 
		function landingPage()
		{
			
			$data['user_id'] = $this->session->userdata('user_id');	
			$data['main_content'] = 'company/first_company_page.php';
            $this->load->view('includes/template_a', $data); 
		}
		

		// Edit Mode ////////////////////
		
		function company_home()
		{
			$data['user_id'] = $this->session->userdata('user_id');	
			$data['coyID'] = $this->uri->segment(3);	
			
			$data['title'] = 'Company Name';
            $data['main_content'] = 'company/company-home';
            $this->load->view('includes/template_a', $data); 
		}

		public function company_home_partials()
        {
            $data['user_id'] = $this->session->userdata('user_id');	
			$data['coyID'] = $this->uri->segment(3);	
			
			$data['title'] = 'Home';
            $data['user_id'] = $user_id = $this->session->userdata('user_id');
            $this->load->view('company/partials/edit/company-home', $data); 
			
        }

		function edit_company_page()
		{
			$data['user_id'] = $this->session->userdata('user_id');	
			$data['coyID'] = $this->uri->segment(3);	
			
			$data['title'] = 'Edit company profile';
            $data['main_content'] = 'company/edit-company-page';
            $this->load->view('includes/template_a', $data); 
		}

		public function edit_company_page_partials()
        {
            $this->load->model('app_model');
    		$industry = $this->app_model->get_industry();
    		$companyType = $this->app_model->get_companytype();

			

			$coyID = $this->uri->segment(3);

			$handle_companyDetails = curl_init();
			curl_setopt_array(
			$handle_companyDetails,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/get_company/$coyID",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
		
		
			
			$response_companyDetails = curl_exec($handle_companyDetails);
			$result_companyDetails = json_decode($response_companyDetails, true);

			//print'<pre>';
			//print_r($result_companyDetails);
		
		
    		
   
            $data['companyDetails'] = $result_companyDetails;
    		$data['industry'] = $industry;
    		$data['companyType'] = $companyType;
			$data['coyID'] = $coyID;	
			$data['title'] = 'Edit Company Page';
            $data['user_id'] = $user_id = $this->session->userdata('user_id');
            $this->load->view('company/partials/edit/edit-page', $data); 
        }

		function post_job()
		{
			$data['user_id'] = $this->session->userdata('user_id');	
			$data['coyID'] = $this->uri->segment(3);	
			
			$data['title'] = 'Post a new job';
            $data['main_content'] = 'company/post-job';
            $this->load->view('includes/template_a', $data); 
		}

		public function post_job_partials()
        {
            
			$data['user_id'] = $this->session->userdata('user_id');	
			$data['coyID'] = $this->uri->segment(3);
    
			$this->load->model('app_model');
    		$industry = $this->app_model->get_industry();
    		$companyType = $this->app_model->get_companytype();
			
			$data['user_id'] = $this->session->userdata('user_id');	
			$data['coyID'] = $this->uri->segment(3);	
            $this->load->view('company/partials/edit/post-job', $data); 
			
        }
		
		function post_event()
		{
			$data['user_id'] = $this->session->userdata('user_id');	
			$data['coyID'] = $this->uri->segment(3);	
			
			$data['title'] = 'Post a new event';
            $data['main_content'] = 'company/post-event';
            $this->load->view('includes/template_a', $data); 
		}

		public function post_event_partials()
        {
            $data['user_id'] = $this->session->userdata('user_id');	
			$data['coyID'] = $this->uri->segment(3);
    
			$this->load->model('app_model');
    		$industry = $this->app_model->get_industry();
    		$companyType = $this->app_model->get_companytype();
			
			$data['industry'] = $industry;
    		$data['companyType'] = $companyType;
            $this->load->view('company/partials/edit/post-event', $data); 
			
        }

		function get_company_posts()
        {
        	$coyID = $this->uri->segment(3);
        	// Get company posts
        	$handle_companyPosts = curl_init();
			curl_setopt_array(
			$handle_companyPosts,
				array(
					CURLOPT_URL => "http://localhost/neo4j-moviedb/web/get_company_posts/$coyID",
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true
				)
			
			);
	
		   $response_companyPosts = curl_exec($handle_companyPosts);
		   $result_companyPosts = json_decode($response_companyPosts, true);

		   $data['posts'] = $result_companyPosts;
		  
		   $this->load->view('company/partials/posts', $data); 
        
        }


		public function validate_public_email()
		{
			if (isset($_POST['email']) && $_POST['email'] != '') { 
				$email = $_POST['email']; 
				// check valid email format 
				if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) { 
				echo("$email is not a valid email address"); 
				exit; 
				}
				$udomain = end(explode('@', $email));
				$domains = array("aol.com", "gmail.com", "hotmail.com", "yahoo.com", "yahoo.co.uk", "email.com", "ymail.com","live.com", "msn.com");
				// add more domains which you want to block here 
				if(in_array($udomain, $domains)) { 
				echo "Only use corporate email address"; 
				} else { 
				echo"This email is allowed"; 
				} 
			} 


			function test_scroller()
			{

				$this->load->view('company/scroller'); 
			}

			/* 123.com
123box.net
123india.com
123mail.cl
123qwe.co.uk
150ml.com
15meg4free.com
163.com
1coolplace.com
1freeemail.com
1funplace.com
1internetdrive.com
1mail.net
1me.net
1mum.com
1musicrow.com
1netdrive.com
1nsyncfan.com
1under.com
1webave.com
1webhighway.com
212.com
24horas.com
2911.net
2d2i.com
2die4.com
3000.it
37.com
3ammagazine.com
3email.com
3xl.net
444.net
4email.com
4email.net
4mg.com
4newyork.com
4x4man.com
5iron.com
88.am
8848.net
aaronkwok.net
abbeyroadlondon.co.uk
abdulnour.com
aberystwyth.com
about.com
academycougars.com
acceso.or.cr
access4less.net
accessgcc.com
ace-of-base.com
acmemail.net
acninc.net
adexec.com
adios.net
ados.fr
advalvas.be
aeiou.pt
aemail4u.com
aeneasmail.com
afreeinternet.com
africamail.com
agoodmail.com
ahaa.dk
aichi.com
airpost.net
ajacied.com
ak47.hu
aknet.kg
albawaba.com
alex4all.com
alexandria.cc
algeria.com
alhilal.net
alibaba.com
alive.cz
allmail.net
alloymail.com
allsaintsfan.com
alskens.dk
altavista.com
altavista.se
alternativagratis.com
alumnidirector.com
alvilag.hu
amele.com
america.hm
amnetsal.com
amrer.net
amuro.net
amuromail.com
ananzi.co.za
andylau.net
anfmail.com
angelfire.com
animalwoman.net
anjungcafe.com
another.com
antisocial.com
antongijsen.com
antwerpen.com
anymoment.com
anytimenow.com
apexmail.com
apollo.lv
approvers.net
arabia.com
arabtop.net
archaeologist.com
arcor.de
arcotronics.bg
argentina.com
arnet.com.ar
artlover.com
artlover.com.au
as-if.com
asean-mail.com
asheville.com
asia-links.com
asia.com
asianavenue.com
asiancityweb.com
asianwired.net
assala.com
assamesemail.com
astroboymail.com
astrolover.com
asurfer.com
athenachu.net
atina.cl
atl.lv
atlaswebmail.com
atozasia.com
au.ru
ausi.com
australia.edu
australiamail.com
austrosearch.net
autoescuelanerja.com
avh.hu
ayna.com
azimiweb.com
bachelorboy.com
bachelorgal.com
backstreet-boys.com
backstreetboysclub.com
bagherpour.com
baptistmail.com
baptized.com
barcelona.com
batuta.net
baudoinconsulting.com
bcvibes.com
beeebank.com
beenhad.com
beep.ru
beer.com
beethoven.com
belice.com
belizehome.com
berlin.com
berlin.de
berlinexpo.de
bestmail.us
bharatmail.com
bigblue.net.au
bigboab.com
bigfoot.com
bigfoot.de
bigger.com
bigmailbox.com
bigramp.com
bikemechanics.com
bikeracers.net
bikerider.com
bimla.net
birdowner.net
bitpage.net
bizhosting.com
blackburnmail.com
blackplanet.com
blazemail.com
bluehyppo.com
bluemail.ch
bluemail.dk
blushmail.com
bmlsports.net
boardermail.com
bol.com.br
bolando.com
bollywoodz.com
bolt.com
boltonfans.com
bonbon.net
boom.com
bootmail.com
bornnaked.com
bostonoffice.com
bounce.net
box.az
boxbg.com
boxemail.com
boxfrog.com
boyzoneclub.com
bradfordfans.com
brasilia.net
brazilmail.com.br
breathe.com
brfree.com.br
britneyclub.com
brittonsign.com
btopenworld.co.uk
bullsfan.com
bullsgame.com
bumerang.ro
buryfans.com
business-man.com
businessman.net
bvimailbox.com
c2i.net
c3.hu
c4.com
caere.it
cairomail.com
callnetuk.com
caltanet.it
camidge.com
canada-11.com
canada.com
canoemail.com
canwetalk.com
caramail.com
care2.com
carioca.net
cartestraina.ro
catcha.com
catlover.com
cd2.com
celineclub.com
centoper.it
centralpets.com
centrum.cz
centrum.sk
cgac.es
chaiyomail.com
chance2mail.com
chandrasekar.net
chat.ru
chattown.com
chauhanweb.com
check1check.com
cheerful.com
chemist.com
chequemail.com
chickmail.com
china.net.vg
chirk.com
chocaholic.com.au
cia-agent.com
cia.hu
ciaoweb.it
cicciociccio.com
city-of-bath.org
city-of-birmingham.com
city-of-brighton.org
city-of-cambridge.com
city-of-coventry.com
city-of-edinburgh.com
city-of-lichfield.com
city-of-lincoln.com
city-of-liverpool.com
city-of-manchester.com
city-of-nottingham.com
city-of-oxford.com
city-of-swansea.com
city-of-westminster.com
city-of-westminster.net
city-of-york.net
cityofcardiff.net
cityoflondon.org
claramail.com
classicmail.co.za
clerk.com
cliffhanger.com
close2you.net
club4x4.net
clubalfa.com
clubbers.net
clubducati.com
clubhonda.net
cluemail.com
coder.hu
coid.biz
columnist.com
comic.com
compuserve.com
computer-freak.com
computermail.net
conexcol.com
connect4free.net
connectbox.com
consultant.com
cookiemonster.com
cool.br
coolgoose.ca
coolgoose.com
coolkiwi.com
coollist.com
coolmail.com
coolmail.net
coolsend.com
cooooool.com
cooperation.net
cooperationtogo.net
copacabana.com
cornerpub.com
corporatedirtbag.com
correo.terra.com.gt
cortinet.com
cotas.net
counsellor.com
countrylover.com
cracker.hu
crazedanddazed.com
crazysexycool.com
critterpost.com
croeso.com
crosswinds.net
cry4helponline.com
cs.com
csinibaba.hu
curio-city.com
cute-girl.com
cuteandcuddly.com
cutey.com
cww.de
cyberbabies.com
cyberforeplay.net
cyberinbox.com
cyberleports.com
cybernet.it
dabsol.net
dadacasa.com
dailypioneer.com
dangerous-minds.com
dansegulvet.com
data54.com
davegracey.com
dazedandconfused.com
dbzmail.com
dcemail.com
deadlymob.org
deal-maker.com
dearriba.com
death-star.com
deliveryman.com
desertmail.com
desilota.com
deskpilot.com
detik.com
devotedcouples.com
dfwatson.com
di-ve.com
diplomats.com
disinfo.net
dmailman.com
dnsmadeeasy.com
doctor.com
doglover.com
dogmail.co.uk
dogsnob.net
doityourself.com
doneasy.com
donjuan.com
dontgotmail.com
dontmesswithtexas.com
doramail.com
dostmail.com
dotcom.fr
dott.it
dplanet.ch
dr.com
dragoncon.net
dropzone.com
dubaimail.com
dublin.com
dublin.ie
dygo.com
dynamitemail.com
e-apollo.lv
e-mail.dk
e-mail.ru
e-mailanywhere.com
e-mails.ru
e-tapaal.com
earthalliance.com
earthdome.com
eastcoast.co.za
eastmail.com
ecbsolutions.net
echina.com
ednatx.com
educacao.te.pt
eircom.net
elsitio.com
elvis.com
email-london.co.uk
email.com
email.cz
email.ee
email.it
email.nu
email.ro
email.ru
email.si
email2me.net
emailacc.com
emailaccount.com
emailchoice.com
emailcorner.net
emailengine.net
emailforyou.net
emailgroups.net
emailpinoy.com
emailplanet.com
emails.ru
emailuser.net
emailx.net
ematic.com
end-war.com
enel.net
engineer.com
england.com
england.edu
epatra.com
epost.de
eposta.hu
eqqu.com
eramail.co.za
eresmas.com
eriga.lv
estranet.it
etoast.com
eudoramail.com
europe.com
euroseek.com
every1.net
everyday.com.kh
everyone.net
examnotes.net
excite.co.jp
excite.com
excite.it
execs.com
expressasia.com
extended.com
eyou.com
ezcybersearch.com
ezmail.egine.com
ezmail.ru
ezrs.com
f1fans.net
fantasticmail.com
faroweb.com
fastem.com
fastemail.us
fastemailer.com
fastermail.com
fastimap.com
fastmail.fm
fastmailbox.net
fastmessaging.com
fatcock.net
fathersrightsne.org
fbi-agent.com
fbi.hu
federalcontractors.com
femenino.com
feyenoorder.com
ffanet.com
fiberia.com
filipinolinks.com
financemail.net
financier.com
findmail.com
finebody.com
fire-brigade.com
fishburne.org
flashmail.com
flipcode.com
fmail.co.uk
fmailbox.com
fmgirl.com
fmguy.com
fnbmail.co.za
fnmail.com
for-president.com
forfree.at
forpresident.com
fortuncity.com
forum.dk
free.com.pe
free.fr
freeaccess.nl
freeandsingle.com
freedomlover.com
freegates.be
freeghana.com
freeler.nl
freemail.com.au
freemail.com.pk
freemail.de
freemail.et
freemail.gr
freemail.hu
freemail.it
freemail.lt
freemail.nl
freemail.org.mk
freenet.de
freenet.kg
freeola.com
freeola.net
freeserve.co.uk
freestart.hu
freesurf.fr
freesurf.nl
freeuk.com
freeuk.net
freeukisp.co.uk
freeweb.org
freewebemail.com
freeyellow.com
freezone.co.uk
fresnomail.com
friendsfan.com
from-africa.com
from-america.com
from-argentina.com
from-asia.com
from-australia.com
from-belgium.com
from-brazil.com
from-canada.com
from-china.net
from-england.com
from-europe.com
from-france.net
from-germany.net
from-holland.com
from-israel.com
from-italy.net
from-japan.net
from-korea.com
from-mexico.com
from-outerspace.com
from-russia.com
from-spain.net
fromalabama.com
fromalaska.com
fromarizona.com
fromarkansas.com
fromcalifornia.com
fromcolorado.com
fromconnecticut.com
fromdelaware.com
fromflorida.net
fromgeorgia.com
fromhawaii.net
fromidaho.com
fromillinois.com
fromindiana.com
fromiowa.com
fromjupiter.com
fromkansas.com
fromkentucky.com
fromlouisiana.com
frommaine.net
frommaryland.com
frommassachusetts.com
frommiami.com
frommichigan.com
fromminnesota.com
frommississippi.com
frommissouri.com
frommontana.com
fromnebraska.com
fromnevada.com
fromnewhampshire.com
fromnewjersey.com
fromnewmexico.com
fromnewyork.net
fromnorthcarolina.com
fromnorthdakota.com
fromohio.com
fromoklahoma.com
fromoregon.net
frompennsylvania.com
fromrhodeisland.com
fromru.com
fromsouthcarolina.com
fromsouthdakota.com
fromtennessee.com
fromtexas.com
fromthestates.com
fromutah.com
fromvermont.com
fromvirginia.com
fromwashington.com
fromwashingtondc.com
fromwestvirginia.com
fromwisconsin.com
fromwyoming.com
front.ru
frostbyte.uk.net
fsmail.net
ftml.net
fuorissimo.com
furnitureprovider.com
fut.es
fxsmails.com
galaxy5.com
gamebox.net
gardener.com
gawab.com
gaza.net
gazeta.pl
gazibooks.com
geek.hu
geeklife.com
general-hospital.com
geologist.com
geopia.com
giga4u.de
givepeaceachance.com
glay.org
glendale.net
globalfree.it
globalpagan.com
globalsite.com.br
gmx.at
gmx.de
gmx.li
gmx.net
go.com
go.ro
go.ru
go2net.com
gofree.co.uk
goldenmail.ru
goldmail.ru
golfemail.com
golfmail.be
goplay.com
gorontalo.net
gothere.uk.com
gotmail.com
gotomy.com
gportal.hu
graffiti.net
gratisweb.com
grungecafe.com
gua.net
guessmail.com
guju.net
guy.com
guy2.com
guyanafriends.com
gyorsposta.com
gyorsposta.hu
hackermail.net
hailmail.net
hairdresser.net
hamptonroads.com
handbag.com
hang-ten.com
happemail.com
happycounsel.com
hardcorefreak.com
heartthrob.com
heerschap.com
heesun.net
hehe.com
hello.hu
helter-skelter.com
herediano.com
herono1.com
highmilton.com
highquality.com
highveldmail.co.za
hispavista.com
hkstarphoto.com
hollywoodkids.com
home.no.net
home.ro
home.se
homelocator.com
homestead.com
hongkong.com
hookup.net
horrormail.com
hot-shot.com
hot.ee
hotbot.com
hotbrev.com
hotfire.net
hotletter.com
hotmail.co.il
hotmail.com
hotmail.fr
hotmail.kg
hotmail.kz
hotmail.ru
hotpop.com
hotpop3.com
hotvoice.com
hsuchi.net
hunsa.com
hushmail.com
i-france.com
i-mail.com.au
i-p.com
i12.com
iamawoman.com
iamwaiting.com
iamwasted.com
iamyours.com
icestorm.com
icmsconsultants.com
icq.com
icqmail.com
icrazy.com
ididitmyway.com
idirect.com
iespana.es
ignazio.it
ignmail.com
ijustdontcare.com
ilovechocolate.com
ilovetocollect.net
ilse.nl
imail.ru
imailbox.com
imel.org
imneverwrong.com
imposter.co.uk
imstressed.com
imtoosexy.com
in-box.net
iname.com
inbox.net
inbox.ru
incamail.com
incredimail.com
indexa.fr
india.com
indiatimes.com
infohq.com
infomail.es
infomart.or.jp
infovia.com.ar
inicia.es
inmail.sk
inorbit.com
insurer.com
interfree.it
interia.pl
interlap.com.ar
intermail.co.il
internet-police.com
internetbiz.com
internetdrive.com
internetegypt.com
internetemails.net
internetmailing.net
inwind.it
iobox.com
iobox.fi
iol.it
ip3.com
iqemail.com
irangate.net
iraqmail.com
irj.hu
isellcars.com
islamonline.net
ismart.net
isonfire.com
isp9.net
itloox.com
itmom.com
ivebeenframed.com
ivillage.com
iwan-fals.com
iwon.com
izadpanah.com
jakuza.hu
japan.com
jaydemail.com
jazzandjava.com
jazzgame.com
jetemail.net
jippii.fi
jmail.co.za
joinme.com
jordanmail.com
journalist.com
jovem.te.pt
joymail.com
jpopmail.com
jubiimail.dk
jumpy.it
juno.com
justemail.net
kaazoo.com
kaixo.com
kalpoint.com
kapoorweb.com
karachian.com
karachioye.com
karbasi.com
katamail.com
kayafmmail.co.za
keg-party.com
keko.com.ar
kellychen.com
keromail.com
kgb.hu
khosropour.com
kickassmail.com
killermail.com
kimo.com
kinki-kids.com
kittymail.com
kiwibox.com
kiwitown.com
krunis.com
kukamail.com
kumarweb.com
kuwait-mail.com
ladymail.cz
lagerlouts.com
lahoreoye.com
lakmail.com
lamer.hu
land.ru
lankamail.com
laposte.net
latinmail.com
lawyer.com
leehom.net
legalactions.com
legislator.com
leonlai.net
levele.com
levele.hu
lex.bg
liberomail.com
linkmaster.com
linuxfreemail.com
linuxmail.org
lionsfan.com.au
liontrucks.com
list.ru
liverpoolfans.com
llandudno.com
llangollen.com
lmxmail.sk
lobbyist.com
localbar.com
london.com
looksmart.co.uk
looksmart.com
looksmart.com.au
lopezclub.com
louiskoo.com
love.cz
loveable.com
lovelygirl.net
lovemail.com
lover-boy.com
lovergirl.com
lovingjesus.com
luso.pt
luukku.com
lycos.co.uk
lycos.com
lycos.es
lycos.it
lycos.ne.jp
lycosmail.com
m-a-i-l.com
mac.com
machinecandy.com
macmail.com
madrid.com
maffia.hu
magicmail.co.za
mahmoodweb.com
mail-awu.de
mail-box.cz
mail-center.com
mail-central.com
mail-page.com
mail.austria.com
mail.az
mail.be
mail.bulgaria.com
mail.co.za
mail.com
mail.ee
mail.gr
mail.md
mail.nu
mail.pf
mail.pt
mail.r-o-o-t.com
mail.ru
mail.sisna.com
mail.vasarhely.hu
mail15.com
mail2007.com
mail2aaron.com
mail2abby.com
mail2abc.com
mail2actor.com
mail2admiral.com
mail2adorable.com
mail2adoration.com
mail2adore.com
mail2adventure.com
mail2aeolus.com
mail2aether.com
mail2affection.com
mail2afghanistan.com
mail2africa.com
mail2agent.com
mail2aha.com
mail2ahoy.com
mail2aim.com
mail2air.com
mail2airbag.com
mail2airforce.com
mail2airport.com
mail2alabama.com
mail2alan.com
mail2alaska.com
mail2albania.com
mail2alcoholic.com
mail2alec.com
mail2alexa.com
mail2algeria.com
mail2alicia.com
mail2alien.com
mail2allan.com
mail2allen.com
mail2allison.com
mail2alpha.com
mail2alyssa.com
mail2amanda.com
mail2amazing.com
mail2amber.com
mail2america.com
mail2american.com
mail2andorra.com
mail2andrea.com
mail2andy.com
mail2anesthesiologist.com
mail2angela.com
mail2angola.com
mail2ann.com
mail2anna.com
mail2anne.com
mail2anthony.com
mail2anything.com
mail2aphrodite.com
mail2apollo.com
mail2april.com
mail2aquarius.com
mail2arabia.com
mail2arabic.com
mail2architect.com
mail2ares.com
mail2argentina.com
mail2aries.com
mail2arizona.com
mail2arkansas.com
mail2armenia.com
mail2army.com
mail2arnold.com
mail2art.com
mail2artemus.com
mail2arthur.com
mail2artist.com
mail2ashley.com
mail2ask.com
mail2astronomer.com
mail2athena.com
mail2athlete.com
mail2atlas.com
mail2atom.com
mail2attitude.com
mail2auction.com
mail2aunt.com
mail2australia.com
mail2austria.com
mail2azerbaijan.com
mail2baby.com
mail2bahamas.com
mail2bahrain.com
mail2ballerina.com
mail2ballplayer.com
mail2band.com
mail2bangladesh.com
mail2bank.com
mail2banker.com
mail2bankrupt.com
mail2baptist.com
mail2bar.com
mail2barbados.com
mail2barbara.com
mail2barter.com
mail2basketball.com
mail2batter.com
mail2beach.com
mail2beast.com
mail2beatles.com
mail2beauty.com
mail2becky.com
mail2beijing.com
mail2belgium.com
mail2belize.com
mail2ben.com
mail2bernard.com
mail2beth.com
mail2betty.com
mail2beverly.com
mail2beyond.com
mail2biker.com
mail2bill.com
mail2billionaire.com
mail2billy.com
mail2bio.com
mail2biologist.com
mail2black.com
mail2blackbelt.com
mail2blake.com
mail2blind.com
mail2blonde.com
mail2blues.com
mail2bob.com
mail2bobby.com
mail2bolivia.com
mail2bombay.com
mail2bonn.com
mail2bookmark.com
mail2boreas.com
mail2bosnia.com
mail2boston.com
mail2botswana.com
mail2bradley.com
mail2brazil.com
mail2breakfast.com
mail2brian.com
mail2bride.com
mail2brittany.com
mail2broker.com
mail2brook.com
mail2bruce.com
mail2brunei.com
mail2brunette.com
mail2brussels.com
mail2bryan.com
mail2bug.com
mail2bulgaria.com
mail2business.com
mail2buy.com
mail2ca.com
mail2california.com
mail2calvin.com
mail2cambodia.com
mail2cameroon.com
mail2canada.com
mail2cancer.com
mail2capeverde.com
mail2capricorn.com
mail2cardinal.com
mail2cardiologist.com
mail2care.com
mail2caroline.com
mail2carolyn.com
mail2casey.com
mail2cat.com
mail2caterer.com
mail2cathy.com
mail2catlover.com
mail2catwalk.com
mail2cell.com
mail2chad.com
mail2champaign.com
mail2charles.com
mail2chef.com
mail2chemist.com
mail2cherry.com
mail2chicago.com
mail2chile.com
mail2china.com
mail2chinese.com
mail2chocolate.com
mail2christian.com
mail2christie.com
mail2christmas.com
mail2christy.com
mail2chuck.com
mail2cindy.com
mail2clark.com
mail2classifieds.com
mail2claude.com
mail2cliff.com
mail2clinic.com
mail2clint.com
mail2close.com
mail2club.com
mail2coach.com
mail2coastguard.com
mail2colin.com
mail2college.com
mail2colombia.com
mail2color.com
mail2colorado.com
mail2columbia.com
mail2comedian.com
mail2composer.com
mail2computer.com
mail2computers.com
mail2concert.com
mail2congo.com
mail2connect.com
mail2connecticut.com
mail2consultant.com
mail2convict.com
mail2cook.com
mail2cool.com
mail2cory.com
mail2costarica.com
mail2country.com
mail2courtney.com
mail2cowboy.com
mail2cowgirl.com
mail2craig.com
mail2crave.com
mail2crazy.com
mail2create.com
mail2croatia.com
mail2cry.com
mail2crystal.com
mail2cuba.com
mail2culture.com
mail2curt.com
mail2customs.com
mail2cute.com
mail2cutey.com
mail2cynthia.com
mail2cyprus.com
mail2czechrepublic.com
mail2dad.com
mail2dale.com
mail2dallas.com
mail2dan.com
mail2dana.com
mail2dance.com
mail2dancer.com
mail2danielle.com
mail2danny.com
mail2darlene.com
mail2darling.com
mail2darren.com
mail2daughter.com
mail2dave.com
mail2dawn.com
mail2dc.com
mail2dealer.com
mail2deanna.com
mail2dearest.com
mail2debbie.com
mail2debby.com
mail2deer.com
mail2delaware.com
mail2delicious.com
mail2demeter.com
mail2democrat.com
mail2denise.com
mail2denmark.com
mail2dennis.com
mail2dentist.com
mail2derek.com
mail2desert.com
mail2devoted.com
mail2devotion.com
mail2diamond.com
mail2diana.com
mail2diane.com
mail2diehard.com
mail2dilemma.com
mail2dillon.com
mail2dinner.com
mail2dinosaur.com
mail2dionysos.com
mail2diplomat.com
mail2director.com
mail2dirk.com
mail2disco.com
mail2dive.com
mail2diver.com
mail2divorced.com
mail2djibouti.com
mail2doctor.com
mail2doglover.com
mail2dominic.com
mail2dominica.com
mail2dominicanrepublic.com
mail2don.com
mail2donald.com
mail2donna.com
mail2doris.com
mail2dorothy.com
mail2doug.com
mail2dough.com
mail2douglas.com
mail2dow.com
mail2downtown.com
mail2dream.com
mail2dreamer.com
mail2dude.com
mail2dustin.com
mail2dyke.com
mail2dylan.com
mail2earl.com
mail2earth.com
mail2eastend.com
mail2eat.com
mail2economist.com
mail2ecuador.com
mail2eddie.com
mail2edgar.com
mail2edwin.com
mail2egypt.com
mail2electron.com
mail2eli.com
mail2elizabeth.com
mail2ellen.com
mail2elliot.com
mail2elsalvador.com
mail2elvis.com
mail2emergency.com
mail2emily.com
mail2engineer.com
mail2english.com
mail2environmentalist.com
mail2eos.com
mail2eric.com
mail2erica.com
mail2erin.com
mail2erinyes.com
mail2eris.com
mail2eritrea.com
mail2ernie.com
mail2eros.com
mail2estonia.com
mail2ethan.com
mail2ethiopia.com
mail2eu.com
mail2europe.com
mail2eurus.com
mail2eva.com
mail2evan.com
mail2evelyn.com
mail2everything.com
mail2exciting.com
mail2expert.com
mail2fairy.com
mail2faith.com
mail2fanatic.com
mail2fancy.com
mail2fantasy.com
mail2farm.com
mail2farmer.com
mail2fashion.com
mail2fat.com
mail2feeling.com
mail2female.com
mail2fever.com
mail2fighter.com
mail2fiji.com
mail2filmfestival.com
mail2films.com
mail2finance.com
mail2finland.com
mail2fireman.com
mail2firm.com
mail2fisherman.com
mail2flexible.com
mail2florence.com
mail2florida.com
mail2floyd.com
mail2fly.com
mail2fond.com
mail2fondness.com
mail2football.com
mail2footballfan.com
mail2found.com
mail2france.com
mail2frank.com
mail2frankfurt.com
mail2franklin.com
mail2fred.com
mail2freddie.com
mail2free.com
mail2freedom.com
mail2french.com
mail2freudian.com
mail2friendship.com
mail2from.com
mail2fun.com
mail2gabon.com
mail2gabriel.com
mail2gail.com
mail2galaxy.com
mail2gambia.com
mail2games.com
mail2gary.com
mail2gavin.com
mail2gemini.com
mail2gene.com
mail2genes.com
mail2geneva.com
mail2george.com
mail2georgia.com
mail2gerald.com
mail2german.com
mail2germany.com
mail2ghana.com
mail2gilbert.com
mail2gina.com
mail2girl.com
mail2glen.com
mail2gloria.com
mail2goddess.com
mail2gold.com
mail2golfclub.com
mail2golfer.com
mail2gordon.com
mail2government.com
mail2grab.com
mail2grace.com
mail2graham.com
mail2grandma.com
mail2grandpa.com
mail2grant.com
mail2greece.com
mail2green.com
mail2greg.com
mail2grenada.com
mail2gsm.com
mail2guard.com
mail2guatemala.com
mail2guy.com
mail2hades.com
mail2haiti.com
mail2hal.com
mail2handhelds.com
mail2hank.com
mail2hannah.com
mail2harold.com
mail2harry.com
mail2hawaii.com
mail2headhunter.com
mail2heal.com
mail2heather.com
mail2heaven.com
mail2hebe.com
mail2hecate.com
mail2heidi.com
mail2helen.com
mail2hell.com
mail2help.com
mail2helpdesk.com
mail2henry.com
mail2hephaestus.com
mail2hera.com
mail2hercules.com
mail2herman.com
mail2hermes.com
mail2hespera.com
mail2hestia.com
mail2highschool.com
mail2hindu.com
mail2hip.com
mail2hiphop.com
mail2holland.com
mail2holly.com
mail2hollywood.com
mail2homer.com
mail2honduras.com
mail2honey.com
mail2hongkong.com
mail2hope.com
mail2horse.com
mail2hot.com
mail2hotel.com
mail2houston.com
mail2howard.com
mail2hugh.com
mail2human.com
mail2hungary.com
mail2hungry.com
mail2hygeia.com
mail2hyperspace.com
mail2hypnos.com
mail2ian.com
mail2ice-cream.com
mail2iceland.com
mail2idaho.com
mail2idontknow.com
mail2illinois.com
mail2imam.com
mail2in.com
mail2india.com
mail2indian.com
mail2indiana.com
mail2indonesia.com
mail2infinity.com
mail2intense.com
mail2iowa.com
mail2iran.com
mail2iraq.com
mail2ireland.com
mail2irene.com
mail2iris.com
mail2irresistible.com
mail2irving.com
mail2irwin.com
mail2isaac.com
mail2israel.com
mail2italian.com
mail2italy.com
mail2jackie.com
mail2jacob.com
mail2jail.com
mail2jaime.com
mail2jake.com
mail2jamaica.com
mail2james.com
mail2jamie.com
mail2jan.com
mail2jane.com
mail2janet.com
mail2janice.com
mail2japan.com
mail2japanese.com
mail2jasmine.com
mail2jason.com
mail2java.com
mail2jay.com
mail2jazz.com
mail2jed.com
mail2jeffrey.com
mail2jennifer.com
mail2jenny.com
mail2jeremy.com
mail2jerry.com
mail2jessica.com
mail2jessie.com
mail2jesus.com
mail2jew.com
mail2jeweler.com
mail2jim.com
mail2jimmy.com
mail2joan.com
mail2joann.com
mail2joanna.com
mail2jody.com
mail2joe.com
mail2joel.com
mail2joey.com
mail2john.com
mail2join.com
mail2jon.com
mail2jonathan.com
mail2jones.com
mail2jordan.com
mail2joseph.com
mail2josh.com
mail2joy.com
mail2juan.com
mail2judge.com
mail2judy.com
mail2juggler.com
mail2julian.com
mail2julie.com
mail2jumbo.com
mail2junk.com
mail2justin.com
mail2justme.com
mail2kansas.com
mail2karate.com
mail2karen.com
mail2karl.com
mail2karma.com
mail2kathleen.com
mail2kathy.com
mail2katie.com
mail2kay.com
mail2kazakhstan.com
mail2keen.com
mail2keith.com
mail2kelly.com
mail2kelsey.com
mail2ken.com
mail2kendall.com
mail2kennedy.com
mail2kenneth.com
mail2kenny.com
mail2kentucky.com
mail2kenya.com
mail2kerry.com
mail2kevin.com
mail2kim.com
mail2kimberly.com
mail2king.com
mail2kirk.com
mail2kiss.com
mail2kosher.com
mail2kristin.com
mail2kurt.com
mail2kuwait.com
mail2kyle.com
mail2kyrgyzstan.com
mail2la.com
mail2lacrosse.com
mail2lance.com
mail2lao.com
mail2larry.com
mail2latvia.com
mail2laugh.com
mail2laura.com
mail2lauren.com
mail2laurie.com
mail2lawrence.com
mail2lawyer.com
mail2lebanon.com
mail2lee.com
mail2leo.com
mail2leon.com
mail2leonard.com
mail2leone.com
mail2leslie.com
mail2letter.com
mail2liberia.com
mail2libertarian.com
mail2libra.com
mail2libya.com
mail2liechtenstein.com
mail2life.com
mail2linda.com
mail2linux.com
mail2lionel.com
mail2lipstick.com
mail2liquid.com
mail2lisa.com
mail2lithuania.com
mail2litigator.com
mail2liz.com
mail2lloyd.com
mail2lois.com
mail2lola.com
mail2london.com
mail2looking.com
mail2lori.com
mail2lost.com
mail2lou.com
mail2louis.com
mail2louisiana.com
mail2lovable.com
mail2love.com
mail2lucky.com
mail2lucy.com
mail2lunch.com
mail2lust.com
mail2luxembourg.com
mail2luxury.com
mail2lyle.com
mail2lynn.com
mail2madagascar.com
mail2madison.com
mail2madrid.com
mail2maggie.com
mail2mail4.com
mail2maine.com
mail2malawi.com
mail2malaysia.com
mail2maldives.com
mail2mali.com
mail2malta.com
mail2mambo.com
mail2man.com
mail2mandy.com
mail2manhunter.com
mail2mankind.com
mail2many.com
mail2marc.com
mail2marcia.com
mail2margaret.com
mail2margie.com
mail2marhaba.com
mail2maria.com
mail2marilyn.com
mail2marines.com
mail2mark.com
mail2marriage.com
mail2married.com
mail2marries.com
mail2mars.com
mail2marsha.com
mail2marshallislands.com
mail2martha.com
mail2martin.com
mail2marty.com
mail2marvin.com
mail2mary.com
mail2maryland.com
mail2mason.com
mail2massachusetts.com
mail2matt.com
mail2matthew.com
mail2maurice.com
mail2mauritania.com
mail2mauritius.com
mail2max.com
mail2maxwell.com
mail2maybe.com
mail2mba.com
mail2me4u.com
mail2mechanic.com
mail2medieval.com
mail2megan.com
mail2mel.com
mail2melanie.com
mail2melissa.com
mail2melody.com
mail2member.com
mail2memphis.com
mail2methodist.com
mail2mexican.com
mail2mexico.com
mail2mgz.com
mail2miami.com
mail2michael.com
mail2michelle.com
mail2michigan.com
mail2mike.com
mail2milan.com
mail2milano.com
mail2mildred.com
mail2milkyway.com
mail2millennium.com
mail2millionaire.com
mail2milton.com
mail2mime.com
mail2mindreader.com
mail2mini.com
mail2minister.com
mail2minneapolis.com
mail2minnesota.com
mail2miracle.com
mail2missionary.com
mail2mississippi.com
mail2missouri.com
mail2mitch.com
mail2model.com
mail2moldova.commail2molly.com
mail2mom.com
mail2monaco.com
mail2money.com
mail2mongolia.com
mail2monica.com
mail2montana.com
mail2monty.com
mail2moon.com
mail2morocco.com
mail2morpheus.com
mail2mors.com
mail2moscow.com
mail2moslem.com
mail2mouseketeer.com
mail2movies.com
mail2mozambique.com
mail2mp3.com
mail2mrright.com
mail2msright.com
mail2museum.com
mail2music.com
mail2musician.com
mail2muslim.com
mail2my.com
mail2myboat.com
mail2mycar.com
mail2mycell.com
mail2mygsm.com
mail2mylaptop.com
mail2mymac.com
mail2mypager.com
mail2mypalm.com
mail2mypc.com
mail2myphone.com
mail2myplane.com
mail2namibia.com
mail2nancy.com
mail2nasdaq.com
mail2nathan.com
mail2nauru.com
mail2navy.com
mail2neal.com
mail2nebraska.com
mail2ned.com
mail2neil.com
mail2nelson.com
mail2nemesis.com
mail2nepal.com
mail2netherlands.com
mail2network.com
mail2nevada.com
mail2newhampshire.com
mail2newjersey.com
mail2newmexico.com
mail2newyork.com
mail2newzealand.com
mail2nicaragua.com
mail2nick.com
mail2nicole.com
mail2niger.com
mail2nigeria.com
mail2nike.com
mail2no.com
mail2noah.com
mail2noel.com
mail2noelle.com
mail2normal.com
mail2norman.com
mail2northamerica.com
mail2northcarolina.com
mail2northdakota.com
mail2northpole.com
mail2norway.com
mail2notus.com
mail2noway.com
mail2nowhere.com
mail2nuclear.com
mail2nun.com
mail2ny.com
mail2oasis.com
mail2oceanographer.com
mail2ohio.com
mail2ok.com
mail2oklahoma.com
mail2oliver.com
mail2oman.com
mail2one.com
mail2onfire.com
mail2online.com
mail2oops.com
mail2open.com
mail2ophthalmologist.com
mail2optometrist.com
mail2oregon.com
mail2oscars.com
mail2oslo.com
mail2painter.com
mail2pakistan.com
mail2palau.com
mail2pan.com
mail2panama.com
mail2paraguay.com
mail2paralegal.com
mail2paris.com
mail2park.com
mail2parker.com
mail2party.com
mail2passion.com
mail2pat.com
mail2patricia.com
mail2patrick.com
mail2patty.com
mail2paul.com
mail2paula.com
mail2pay.com
mail2peace.com
mail2pediatrician.com
mail2peggy.com
mail2pennsylvania.com
mail2perry.com
mail2persephone.com
mail2persian.com
mail2peru.com
mail2pete.com
mail2peter.com
mail2pharmacist.com
mail2phil.com
mail2philippines.com
mail2phoenix.com
mail2phonecall.com
mail2phyllis.com
mail2pickup.com
mail2pilot.com
mail2pisces.com
mail2planet.com
mail2platinum.com
mail2plato.com
mail2pluto.com
mail2pm.com
mail2podiatrist.com
mail2poet.com
mail2poland.com
mail2policeman.com
mail2policewoman.com
mail2politician.com
mail2pop.com
mail2pope.com
mail2popular.com
mail2portugal.com
mail2poseidon.com
mail2potatohead.com
mail2power.com
mail2presbyterian.com
mail2president.com
mail2priest.com
mail2prince.com
mail2princess.com
mail2producer.com
mail2professor.com
mail2protect.com
mail2psychiatrist.com
mail2psycho.com
mail2psychologist.com
mail2qatar.com
mail2queen.com
mail2rabbi.com
mail2race.com
mail2racer.com
mail2rachel.com
mail2rage.com
mail2rainmaker.com
mail2ralph.com
mail2randy.com
mail2rap.com
mail2rare.com
mail2rave.com
mail2ray.com
mail2raymond.com
mail2realtor.com
mail2rebecca.com
mail2recruiter.com
mail2recycle.com
mail2redhead.com
mail2reed.com
mail2reggie.com
mail2register.com
mail2rent.com
mail2republican.com
mail2resort.com
mail2rex.com
mail2rhodeisland.com
mail2rich.com
mail2richard.com
mail2ricky.com
mail2ride.com
mail2riley.com
mail2rita.com
mail2rob.com
mail2robert.com
mail2roberta.com
mail2robin.com
mail2rock.com
mail2rocker.com
mail2rod.com
mail2rodney.com
mail2romania.com
mail2rome.com
mail2ron.com
mail2ronald.com
mail2ronnie.com
mail2rose.com
mail2rosie.com
mail2roy.com
mail2rudy.com
mail2rugby.com
mail2runner.com
mail2russell.com
mail2russia.com
mail2russian.com
mail2rusty.com
mail2ruth.com
mail2rwanda.com
mail2ryan.com
mail2sa.com
mail2sabrina.com
mail2safe.com
mail2sagittarius.com
mail2sail.com
mail2sailor.com
mail2sal.com
mail2salaam.com
mail2sam.com
mail2samantha.com
mail2samoa.com
mail2samurai.com
mail2sandra.com
mail2sandy.com
mail2sanfrancisco.com
mail2sanmarino.com
mail2santa.com
mail2sara.com
mail2sarah.com
mail2sat.com
mail2saturn.com
mail2saudi.com
mail2saudiarabia.com
mail2save.com
mail2savings.com
mail2school.com
mail2scientist.com
mail2scorpio.com
mail2scott.com
mail2sean.com
mail2search.com
mail2seattle.com
mail2secretagent.com
mail2senate.com
mail2senegal.com
mail2sensual.com
mail2seth.com
mail2sevenseas.com
mail2sexy.com
mail2seychelles.com
mail2shane.com
mail2sharon.com
mail2shawn.com
mail2ship.com
mail2shirley.com
mail2shoot.com
mail2shuttle.com
mail2sierraleone.com
mail2simon.com
mail2singapore.com
mail2single.com
mail2site.com
mail2skater.com
mail2skier.com
mail2sky.com
mail2sleek.com
mail2slim.com
mail2slovakia.com
mail2slovenia.com
mail2smile.com
mail2smith.com
mail2smooth.com
mail2soccer.com
mail2soccerfan.com
mail2socialist.com
mail2soldier.com
mail2somalia.com
mail2son.com
mail2song.com
mail2sos.com
mail2sound.com
mail2southafrica.com
mail2southamerica.com
mail2southcarolina.com
mail2southdakota.com
mail2southkorea.com
mail2southpole.com
mail2spain.com
mail2spanish.com
mail2spare.com
mail2spectrum.com
mail2splash.com
mail2sponsor.com
mail2sports.com
mail2srilanka.com
mail2stacy.com
mail2stan.com
mail2stanley.com
mail2star.com
mail2state.com
mail2stephanie.com
mail2steve.com
mail2steven.com
mail2stewart.com
mail2stlouis.com
mail2stock.com
mail2stockholm.com
mail2stockmarket.com
mail2storage.com
mail2store.com
mail2strong.com
mail2student.com
mail2studio.com
mail2studio54.com
mail2stuntman.com
mail2subscribe.com
mail2sudan.com
mail2superstar.com
mail2surfer.com
mail2suriname.com
mail2susan.com
mail2suzie.com
mail2swaziland.com
mail2sweden.com
mail2sweetheart.com
mail2swim.com
mail2swimmer.com
mail2swiss.com
mail2switzerland.com
mail2sydney.com
mail2sylvia.com
mail2syria.com
mail2taboo.com
mail2taiwan.com
mail2tajikistan.com
mail2tammy.com
mail2tango.com
mail2tanya.com
mail2tanzania.com
mail2tara.com
mail2taurus.com
mail2taxi.com
mail2taxidermist.com
mail2taylor.com
mail2taz.com
mail2teacher.com
mail2technician.com
mail2ted.com
mail2telephone.com
mail2teletubbie.com
mail2tenderness.com
mail2tennessee.com
mail2tennis.com
mail2tennisfan.com
mail2terri.com
mail2terry.com
mail2test.com
mail2texas.com
mail2thailand.com
mail2therapy.com
mail2think.com
mail2tickets.com
mail2tiffany.com
mail2tim.com
mail2time.com
mail2timothy.com
mail2tina.com
mail2titanic.com
mail2toby.com
mail2todd.com
mail2togo.com
mail2tom.com
mail2tommy.com
mail2tonga.com
mail2tony.com
mail2touch.com
mail2tourist.com
mail2tracey.com
mail2tracy.com
mail2tramp.com
mail2travel.com
mail2traveler.com
mail2travis.com
mail2trekkie.com
mail2trex.com
mail2triallawyer.com
mail2trick.com
mail2trillionaire.com
mail2troy.com
mail2truck.com
mail2trump.com
mail2try.com
mail2tunisia.com
mail2turbo.com
mail2turkey.com
mail2turkmenistan.com
mail2tv.com
mail2tycoon.com
mail2tyler.com
mail2u4me.com
mail2uae.com
mail2uganda.com
mail2uk.com
mail2ukraine.com
mail2uncle.com
mail2unsubscribe.com
mail2uptown.com
mail2uruguay.com
mail2usa.com
mail2utah.com
mail2uzbekistan.com
mail2v.com
mail2vacation.com
mail2valentines.com
mail2valerie.com
mail2valley.com
mail2vamoose.com
mail2vanessa.com
mail2vanuatu.com
mail2venezuela.com
mail2venous.com
mail2venus.com
mail2vermont.com
mail2vickie.com
mail2victor.com
mail2victoria.com
mail2vienna.com
mail2vietnam.com
mail2vince.com
mail2virginia.com
mail2virgo.com
mail2visionary.com
mail2vodka.com
mail2volleyball.com
mail2waiter.com
mail2wallstreet.com
mail2wally.com
mail2walter.com
mail2warren.com
mail2washington.com
mail2wave.com
mail2way.com
mail2waycool.com
mail2wayne.com
mail2webmaster.com
mail2webtop.com
mail2webtv.com
mail2weird.com
mail2wendell.com
mail2wendy.com
mail2westend.com
mail2westvirginia.com
mail2whether.com
mail2whip.com
mail2white.com
mail2whitehouse.com
mail2whitney.com
mail2why.com
mail2wilbur.com
mail2wild.com
mail2willard.com
mail2willie.com
mail2wine.com
mail2winner.com
mail2wired.com
mail2wisconsin.com
mail2woman.com
mail2wonder.com
mail2world.com
mail2worship.com
mail2wow.com
mail2www.com
mail2wyoming.com
mail2xfiles.com
mail2xox.com
mail2yachtclub.com
mail2yahalla.com
mail2yemen.com
mail2yes.com
mail2yugoslavia.com
mail2zack.com
mail2zambia.com
mail2zenith.com
mail2zephir.com
mail2zeus.com
mail2zipper.com
mail2zoo.com
mail2zoologist.com
mail2zurich.com
mail3000.com
mail333.com
mailandftp.com
mailandnews.com
mailas.com
mailasia.com
mailbolt.com
mailbomb.net
mailbox.as
mailbox.co.za
mailbox.gr
mailbox.hu
mailbr.com.br
mailc.net
mailcan.com
mailchoose.co
mailcity.com
mailclub.fr
mailclub.net
mailexcite.com
mailforce.net
mailftp.com
mailgenie.net
mailhaven.com
mailhood.com
mailingweb.com
mailisent.com
mailite.com
mailme.dk
mailmight.com
mailmij.nl
mailnew.com
mailops.com
mailoye.com
mailpanda.com
mailpride.com
mailpuppy.com
mailroom.com
mailru.com
mailsent.net
mailsurf.com
mailup.net
maktoob.com
malayalamtelevision.net
manager.de
mantrafreenet.com
mantramail.com
mantraonline.com
marchmail.com
marijuana.nl
married-not.com
marsattack.com
masrawy.com
mauimail.com
maxleft.com
mbox.com.au
me-mail.hu
meetingmall.com
megago.com
megamail.pt
mehrani.com
mehtaweb.com
melodymail.com
meloo.com
message.hu
metacrawler.com
metta.lk
miesto.sk
mighty.co.za
miho-nakayama.com
millionaireintraining.com
milmail.com
misery.net
mittalweb.com
mixmail.com
ml1.net
mobilbatam.com
mohammed.com
moldova.cc
moldova.com
moldovacc.com
montevideo.com.uy
moonman.com
moose-mail.com
mortaza.com
mosaicfx.com
most-wanted.com
mostlysunny.com
motormania.com
movemail.com
mp4.it
mr-potatohead.com
mscold.com
msgbox.com
mundomail.net
munich.com
musician.org
musicscene.org
mybox.it
mycabin.com
mycity.com
mycool.com
mydomain.com
mydotcomaddress.com
myfamily.com
myiris.com
mynamedot.com
mynetaddress.com
myownemail.com
myownfriends.com
mypersonalemail.com
myplace.com
myrealbox.com
myself.com
mystupidjob.com
myway.com
myworldmail.com
n2.com
n2business.com
n2mail.com
n2software.com
nabc.biz
nagpal.net
nakedgreens.com
name.com
nameplanet.com
nandomail.com
naseej.com
nativestar.net
nativeweb.net
navigator.lv
neeva.net
nemra1.com
nenter.com
nervhq.org
net4b.pt
net4you.at
netbounce.com
netbroadcaster.com
netcenter-vn.net
netcourrier.com
netexecutive.com
netexpressway.com
netian.com
netizen.com.ar
netlane.com
netlimit.com
netmongol.com
netpiper.com
netposta.net
netralink.com
netscape.net
netscapeonline.co.uk
netspeedway.com
netsquare.com
netster.com
nettaxi.com
netzero.com
netzero.net
newmail.com
newmail.net
newmail.ru
newyork.com
nfmail.com
nicegal.com
nicholastse.net
nicolastse.com
nightmail.com
nikopage.com
nirvanafan.com
noavar.com
norika-fujiwara.com
norikomail.com
northgates.net
nospammail.net
ny.com
nyc.com
nycmail.com
nzoomail.com
o-tay.com
o2.co.uk
oceanfree.net
oddpost.com
odmail.com
oicexchange.com
okbank.com
okhuman.com
okmad.com
okmagic.com
okname.net
okuk.com
ole.com
olemail.com
olympist.net
omaninfo.com
onebox.com
onenet.com.ar
onet.pl
oninet.pt
online.ie
onlinewiz.com
onmilwaukee.com
onobox.com
operamail.com
optician.com
orbitel.bg
orgmail.net
osite.com.br
oso.com
otakumail.com
our-computer.com
our-office.com
ourbrisbane.com
ournet.md
outgun.com
over-the-rainbow.com
ownmail.net
packersfan.com
pakistanoye.com
palestinemail.com
parkjiyoon.com
parrot.com
partlycloudy.com
partynight.at
parvazi.com
pcpostal.com
pediatrician.com
penpen.com
peopleweb.com
perfectmail.com
personal.ro
personales.com
petml.com
pettypool.com
pezeshkpour.com
phayze.com
phreaker.net
picusnet.com
pigpig.net
pinoymail.com
piracha.net
pisem.net
planetaccess.com
planetout.com
plasa.com
playersodds.com
playful.com
plusmail.com.br
pmail.net
pobox.hu
pobox.sk
pochta.ru
poczta.fm
poetic.com
polbox.com
policeoffice.com
pool-sharks.com
poond.com
popmail.com
popsmail.com
popstar.com
portugalmail.com
portugalmail.pt
portugalnet.com
positive-thinking.com
post.com
post.cz
post.sk
postaccesslite.com
postafree.com
postaweb.com
postinbox.com
postino.ch
postmaster.co.uk
postpro.net
powerfan.com
praize.com
premiumservice.com
presidency.com
press.co.jp
priest.com
primposta.com
primposta.hu
pro.hu
progetplus.it
programmer.net
programozo.hu
proinbox.com
project2k.com
promessage.com
prontomail.com
psv-supporter.com
publicist.com
pulp-fiction.com
punkass.com
qatarmail.com
qprfans.com
qrio.com
quackquack.com
qudsmail.com
quepasa.com
quickwebmail.com
r-o-o-t.com
raakim.com
racingfan.com.au
radicalz.com
ragingbull.com
ranmamail.com
rastogi.net
rattle-snake.com
ravearena.com
razormail.com
rccgmail.org
realemail.net
reallyfast.biz
rediffmail.com
rediffmailpro.com
rednecks.com
redseven.de
redsfans.com
registerednurses.com
repairman.com
reply.hu
representative.com
rescueteam.com
rezai.com
rickymail.com
rin.ru
rn.com
rock.com
rocketmail.com
rodrun.com
rome.com
roughnet.com
rubyridge.com
runbox.com
rushpost.com
ruttolibero.com
s-mail.com
sabreshockey.com
sacbeemail.com
safe-mail.net
sailormoon.com
saintly.com
sale-sale-sale.com
salehi.net
samerica.com
samilan.net
sammimail.com
sanfranmail.com
sanook.com
sapo.pt
saudia.com
sayhi.net
scandalmail.com
schweiz.org
sci.fi
scientist.com
scifianime.com
scottishmail.co.uk
scubadiving.com
searchwales.com
sebil.com
secret-police.com
secretservices.net
seductive.com
seekstoyboy.com
send.hu
sendme.cz
sent.com
serga.com.ar
servemymail.com
sesmail.com
sexmagnet.com
seznam.cz
shahweb.net
shaniastuff.com
sharmaweb.com
she.com
shootmail.com
shotgun.hu
shuf.com
sialkotcity.com
sialkotian.com
sialkotoye.com
sify.com
sinamail.com
singapore.com
singmail.com
singnet.com.sg
skim.com
skizo.hu
slamdunkfan.com
slingshot.com
slo.net
slotter.com
smapxsmap.net
smileyface.comsmithemail.net
smoothmail.com
snail-mail.net
snakemail.com
sndt.net
sneakemail.com
sniper.hu
snoopymail.com
snowboarding.com
snowdonia.net
socamail.com
sociologist.com
softhome.net
sol.dk
soldier.hu
soon.com
soulfoodcookbook.com
sp.nl
space.com
spacetowns.com
spamex.com
spartapiet.com
spazmail.com
speedpost.net
spils.com
spinfinder.com
sportemail.com
spray.no
spray.se
spymac.com
srilankan.net
st-davids.net
stade.fr
stargateradio.com
starmail.com
starmail.org
starmedia.com
starplace.com
starspath.com
start.com.au
stopdropandroll.com
stribmail.com
strompost.com
strongguy.com
subram.com
sudanmail.net
suhabi.com
suisse.org
sunpoint.net
sunrise-sunset.com
sunsgame.com
sunumail.sn
superdada.com
supereva.it
supermail.ru
surf3.net
surfy.net
surimail.com
survivormail.com
sweb.cz
swiftdesk.com
swirve.com
swissinfo.org
swissmail.net
switchboardmail.com
switzerland.org
sx172.com
syom.com
syriamail.com
t2mail.com
takuyakimura.com
talk21.com
talkcity.com
tamil.com
tatanova.com
tech4peace.org
techemail.com
techie.com
technisamail.co.za
technologist.com
teenagedirtbag.com
telebot.com
teleline.es
telinco.net
telkom.net
telpage.net
tenchiclub.com
tenderkiss.com
terra.cl
terra.com
terra.com.ar
terra.com.br
terra.es
tfanus.com.er
tfz.net
thai.com
thaimail.com
thaimail.net
the-african.com
the-airforce.com
the-aliens.com
the-american.com
the-animal.com
the-army.com
the-astronaut.com
the-beauty.com
the-big-apple.com
the-biker.com
the-boss.com
the-brazilian.com
the-canadian.com
the-canuck.com
the-captain.com
the-chinese.com
the-country.com
the-cowboy.com
the-davis-home.com
the-dutchman.com
the-eagles.com
the-englishman.com
the-fastest.net
the-fool.com
the-frenchman.com
the-galaxy.net
the-genius.com
the-gentleman.com
the-german.com
the-gremlin.com
the-hooligan.com
the-italian.com
the-japanese.com
the-lair.com
the-madman.com
the-mailinglist.com
the-marine.com
the-master.com
the-mexican.com
the-ministry.com
the-monkey.com
the-newsletter.net
the-pentagon.com
the-police.com
the-prayer.com
the-professional.com
the-quickest.com
the-russian.com
the-snake.com
the-spaceman.com
the-stock-market.com
the-student.net
the-whitehouse.net
the-wild-west.com
the18th.com
thecoolguy.com
thecriminals.com
thedoghousemail.com
theend.hu
thegolfcourse.com
thegooner.com
theheadoffice.com
thelanddownunder.com
theoffice.net
thepokerface.com
thepostmaster.net
theraces.com
theracetrack.com
thestreetfighter.com
theteebox.com
thewatercooler.com
thewebpros.co.uk
thewizzard.com
thewizzkid.com
thezhangs.net
thirdage.com
thundermail.com
tidni.com
timein.net
tiscali.at
tiscali.be
tiscali.co.uk
tiscali.lu
tiscali.se
tkcity.com
topchat.com
topgamers.co.uk
topletter.com
topmail.com.ar
topsurf.com
torchmail.com
travel.li
trialbytrivia.com
trmailbox.com
tropicalstorm.com
trust-me.com
tsamail.co.za
ttml.co.in
tunisiamail.com
turkey.com
twinstarsmail.com
tycoonmail.com
typemail.com
u2club.com
uae.ac
uaemail.com
ubbi.com
ubbi.com.br
uboot.com
uk2k.com
uk2net.com
uk7.net
uk8.net
ukbuilder.com
ukcool.com
ukdreamcast.com
ukr.net
uku.co.uk
ultapulta.com
ultrapostman.com
ummah.org
umpire.com
unbounded.com
unican.es
unihome.com
universal.pt
uno.ee
uno.it
unofree.it
uol.com.ar
uol.com.br
uol.com.co
uol.com.mx
uol.com.ve
uole.com
uole.com.ve
uolmail.com
uomail.com
ureach.com
urgentmail.biz
usa.com
usanetmail.com
uymail.com
uyuyuy.com
v-sexi.com
velnet.co.uk
velocall.com
verizonmail.com
veryfast.biz
veryspeedy.net
violinmakers.co.uk
vip.gr
vipmail.ru
virgilio.it
virgin.net
virtualmail.com
visitmail.com
visto.com
vivianhsu.net
vjtimail.com
vnn.vn
volcanomail.com
vote-democrats.com
vote-hillary.com
vote-republicans.com
wahoye.com
wales2000.net
wam.co.za
wanadoo.es
warmmail.com
warpmail.net
warrior.hu
waumail.com
wearab.net
web-mail.com.ar
web-police.com
web.de
webave.com
webcity.ca
webdream.com
webindia123.com
webjump.com
webmail.co.yu
webmail.co.za
webmail.hu
webmails.com
webprogramming.com
webstation.com
websurfer.co.za
webtopmail.com
weedmail.com
weekonline.com
wehshee.com
welsh-lady.com
whartontx.com
wheelweb.com
whipmail.com
whoever.com
whoopymail.com
wildmail.com
winmail.com.au
winning.com
witty.com
wolf-web.com
wombles.com
wongfaye.com
wooow.it
workmail.com
worldemail.com
wosaddict.com
wouldilie.com
wowmail.com
wp.pl
wrexham.net
writeme.com
writemeback.com
wrongmail.com
www.com
wx88.net
wxs.net
x-mail.net
x5g.com
xmsg.com
xoom.com
xsmail.com
xuno.com
xzapmail.com
yada-yada.com
yaho.com
yahoo.ca
yahoo.co.in
yahoo.co.jp
yahoo.co.kr
yahoo.co.nz
yahoo.co.uk
yahoo.com
yahoo.com.ar
yahoo.com.au
yahoo.com.br
yahoo.com.cn
yahoo.com.hk
yahoo.com.is
yahoo.com.mx
yahoo.com.ru
yahoo.com.sg
yahoo.de
yahoo.dk
yahoo.es
yahoo.fr
yahoo.ie
yahoo.it
yahoo.jp
yahoo.ru
yahoo.se
yahoofs.com
yalla.com
yalla.com.lb
yalook.com
yam.com
yandex.ru
yapost.com
yebox.com
yehey.com
yemenmail.com
yepmail.net
yifan.net
yopolis.com
youareadork.com
your-house.com
yourinbox.com
yourlover.net
yournightmare.com
yours.com
yourssincerely.com
yourteacher.net
yourwap.com
yuuhuu.net
yyhmail.com
zahadum.com
zeepost.nl
zhaowei.net
zip.net
zipido.com
ziplip.com
zipmail.com
zipmail.com.br
zipmax.com
zmail.ru
zonnet.nl
zubee.com
zuvio.com
zwallet.com
zybermail.com
zzn.com
zzom.co.uk
*/
		}


		
}


?>  