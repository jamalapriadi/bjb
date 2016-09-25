<?php

	foreach($query->result() as $row):
		echo $row->nama .'<br>';
	endforeach;

?>