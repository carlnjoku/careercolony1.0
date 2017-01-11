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
        
        function get_company_posts()
        {
        	
        
        
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
		
		function edit_mode_home()
		{
			$data['user_id'] = $this->session->userdata('user_id');	
			$data['coyID'] = $this->uri->segment(4);	
			
			$data['title'] = 'Company Name';
            $data['main_content'] = 'company/edit-mode-company-home';
            $this->load->view('includes/template_a', $data); 
		}

		public function edit_home()
        {
            $data['user_id'] = $this->session->userdata('user_id');	
			$data['coyID'] = $this->uri->segment(3);	
			
			$data['title'] = 'Home';
            $data['user_id'] = $user_id = $this->session->userdata('user_id');
            $this->load->view('company/partials/edit/public-view-home', $data); 
			
        }
}


?>  