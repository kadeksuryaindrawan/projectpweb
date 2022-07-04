<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['admin_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM pengabdian WHERE id_pengabdian = $id");
        $data = mysqli_fetch_assoc($query_check);

        $file_proposal = $data['file_proposal'];
        $file_laporan = $data['file_laporan'];
        
        $target_proposal = "../../public/file/$file_proposal";
        $target_laporan = "../../public/file/$file_laporan";
		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM pengabdian WHERE id_pengabdian = $id");
            unlink($target_proposal);
            unlink($target_laporan);
            if($query_delete){
				$pesan = "Pengabdian sukses dihapus!";
			}
			else{
				$pesan = "Pengabdian gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './pengabdian.php';
		 			</script>";
		}
		else{
			header('location: ./pengabdian.php');
		}
	}
	else{
		header('location: ./pengabdian.php');
	}
?>