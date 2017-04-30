<?php

function vd($var) {
	echo '<div style="background: #DFDFDF; font-size: 16px;"><pre><br />';
	print_r($var);

	if (empty($var)) {
		
		echo '<div style="background: #FF9B42; height: 30px; line-height: 0.4;"><pre><br />';
		echo '<br />Тип данных: ' .	gettype($var) .	'</pre><br /></div>';		
	}

}