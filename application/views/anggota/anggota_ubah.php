<h2>Ubah Data Anggota</h2>
<hr>
<?php echo anchor('anggota','&laquo; Kembali');?>
<?php echo $this->session->flashdata('pesan');?>

<?php echo form_open('anggota/ubah/'.$this->uri->segment(3));?>
	<label>Nama Anggota</label><br>
	<?php echo form_error('nama');?>
	<?php 
		echo form_input(array(
			'name'=>'nama',
			'id'=>'nama',
			'value'=>$query->nama
			));
	?>
	<br>
	<label>Alamat</label><br>
	<?php echo form_error('alamat');?>
	<?php 
		echo form_input(array(
			'name'=>'alamat',
			'id'=>'alamat',
			'value'=>$query->alamat
			));
	?>
	<br>
	<label>Telp</label><br>
	<?php echo form_error('telp');?>
	<?php 
		echo form_input(array(
			'name'=>'telp',
			'id'=>'telp',
			'value'=>$query->telp
			));
	?>	
	<br>
	<?php echo form_submit('simpan','Simpan Data');?>
<?php echo form_close();?>