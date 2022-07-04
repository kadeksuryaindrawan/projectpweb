<?php  
	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nama_jurnalindex)){
					$query_check = mysqli_query($connection, "SELECT * FROM jurnal_index WHERE nama_jurnalindex = '$nama_jurnalindex'");
					if(mysqli_num_rows($query_check) == 0){
						$query_insert = mysqli_query($connection, "INSERT INTO jurnal_index VALUES (NULL, '$nama_jurnalindex')");
						if($query_insert){
								echo"
										<script>
											alert('Sukses Tambah Jurnal Index!');
											location.href = '../jurnal_index.php';
										</script>
									";
						}
						else{
							$pesan = "Gagal tambah jurnal index!";
						}
					}
					else{
						$pesan = "Jurnal index sudah ada sebelumnya, silahkan masukkan nama jurnal index yang berbeda!";
					}
		}
		else{
			$pesan = "Tolong Isikan Sesuatu!";
		}

		echo "
				<script>
					alert('$pesan');
					location.href = '../tambah_jurnalindex.php'
				</script>
			";
	}
	else{
		header('location: ../jurnal_index.php');
	}

?>