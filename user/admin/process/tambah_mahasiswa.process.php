<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);

		if(!empty($email) && !empty($password) && !empty($repassword) && !empty($nim) && !empty($tahun_diterima) && !empty($nama_mahasiswa) && !empty($alamat) && !empty($telp) && !empty($prodi)){
			if($password == $repassword){
				if(strlen($password) >= 7 ){
					$query_check = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");
					if(mysqli_num_rows($query_check) == 0){
						$encrypted_password = password_hash($password,PASSWORD_BCRYPT, ['cost' => 12]);
						$query_insert = mysqli_query($connection, "INSERT INTO users VALUES (NULL, '$email', '$encrypted_password', 'mahasiswa')");
                        $query_check2 = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");
                        $data_mahasiswa = mysqli_fetch_assoc($query_check2);
                        $user_id = $data_mahasiswa['user_id'];

                        $query_insert2 = mysqli_query($connection, "INSERT INTO mahasiswa VALUES ('$nim','$nama_mahasiswa','$alamat','$telp', $tahun_diterima, $user_id, $prodi)");
						if($query_insert && $query_insert2){
								echo"
										<script>
											alert('Sukses Tambah Mahasiswa!');
											location.href = '../tambah_mahasiswa.php';
										</script>
									";
						}
						else{
							$pesan = "Gagal daftar!";
						}
					}
					else{
						$pesan = "Email sudah terdaftar sebelumnya! Silahkan ulangi mendaftar";
					}
				}
				else{
					$pesan = "Password setidaknya harus terdiri dari 7 karakter / lebih!";
				}
			}
			else{
				$pesan = "Password tidak boleh berbeda!";
			}
		}
		else{
			$pesan = "Tolong Isikan Sesuatu!";
		}

		echo "
				<script>
					alert('$pesan');
					location.href = '../tambah_mahasiswa.php'
				</script>
			";
	}
	else{
		header('location: ../mahasiswa.php');
	}

?>