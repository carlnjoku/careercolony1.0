<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Careercolony.</title>
    
    
    <link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico">
    
        <link rel="stylesheet" href="<?php echo base_url();?>login_assets/css/style.css">

    
    
    
  </head>
  
  <style>
  body {
  margin: 0;
  background: #000; 
}
video { 
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    transform: translateX(-50%) translateY(-50%);
 background: url('//demosthenes.info/assets/images/polina.jpg') no-repeat;
  background-size: cover;
  transition: 1s opacity;
}
.stopfade { 
   opacity: .5;
}



a {
  display: inline-block;
  color: #fff;
  text-decoration: none;
  background:rgba(0,0,0,0.5);
  padding: .5rem;
  transition: .6s background; 
}
a:hover{
  background:rgba(0,0,0,0.9);
}
@media screen and (max-width: 500px) { 
  div{width:70%;} 
}
@media screen and (max-device-width: 800px) {
  html { background: url(//demosthenes.info/assets/images/polina.jpg) #000 no-repeat center center fixed; }
  #bgvid { display: none; }
}

</style>

<script>
var vid = document.getElementById("bgvid");
var pauseButton = document.querySelector("#polina button");

function vidFade() {
  vid.classList.add("stopfade");
}

vid.addEventListener('ended', function()
{
// only functional if "loop" is removed 
vid.pause();
// to capture IE10
vidFade();
}); 


pauseButton.addEventListener("click", function() {
  vid.classList.toggle("stopfade");
  if (vid.paused) {
    vid.play();
    pauseButton.innerHTML = "Pause";
  } else {
    vid.pause();
    pauseButton.innerHTML = "Paused";
  }
})



</script>

  </head>

  <body>
  
  <img src="<?php echo base_url(); ?>logo.png" style="position:absolute; top:40px; left:42%">


    <div class="vid-container">
  <video class="bgvid" autoplay="autoplay" muted="muted" preload="auto" loop>
      <source src="<?php echo base_url();?>leif_eliasson--glaciartopp.mkv" type="video/mkv">
  </video>
  <div class="inner-container">
    <video poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg" id="bgvid" playsinline autoplay muted loop>
  <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
<source src="<?php echo base_url(); ?>/login_assets/583335745.webm" type="video/webm">
<source src="<?php echo base_url(); ?>/login_assets/01.mp4" type="video/mp4">

</video>
<div class="box">
      <h1>Login</h1>
      <input type="text" placeholder="Email"/>
      <input type="text" placeholder="Password"/>
      <button>Login</button>
      <p>Not a member? <span style="color:#297cbd">Sign Up</span></p>
    </div>
    
    
  </div>
  
  

</div>




    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
