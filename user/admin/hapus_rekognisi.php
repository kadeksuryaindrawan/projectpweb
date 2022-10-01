<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['admin_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM rekognisi WHERE id = $id");
        $data = mysqli_fetch_assoc($query_check);
        $file_sk = $data['file_sk'];
        $target = "../../public/file/$file_sk";

		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM rekognisi WHERE id = $id");
            unlink($target);
			if($query_delete){
				$pesan = "Rekognisi sukses dihapus!";
			}
			else{
				$pesan = "Rekognisi gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './rekognisi.php';
		 			</script>";
		}
		else{
			header('location: ./rekognisi.php');
		}
	}
	else{
		header('location: ./rekognisi.php');
	}
?>