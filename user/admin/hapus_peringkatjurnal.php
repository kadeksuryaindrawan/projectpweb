<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['admin_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM peringkat_jurnal WHERE id_peringkatjurnal = $id");

		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM peringkat_jurnal WHERE id_peringkatjurnal = $id");
			if($query_delete){
				$pesan = "Peringkat Jurnal sukses dihapus!";
			}
			else{
				$pesan = "Peringkat Jurnal gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './peringkat_jurnal.php';
		 			</script>";
		}
		else{
			header('location: ./peringkat_jurnal.php');
		}
	}
	else{
		header('location: ./peringkat_jurnal.php');
	}
?>