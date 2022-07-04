<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['admin_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM prestasi_mhs WHERE id_prestasi = $id");
        $data_prestasi_mhs = mysqli_fetch_assoc($query_check);
        $file_sertif = $data_prestasi_mhs['file_sertif'];
        $target = "../../public/file/$file_sertif";

		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM prestasi_mhs WHERE id_prestasi = $id");
            unlink($target);
			if($query_delete){
				$pesan = "Prestasi sukses dihapus!";
			}
			else{
				$pesan = "Prestasi gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './prestasi_mhs.php';
		 			</script>";
		}
		else{
			header('location: ./prestasi_mhs.php');
		}
	}
	else{
		header('location: ./prestasi_mhs.php');
	}
?>