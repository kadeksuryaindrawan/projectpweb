<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['admin_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM jabatan WHERE id = $id");
		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM jabatan WHERE id = $id");
			if($query_delete){
				$pesan = "Jabatan sukses dihapus!";
			}
			else{
				$pesan = "Jabatan gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './jabatan.php';
		 			</script>";
		}
		else{
			header('location: ./jabatan.php');
		}
	}
	else{
		header('location: ./jabatan.php');
	}
?>