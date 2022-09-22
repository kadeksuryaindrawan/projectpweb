<?php  
	date_default_timezone_set('Asia/Makassar');
	
	$HOST 		= 'localhost';
	$USERNAME	= 'root';
	$PASSWORD	= '';
	$DATABASE	= 'aps_c4';

	$connection = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DATABASE);
    
?>