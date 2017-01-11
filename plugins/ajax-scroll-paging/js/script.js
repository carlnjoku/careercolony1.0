var is_loading = false; // initialize is_loading by false to accept new loading
var limit = 5; // limit items per page
$(function() {
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() == $(document).height()) {
            if (is_loading == false) { // stop loading many times for the same page
                // set is_loading to true to refuse new loading
                is_loading = true;
                // display the waiting loader
                $('#loader').show();
                //alert(last_id);
                // execute an ajax query to load more statments
                $.ajax({
                   // url: 'http://localhost/careercolony1.0/company/load_more',
                    url: 'http://localhost/careercolony1.0/company/load_more_post',
                    type: 'POST',
                    data: {last_id:last_id, limit:limit, coyID:coyID},
                    success:function(data){
                        // now we have the response, so hide the loader
                        $('#loader').hide();
                        // append: add the new statments to the existing data
                        $('#list').append(data).fadeIn('300');
                        // set is_loading to false to accept new loading
                        is_loading = false;
                    }
                });
            }
       }
    });
});
