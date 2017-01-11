<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<script src="http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/overlay-loader/loadingoverlay.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/drag-drop/js/jquery-ui-1.7.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/sticky-element.js"></script>  


<script>
$(document).ready(function () {
    
    $('ul').sortable({
        axis: 'y',
        stop: function (event, ui) {
	        var data = $(this).sortable('serialize');
            $('span').text(data);
            /*$.ajax({
                    data: oData,
                type: 'POST',
                url: '/your/url/here'
            });*/
	}
    });
});
</script>







<!-- each overlay is initialized with this single JavaScript call -->
<script>
  	
  	$(function() {
    	//$("button[rel]").overlay({mask: '#9a9b9b', effect: 'apple', closeOnClick: false});
    	$("a[rel]").overlay({mask: '#9a9b9b', effect: 'apple', top:'15%', non:'disable', closeOnClick: false});
    });
  							
</script>

<script language="javascript">
$(document).ready(function() {
	jQuery.noConflict();
	$(".comment").shorten({
		moreText: 'read more',
    	lessText: 'read less',
    	showChars: 150
	
	});

 });
</script>

<script language="javascript">
$(document).ready(function() {
 	jQuery.noConflict();
 	$("#sidebar").stick_in_parent({
   		offset_top: 102
	});
 });
</script>

<script language="javascript">
$(document).ready(function() {
 	jQuery.noConflict();
 	$("#section").stick_in_parent({
   		offset_top: 102
	});
 });
</script>


















<div class="container-777">
		
		
			<!-- 2 Column Grid / One Fourth & Three Fourth -->
			<div class="row">

				<!-- One Fourth Column -->
				<div class="col-md-8">


				
<ul id="sortable">
    <li id="item-1">Item 1</li>
    <li id="item-2">Item 2</li>
    <li id="item-3">Item 3</li>
    <li id="item-4">Item 4</li>
</ul>


Query string: <span>asds</span>
			<!-- // 2 Column Grid / One Fourth & Three Fourth -->

</div>	



