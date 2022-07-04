<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['admin_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM jurnal_index WHERE id_jurnalindex = $id");
		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM jurnal_index WHERE id_jurnalindex = $id");
			if($query_delete){
				$pesan = "Jurnal Index sukses dihapus!";
			}
			else{
				$pesan = "Jurnal Index gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './jurnal_index.php';
		 			</script>";
		}
		else{
			header('location: ./jurnal_index.php');
		}
	}
	else{
		header('location: ./jurnal_index.php');
	}
?>