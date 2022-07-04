<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['admin_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM tipe_dokumen WHERE id_tipe = $id");
		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM tipe_dokumen WHERE id_tipe = $id");
			if($query_delete){
				$pesan = "Tipe dokumen sukses dihapus!";
			}
			else{
				$pesan = "Tipe dokumen gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './tipe_dokumen.php';
		 			</script>";
		}
		else{
			header('location: ./tipe_dokumen.php');
		}
	}
	else{
		header('location: ./tipe_dokumen.php');
	}
?>