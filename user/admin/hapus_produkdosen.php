<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['admin_id'])){
        header('location: ../../index.php');
    }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM produk_dosen WHERE id = $id");
        $data = mysqli_fetch_assoc($query_check);
        $file_bukti = $data['file_bukti'];
        $target = "../../public/file/$file_bukti";

		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "DELETE FROM produk_dosen WHERE id = $id");
            unlink($target);
			if($query_delete){
				$pesan = "Produk Dosen sukses dihapus!";
			}
			else{
				$pesan = "Produk Dosen gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './produk_dosen.php';
		 			</script>";
		}
		else{
			header('location: ./produk_dosen.php');
		}
	}
	else{
		header('location: ./produk_dosen.php');
	}
?>