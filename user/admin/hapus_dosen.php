<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['admin_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['user_id']) && !empty($_GET['user_id']) && is_numeric($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		$query_check= mysqli_query($connection, "SELECT * FROM dosen WHERE user_id = $user_id");
        $data_dosen = mysqli_fetch_assoc($query_check);
        $user_id = $data_dosen['user_id'];
		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM dosen WHERE user_id = $user_id");
            $query_delete2= mysqli_query($connection, "DELETE FROM users WHERE user_id = $user_id");
			if($query_delete && $query_delete2){
				$pesan = "Dosen sukses dihapus!";
			}
			else{
				$pesan = "Dosen gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './dosen.php';
		 			</script>";
		}
		else{
			header('location: ./dosen.php');
		}
	}
	else{
		header('location: ./dosen.php');
	}
?>