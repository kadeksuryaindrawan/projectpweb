<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['admin_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM pengabdian WHERE id_pengabdian = $id");
		if(mysqli_num_rows($query_check) == 1){
			$query_update= mysqli_query($connection, "UPDATE pengabdian SET status = 'terverifikasi' WHERE id_pengabdian = $id");
			if($query_update){
				$pesan = "Pengabdian sukses diverifikasi!";
			}
			else{
				$pesan = "Pengabdian gagal diverifikasi!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './pengabdian.php';
		 			</script>";
		}
		else{
			header('location: ./pengabdian.php');
		}
	}
	else{
		header('location: ./pengabdian.php');
	}
?>