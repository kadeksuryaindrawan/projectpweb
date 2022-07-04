<?php  
	date_default_timezone_set('Asia/Makassar');
	
	$HOST 		= 'localhost';
	$USERNAME	= 'root';
	$PASSWORD	= '';
	$DATABASE	= 'db_prodi';

	$connection = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DATABASE);
    
?>