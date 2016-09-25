<?php

#Membuat Helper Sendiri
#
# @filename belajar_helper.php
# @author Dimas Edubuntu Samid

if(!function_exists('coba'))
{
	function warna_text($text,$color)
	{
		echo '<h2 style="color:'.$color.'">'.$text.'</h2>';
	}
}