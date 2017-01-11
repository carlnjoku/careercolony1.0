 <h3>Your file was successfully uploaded!</h3>  
		
     <?php echo $error;?> <!-- Error Message will show up here -->
<?php echo form_open_multipart('company/do_upload');?>
<?php echo "<input type='file' name='userfile' size='20' />"; ?>
<?php echo "<input type='submit' name='submit' value='upload' /> ";?>
<?php echo "</form>"?>

enctype="multipart/form-data"