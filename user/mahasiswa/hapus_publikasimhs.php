<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['mahasiswa_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM publikasi_mhs WHERE id_publikasimhs = $id");
        $data = mysqli_fetch_assoc($query_check);
        $file_jurnal = $data['file_jurnal'];
        $target = "../../public/file/$file_jurnal";

		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM publikasi_mhs WHERE id_publikasimhs = $id");
            unlink($target);
			if($query_delete){
				$pesan = "Publikasi Mahasiswa sukses dihapus!";
			}
			else{
				$pesan = "Publikasi Mahasiswa gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './publikasi_mhs.php';
		 			</script>";
		}
		else{
			header('location: ./publikasi_mhs.php');
		}
	}
	else{
		header('location: ./publikasi_mhs.php');
	}
?>