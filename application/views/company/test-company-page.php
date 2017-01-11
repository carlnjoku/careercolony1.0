<script type="text/javascript" src="<?php echo base_url(); ?>overlay-loader/loadingoverlay.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/timeago.js"></script>
<script src="<?php echo base_url(); ?>plugins/sticky-element.js"></script>  
<script src="<?php echo base_url(); ?>plugins/jscroll-master/jquery.jscroll.min.js"></script> 

<script>
      
      $(function () {
        
        $('form').bind('submit', function () {
          $.ajax({
            type: 'post',
            url: 'http://localhost/neo4j-moviedb/web/company_post',
            data: $('form').serialize(),
            
            beforeSend: function()
        	{
             	$("#element").LoadingOverlay("show");
             	
        	},
            success: function (data) {
              	var data = $.parseJSON(data);//parse JSON
          	  	var coyID = data.coyID;
         		var status = data.status;
         		var post_text = data.post_text;
         		var post_time = data.post_time;
         		
         		// Start result
         		 if(result.length == 0)
        		 {
            		//temp
            		alert("not found");
        		 }
        		else{
            		for(var i = 0; i < result.length; i++)
            	{
                	//generate <li>
                	$('#list').append('<li class="box"><img class="picture" src="images/HotPromo/tagPhoto1.png"/><p class="name"><b>Name</b></p><p class="address">Address</p></li>');
            	}

            	var i=0;
            		$(".box").each(function(){
                	var name, address, picture = "";
                	if(i < result.length)
                	{
                    	name = result[i].name;
                    	address = result[i].address;
                    	picture = result[i].boxpicture;
                	}

                	$(this).find(".name").html(name);
                	$(this).find(".address").html(address);
                	$(this).find(".picture").attr("src", picture);
                	i++;
            	});
        	}
         		
         		
         		
         		
         		// End result
         		
         		
         		
         		
         		
          		if(status === '0') {
              		$("#error").fadeIn('3000');
          		}else{
              		$("#postResult").html(post_text).fadeIn('3000');
              		$("#postTime").html(post_time).fadeIn('3000');
          		}
              
              $("#element").LoadingOverlay("hide", true);
             
            }
          });
          return false;
        });
      });
    </script>



<!--
<script>

$(function () {
$('form').bind('submit', function () {
$.ajax({
    url: "http://localhost/neo4j-moviedb/web/company_post',/1" //This is the current doc
    type: "GET",
    error : function(jq, st, err) {
        alert(st + " : " + err);
    },
    success: function(result){
        //generate search result
        //float:left untuk hack design
        $('#search').append('<p style="float:left;">Search for : ' + keyword + '</p>'
            + '<br/>'
            + '<p>Found ' + result.length + ' results</p>');

        if(result.length == 0)
        {
            //temp
            alert("not found");
        }
        else{
            for(var i = 0; i < result.length; i++)
            {
                //generate <li>
                $('#list').append('<li class="box"><img class="picture" src="images/HotPromo/tagPhoto1.png"/><p class="name"><b>Name</b></p><p class="address">Address</p></li>');
            }

            var i=0;
            $(".box").each(function(){
                var name, address, picture = "";
                if(i < result.length)
                {
                    name = result[i].name;
                    address = result[i].address;
                    picture = result[i].boxpicture;
                }

                $(this).find(".name").html(name);
                $(this).find(".address").html(address);
                $(this).find(".picture").attr("src", picture);
                i++;
            });
        }
    }
     return false;
        });
        
        return false;
        });
      });

</script>

-->
	<!-- Widget -->
			<div class="relativeWrap" id="element">
				<div class="widget widget-heading-simple widget-body-gray">
					<div class="widget-body">
					<h5 class="strong muted">Engage Your Audience</h5>
						<p>Post your daily events about your products and services to trigger discussion ..</p>
						<div class="share margin-none" >
							<form id="" action="#" method="post" class="form-horizontal">
							<input class="form-control" id="user_id" name="user_id" value="1" type="hidden" />
							<input class="form-control" id="coyID" name="coyID" value="1" type="hidden" />
							<input class="form-control" id="post_image" name="post_image" value="" type="hidden" />
							<input class="form-control" id="companyname" name="companyname" value="Flavoursoft" type="hidden" />
							<input class="form-control" id="post_video" name="post_video" value="" type="hidden" />
								<textarea class="form-control" style="border:1px solid #D8D8D8; background-color:#FAFAFA" id="post_text" name="post_text" rows="2" placeholder="Share something you find interesting..."></textarea>
							<div class="form-actions">
				
								<input type="submit" class="btn btn-primary" id="submit" class="next button" value="Continue">
				
							</div>
							</form>		
						
						</div>
						
					</div>
				</div>
			</div>
			<!-- // Widget END -->
			
			<html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="jquery.jscroll.min.js"></script>

<style type="text/css">
.scroll {
border: 1px solid #aaa;
padding: 5px 10px;
height: 300px;
width: 400px;
overflow-y: scroll;
margin: 100px 0 20px 0;
background: #ffc;
}
</style>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="jquery-script-menu">
<div class="jquery-script-center">
<ul>
<li><a href="http://www.jqueryscript.net/other/jQuery-Infinite-Scrolling-Auto-Paging-Plugin-jScroll.html">Download This Plugin</a></li>
<li><a href="http://www.jqueryscript.net/">Back To jQueryScript.Net</a></li>
</ul>


<div class="jquery-script-clear"></div>
</div>
</div>
<div class="scroll" data-ui="jscroll-default" style="margin-top:150px;">
<h3>Page 1 of jScroll Example - jQuery Infinite Scrolling Plugin</h3>
<p>This is the content of <strong>page 1</strong> in the jScroll example. Scroll to the bottom of this box to load the next set of content.</p>
<p>This is example text for the jScroll demonstration. jScroll is a jQuery plugin for infinite scrolling, endless scrolling, lazy loading, auto-paging, or whatever you may call it.</p>
<p>With jScroll, you can initialize the scroller on an element with a fixed height and overflow setting of &quot;auto&quot; or &quot;scroll,&quot; or it can be set on a standard block-level element within the document and the scrolling will be initialized based on the brower window&#39;s scroll position.</p>
<a href="example-page2.html">next</a> </div>
<script>
$('.scroll').jscroll();
</script>

