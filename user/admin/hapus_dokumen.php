<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['admin_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM dokumen WHERE id_dokumen = $id");
        $data = mysqli_fetch_assoc($query_check);
        $file_pdf = $data['file_pdf'];
        $target = "../../public/file/$file_pdf";

		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM dokumen WHERE id_dokumen = $id");
            unlink($target);
			if($query_delete){
				$pesan = "Dokumen sukses dihapus!";
			}
			else{
				$pesan = "Dokumen gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './dokumen.php';
		 			</script>";
		}
		else{
			header('location: ./dokumen.php');
		}
	}
	else{
		header('location: ./dokumen.php');
	}
?>