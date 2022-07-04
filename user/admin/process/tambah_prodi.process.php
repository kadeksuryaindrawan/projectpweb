<?php  
	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
        $kode_prodi = $_POST['kode_prodi'];
		$nama_prodi = $_POST['nama_prodi'];
		if(!empty($kode_prodi) && !empty($nama_prodi)){
			$query_check = mysqli_query($connection, "SELECT * FROM prodi WHERE kode_prodi = '$kode_prodi'");
			if(mysqli_num_rows($query_check) == 0){
				$query_insert = mysqli_query($connection, "INSERT INTO prodi VALUES ($kode_prodi, '$nama_prodi', '')");
				if($query_insert){
					echo "	<script>
			 					alert('Prodi sukses ditambahkan!');
			 					location.href = '../tambah_prodi.php';
			 				</script>";
				}
				else{
					$pesan = "Prodi gagal dibuat!";
				}
			}
			else{
				$pesan = "Prodi sudah ada sebelumnya! Silahkan coba lagi!";
			}
		}
		else{
			$pesan = "Tolong isi semua form!";
		}

		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../tambah_prodi.php';
			 	</script>";
	}	
	else{
		header('location: ../tambah_prodi.php');
	}
?>