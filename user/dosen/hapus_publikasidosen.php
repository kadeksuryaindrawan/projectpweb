<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['dosen_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM publikasi_dosen WHERE id_publikasidosen = $id");
        $data = mysqli_fetch_assoc($query_check);
        $file_jurnal = $data['file_jurnal'];
        $target = "../../public/file/$file_jurnal";

		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM publikasi_dosen WHERE id_publikasidosen = $id");
            unlink($target);
			if($query_delete){
				$pesan = "Publikasi Dosen sukses dihapus!";
			}
			else{
				$pesan = "Publikasi Dosen gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './publikasi_dosen.php';
		 			</script>";
		}
		else{
			header('location: ./publikasi_dosen.php');
		}
	}
	else{
		header('location: ./publikasi_dosen.php');
	}
?>