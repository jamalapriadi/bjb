<?php echo form_open_multipart('belajar/proses_upload');?>
	
	<fieldset>
		<?php echo $error;?>
		<legend>Upload File!</legend>
		<label>Nama File</label>
		<?php
			echo form_input(array(

				'name'=>'gambar',
				'id'=>'gambar',
				'type'=>'file'
				));
		?>

		<?php echo form_submit('sumbit','Upload File!');?>
	</fieldset>

<?php echo form_close();?>