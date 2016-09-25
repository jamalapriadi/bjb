<h2>Daftar Anggota</h2>
<hr />

<?php echo anchor('anggota/tambah','+ Tambah Anggota');?>
<br>

<?php echo $this->session->flashdata('pesan');?>
<table width="100%" cellpadding="0" cellspacing="4" border="1" style="border-collapse:collapse;">
<tr>
	<th>No.</th>
	<th>Nama Anggota</th>
	<th>Alamat</th>
	<th>Telp</th>
	<th>Aksi</th>
</tr>

<?php
	if(!empty($query))
	{
		$no=0;
		foreach($query as $row){
			$no++;
			?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $row->nama;?></td>
				<td><?php echo $row->alamat;?></td>
				<td><?php echo $row->telp;?></td>
				<td>
					<?php echo anchor('anggota/ubah/'.$row->id,'Ubah Data');?>
					<?php echo anchor('anggota/hapus/'.$row->id,'Hapus Data',array('onclick'=>'return confirm("Yakin mau hapus data ini?")'));?>
				</td>
			</tr>
			<?php
		}
	}else{
			echo '<tr><th colspan="5">Maaf data tidak tersedia.</th></tr>';
	}
	
?>
</table>

<?php echo $halaman;?>