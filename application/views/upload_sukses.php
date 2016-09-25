<h2>Upload file berhasil!</h2>

<img src="<?php echo base_url($upload_data['file_name']);?>">
<br>
<p>Deskripsi :</p>
<ul>
	<li>Tipe : <?php echo $upload_data['file_type'];?></li>
	<li>Ukuran : <?php echo $upload_data['file_size'];?></li>
	<li>Lokasi : <?php echo $upload_data['full_path'];?></li>
</ul>