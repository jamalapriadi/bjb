<?php
	//untuk membuka form
	echo form_open('belajar/tampil_form');

	?>
	<h2>Form Registrasi Anggota</h2>
	<hr>
		<table cellpadding="4" cellspacing="0" border="1" style="border-collapse:collapse;">
			<tr>
				<th width="10%">Nama</th>
				<td width="45%">
					<?php echo form_error('nama');?>
					<?php echo form_input(array(
						'name'=>'nama',
						'id'=>'nama',
						'value'=>set_value('nama')
					));?>
				</td>
			</tr>

			<tr>
				<th width="10%">Alamat</th>
				<td width="45%">
					<?php echo form_error('alamat');?>
					<?php echo form_textarea(array(
						'name'=>'alamat',
						'id'=>'alamat',
						'rows'=>'3',
						'value'=>set_value('alamat')
					));?>
				</td>
			</tr>

			<tr>
				<th width="10%">Jenis Kelamin</th>
				<td width="45%">
					<?php echo form_error('jenkel');?>
					<?php echo form_radio(array(
						'name'=>'jk',
						'id'=>'jk',
						'value'=>'L'
					)).' Lelaki&nbsp;&nbsp;&nbsp;';

					echo form_radio(array(
						'name'=>'jk',
						'id'=>'jk',
						'value'=>'P'
					)).' Perempuan';
					?>
				</td>
			</tr>

			<tr>
				<th width="10%">Hobi</th>
				<td width="45%">
					<?php echo form_error('hobi');?>
					<?php $options = array(
					        'baca'         => 'Baca Buku',
					        'makan'        => 'Makan / Kuliner',
					        'tidur'        => 'Tidur',
					        'olahraga'     => 'Olahraga'
					        );
					        echo form_dropdown('hobi',$options,'baca');
					?>
				</td>
			</tr>

			<tr>
				<th width="10%">&nbsp;</th>
				<td width="45%">
					<?php echo form_submit(array(
					'name'=>'submit',
					'id'=>'submit',
					'value'=>'Simpan Data'));?>
				</td>
			</tr>


		</table>
	<?php

	//untuk menutut form
	echo form_close();

?>