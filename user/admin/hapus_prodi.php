<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['admin_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['kode_prodi']) && !empty($_GET['kode_prodi']) && is_numeric($_GET['kode_prodi'])){
		$kode_prodi = $_GET['kode_prodi'];
		$query_check= mysqli_query($connection, "SELECT * FROM prodi WHERE kode_prodi = $kode_prodi");
		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM prodi WHERE kode_prodi = $kode_prodi");
			if($query_delete){
				$pesan = "Prodi sukses dihapus!";
			}
			else{
				$pesan = "Prodi gagal dihapus karena masih terkait!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './prodi.php';
		 			</script>";
		}
		else{
			header('location: ./prodi.php');
		}
	}
	else{
		header('location: ./prodi.php');
	}
?>