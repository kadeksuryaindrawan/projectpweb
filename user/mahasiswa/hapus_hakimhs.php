<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['mahasiswa_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM haki_mahasiswa WHERE id_hakimhs = $id");
        $data_haki_mhs = mysqli_fetch_assoc($query_check);
        $file_sertif = $data_haki_mhs['file_sertif'];
        $target = "../../public/file/$file_sertif";

		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM haki_mahasiswa WHERE id_hakimhs = $id");
            unlink($target);
			if($query_delete){
				$pesan = "Haki mahasiswa sukses dihapus!";
			}
			else{
				$pesan = "Haki mahasiswa gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './haki_mhs.php';
		 			</script>";
		}
		else{
			header('location: ./haki_mhs.php');
		}
	}
	else{
		header('location: ./haki_mhs.php');
	}
?>