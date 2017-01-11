<?php
include 'db.php';
session_start();
$session_uid='1'; // $_SESSION['user_id'];
include 'userUpdates.php';
$userUpdates = new userUpdates($db);
$userData=$userUpdates->userDetails($session_uid);
$username=$userData['username'];
$name=$userData['name'];
$profile_background=$userData['profile_background'];
$profile_background_position=$userData['profile_background_position'];

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Background drag using jquery</title>
<link href='timeline.css' rel='stylesheet' type='text/css'/>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.wallform.js"></script>
<script>
$(document).ready(function()
{


/* Uploading Profile BackGround Image */
$('body').on('change','#bgphotoimg', function()
{

$("#bgimageform").ajaxForm({target: '#timelineBackground',
beforeSubmit:function(){},
success:function(){

$("#timelineShade").hide();
$("#bgimageform").hide();
},
error:function(){

} }).submit();
});



/* Banner position drag */
$("body").on('mouseover','.headerimage',function ()
{
var y1 = $('#timelineBackground').height();
var y2 =  $('.headerimage').height();
$(this).draggable({
scroll: false,
axis: "y",
drag: function(event, ui) {
if(ui.position.top >= 0)
{
ui.position.top = 0;
}
else if(ui.position.top <= y1 - y2)
{
ui.position.top = y1 - y2;
}
},
stop: function(event, ui)
{
}
});
});


/* Bannert Position Save*/
$("body").on('click','.bgSave',function ()
{
var id = $(this).attr("id");
var p = $("#timelineBGload").attr("style");
var Y =p.split("top:");
var Z=Y[1].split(";");
var dataString ='position='+Z[0];
$.ajax({
type: "POST",
url: "image_saveBG_ajax.php",
data: dataString,
cache: false,
beforeSend: function(){ },
success: function(html)
{
if(html)
{
$(".bgImage").fadeOut('slow');
$(".bgSave").fadeOut('slow');
$("#timelineShade").fadeIn("slow");
$("#timelineBGload").removeClass("headerimage");
$("#timelineBGload").css({'margin-top':html});
return false;
}
}
});
return false;
});



});
</script>
</head>
<body>
<div id="container">

<div id="timelineContainer">

<!-- timeline background -->
<div id="timelineBackground">
<img src="<?php echo $path.$profile_background; ?>" class="bgImage" style="margin-top: <?php echo $profile_background_position; ?>;">
</div>

<!-- timeline background -->
<div style="background:url(images/timeline_shade.png);" id="timelineShade">
<form id="bgimageform" method="post" enctype="multipart/form-data" action="image_upload_ajax.php">
<div class="uploadFile timelineUploadBG">
<input type="file" name="photoimg" id="bgphotoimg" class=" custom-file-input" original-title="Change Cover Picture">
</div>
</form>
</div>

<!-- timeline profile picture -->
<div id="timelineProfilePic"></div>

<!-- timeline title -->
<div id="timelineTitle"><?php echo $name; ?></div>

<!-- timeline nav -->
<div id="timelineNav"></div>

</div>

</div>

</body>
</html>