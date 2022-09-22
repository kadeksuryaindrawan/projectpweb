<?php  
	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nama_jabatan)){
					$query_check = mysqli_query($connection, "SELECT * FROM jabatan WHERE nama_jabatan = '$nama_jabatan'");
					if(mysqli_num_rows($query_check) == 0){
						$query_insert = mysqli_query($connection, "INSERT INTO jabatan VALUES(NULL, '$nama_jabatan')");
						if($query_insert){
								echo"
										<script>
											alert('Sukses Tambah Jabatan!');
											location.href = '../jabatan.php';
										</script>
									";
						}
						else{
							$pesan = "Gagal tambah jabatan!";
						}
					}
					else{
						$pesan = "Jabatan sudah ada sebelumnya, silahkan masukkan nama jabatan yang berbeda!";
					}
		}
		else{
			$pesan = "Tolong Isikan Sesuatu!";
		}

		echo "
				<script>
					alert('$pesan');
					location.href = '../tambah_jabatan.php'
				</script>
			";
	}
	else{
		header('location: ../jabatan.php');
	}

?>