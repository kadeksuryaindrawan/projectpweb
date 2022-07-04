<?php  
	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nama_tipe)){
					$query_check = mysqli_query($connection, "SELECT * FROM tipe_dokumen WHERE nama_tipe = '$nama_tipe'");
					if(mysqli_num_rows($query_check) == 0){
						$query_insert = mysqli_query($connection, "INSERT INTO tipe_dokumen VALUES (NULL, '$nama_tipe')");
						if($query_insert){
								echo"
										<script>
											alert('Sukses Tambah Tipe Dokumen!');
											location.href = '../tipe_dokumen.php';
										</script>
									";
						}
						else{
							$pesan = "Gagal tambah tipe!";
						}
					}
					else{
						$pesan = "Tipe sudah ada sebelumnya, silahkan masukkan nama tipe yang berbeda!";
					}
		}
		else{
			$pesan = "Tolong Isikan Sesuatu!";
		}

		echo "
				<script>
					alert('$pesan');
					location.href = '../tambah_tipe.php'
				</script>
			";
	}
	else{
		header('location: ../tipe_dokumen.php');
	}

?>