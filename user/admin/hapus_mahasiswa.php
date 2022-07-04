<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['admin_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['nim']) && !empty($_GET['nim']) && is_numeric($_GET['nim'])){
		$nim = $_GET['nim'];
		$query_check= mysqli_query($connection, "SELECT * FROM mahasiswa WHERE nim = $nim");
        $data_mahasiswa = mysqli_fetch_assoc($query_check);
        $user_id = $data_mahasiswa['user_id'];
		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM mahasiswa WHERE nim = $nim");
            $query_delete2= mysqli_query($connection, "DELETE FROM users WHERE user_id = $user_id");
			if($query_delete && $query_delete2){
				$pesan = "Mahasiswa sukses dihapus!";
			}
			else{
				$pesan = "Mahasiswa gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './mahasiswa.php';
		 			</script>";
		}
		else{
			header('location: ./mahasiswa.php');
		}
	}
	else{
		header('location: ./mahasiswa.php');
	}
?>