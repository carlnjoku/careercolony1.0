<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>cropit/dist/jquery.cropit.js"></script>

    <style>
      .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 600px;
        height: 200px;
      }

      .cropit-preview-image-container {
        cursor: move;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input {
        display: block;
      }

      button[type="submit"] {
        margin-top: 10px;
      }

      #result {
        margin-top: 10px;
        width: 900px;
      }

      #result-data {
        display: block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        word-wrap: break-word;
      }
    </style>

    




<script>
      $(function() {
        $('.image-editor').cropit();
        
 
        $('form').submit(function() {
          // Move cropped image data to hidden input
		  
          var imageData = $('.image-editor').cropit('export',{exportZoom: 2});
          $('.hidden-image-data').val(imageData);
			
          // Print HTTP request params
          var formValue = $(this).serialize();
          
			$.ajax({
			   type: 'post',
			   data: formValue,
			   url: '<?php echo base_url();?>company/process_cropit',
			   success: function(data){
			   $('#result-data').text('New file in: images/'+data);
			   $('#crop').show();
			  }
		
		 });		  
 
          // Prevent the form from actually submitting
          return false;
        });
      });
    </script>
    
    
    <form action="#">
      <div class="image-editor">
        <input type="file" class="cropit-image-input">
        <div class="cropit-preview"></div>
        <div class="image-size-label">
          Resize image
        </div>
        <input type="range" class="cropit-image-zoom-input">
        <input type="text" name="image-data" class="hidden-image-data" />
        <button type="submit">Submit</button>
      </div>
    </form>

    <div id="result">
      <code>$form.serialize() =</code>
      <code id="result-data"></code>
    </div>

    