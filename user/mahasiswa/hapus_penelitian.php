<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['mahasiswa_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM penelitian WHERE id_penelitian = $id");
        $data = mysqli_fetch_assoc($query_check);

        $file_proposal = $data['file_proposal'];
        $file_laporan = $data['file_laporan'];
        
        $target_proposal = "../../public/file/$file_proposal";
        $target_laporan = "../../public/file/$file_laporan";
		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM penelitian WHERE id_penelitian = $id");
            unlink($target_proposal);
            unlink($target_laporan);
            if($query_delete){
				$pesan = "Penelitian sukses dihapus!";
			}
			else{
				$pesan = "Penelitian gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './penelitian.php';
		 			</script>";
		}
		else{
			header('location: ./penelitian.php');
		}
	}
	else{
		header('location: ./penelitian.php');
	}
?>