<style>


body{
    background:#e9eaed;
	}
	
.grad {
  background: red; /* For browsers that do not support gradients */
  background: -webkit-linear-gradient(left top, #A4A4A4, #D8D8D8); /* For Safari 5.1 to 6.0 */
  background: -o-linear-gradient(bottom right, #A4A4A4, #D8D8D8); /* For Opera 11.1 to 12.0 */
  background: -moz-linear-gradient(bottom right, #A4A4A4, #D8D8D8); /* For Firefox 3.6 to 15 */
  background: linear-gradient(to bottom right, #A4A4A4, #D8D8D8); /* Standard syntax */
  z-index:20px;
  position:relative; top:-20px;
  height:70px;
}
    
h1, h2, h3, h4, h5, h6{
    font-family: 'Open Sans Condensed', sans-serif, sans-serif;
}
	
.container{
	position:relative;
	top:-10px;
}

.wrapper{
	}

#header{
	border:1px solid #ddd;
	margin-bottom:20px;
	}
	


	
.navbar{
	border-radius:0;
	margin-bottom:0;
	border:none;
        font-family: 'Open Sans Condensed', sans-serif, sans-serif;

	}
    
.navbar > li >a{
    
    }
	

	
.navbar-header{
	}
	
.navbar-brand{
width:160px;
height:160px;
float:left;
padding:0;
margin-top:-130px;
overflow:hidden;
border:3px solid #eee;
margin-left:15px;
background:#333;
text-align:center;
line-height:160px;
color:#fff !important;
font-size:2em;
    -webkit-transition:  all 0.3s ease-in-out;
  	-moz-transition: all 0.3s ease-in-out;
  	-o-transition:  all 0.3s ease-in-out;
  	transition: all 0.3s ease-in-out ;

	}
	
	
.site-name{
	color:#fff;
	font-size:2.4em;
	float:left;
	margin-top:-65px !important;
	margin-left:15px;
        font-family: 'Open Sans Condensed', sans-serif, sans-serif;

	}	
.site-description{
	color:#fff;
	font-size:1.3em;
	float:left;
	margin-top:-30px !important;
	margin-left:15px;
	}
	
.main-menu{
	position:absolute;
	left:190px;
	}
	
.slider, .carousel{
	max-height:360px;
	overflow:hidden;
	}
	
.carousel-control .fa-angle-left,
.carousel-control .fa-angle-right {
position: absolute;
top: 50%;
font-size:2em;
z-index: 5;
display: inline-block;
}

.carousel-control{
	background-color:transparent;
	background-image:none !important;
	}
	
.carousel-control:hover,
.carousel-control:focus {
  color: #fff;
  text-decoration: none;
  background-color:transparent !important;
  background-image:none !important;
  outline: 0;
}


	

	
	
@media (max-width: 768px) {
.navbar-brand{
    max-width: 100px;
	max-height:100px;
	float:left;
	margin-top:-65px;
	margin-left:15px;
	-webkit-transition:  all 0.3s ease-in-out;
  	-moz-transition: all 0.3s ease-in-out;
  	-o-transition:  all 0.3s ease-in-out;
  	transition: all 0.3s ease-in-out ;
  }
  

  


.navbar{
	border-radius:0;
	margin-bottom:0;
	border:none;
	}
	
.main-menu{
	left:0;
	position:relative;
	}


}

@media (max-width: 490px) {
	.site-name{
	color:#fff;
	font-size:1.5em;
	float:left;
	line-height:20px;
	margin-top:-100px !important;
	margin-left:125px;
	}	
.site-description{
	color:#fff;
	font-size:1.3em;
	float:left;
	margin-top:-80px !important;
	margin-left:125px;
	}
}

</style>

<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>


<div class="wrapper">

        <div class="container">
        	<div class="row">
                <div class="col-md-12">
                
                <header id="header">

  <div class="slider">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo base_url();?>uploads/company_banner/banner1.jpg">
    </div>
    <div class="item">
      <img src="<?php echo base_url();?>uploads/company_banner/banner2.jpg">
    </div>
    <div class="item">
      <img src="<?php echo base_url();?>uploads/company_banner/banner3.jpg">
    </div>
  
    
  </div>
  

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="fa fa-angle-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="fa fa-angle-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                	</div><!--slider-->
                	<nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                    
                        <div class="navbar-header">
							
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand" href="#"><img class="img-responsive" src="<?php echo base_url();?>uploads/logo_flavour.png"></a>
                          <span class="site-name"><b>Flavoursoft</b> Consulting</span>
                          <span class="site-description">Web Publishing</span>
                        </div>
                    
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="mainNav" >
                          <ul class="nav main-menu navbar-nav">
                            <li><a href="#"><i class="fa fa-home"></i> HOME</a></li>
                            <li><a href="#"><i class="fa fa-home"></i> ABOUT US</a></li>
                            <li><a href="#"><i class="fa fa-home"></i> PRODUCTS & SERVICES</a></li>
                            <li><a href="#"><i class="fa fa-image"></i> GALLERY</a></li>
                       
                          </ul>
                          
                           <ul class="nav  navbar-nav navbar-right">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                          </ul>
                        </div><!-- /.navbar-collapse -->
					</nav>
                    
                </header><!--/#HEADER-->