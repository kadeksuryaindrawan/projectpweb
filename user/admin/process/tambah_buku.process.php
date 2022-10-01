<?php  
	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nip) && !empty($penulis_buku) && !empty($judul_buku) && !empty($penerbit) && !empty($tahun_terbit) && !empty($isbn)){
            if($tahun_terbit > 0){
                $query_check = mysqli_query($connection, "SELECT * FROM publikasi_buku WHERE judul_buku = '$judul_buku'");
					if(mysqli_num_rows($query_check) == 0){
						$query_insert = mysqli_query($connection, "INSERT INTO publikasi_buku VALUES (NULL, '$nip','$penulis_buku', '$judul_buku', '$penerbit', $tahun_terbit,'terverifikasi', '$isbn')");
						if($query_insert){
								echo"
										<script>
											alert('Sukses Tambah Buku!');
											location.href = '../buku.php';
										</script>
									";
						}
						else{
							$pesan = "Gagal tambah buku!";
						}
					}
					else{
						$pesan = "Judul buku sudah ada sebelumnya, silahkan masukkan judul yang berbeda!";
					}
            }
            else{
                $pesan = "Tahun terbit harus lebih dari 0!";
            }
					
		}
		else{
			$pesan = "Tolong Isikan Sesuatu!";
		}

		echo "
				<script>
					alert('$pesan');
					location.href = '../tambah_buku.php'
				</script>
			";
	}
	else{
		header('location: ../buku.php');
	}

?>