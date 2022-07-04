<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['admin_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM penelitian WHERE id_penelitian = $id");
		if(mysqli_num_rows($query_check) == 1){
			$query_update= mysqli_query($connection, "UPDATE penelitian SET status = 'terverifikasi' WHERE id_penelitian = $id");
			if($query_update){
				$pesan = "Penelitian sukses diverifikasi!";
			}
			else{
				$pesan = "Penelitian gagal diverifikasi!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './penelitian.php';
		 			</script>";
		}
		else{
			header('location: ./penelitian.php');
		}
	}
	else{
		header('location: ./penelitian.php');
	}
?>