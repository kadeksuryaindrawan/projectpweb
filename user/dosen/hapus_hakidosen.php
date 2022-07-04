<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['dosen_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM haki_dosen WHERE id_hakidosen = $id");
        $data_haki_dosen = mysqli_fetch_assoc($query_check);
        $file_sertif = $data_haki_dosen['file_sertif'];
        $target = "../../public/file/$file_sertif";

		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM haki_dosen WHERE id_hakidosen = $id");
            unlink($target);
			if($query_delete){
				$pesan = "Haki dosen sukses dihapus!";
			}
			else{
				$pesan = "Haki dosen gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './haki_dosen.php';
		 			</script>";
		}
		else{
			header('location: ./haki_dosen.php');
		}
	}
	else{
		header('location: ./haki_dosen.php');
	}
?>