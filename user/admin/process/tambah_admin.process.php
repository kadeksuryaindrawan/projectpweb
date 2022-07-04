<?php  
	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		if(!empty($email) && !empty($password) && !empty($repassword)){
			if($password == $repassword){
				if(strlen($password) >= 7 ){
					$query_check = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");
					if(mysqli_num_rows($query_check) == 0){
						$encrypted_password = password_hash($password,PASSWORD_BCRYPT, ['cost' => 12]);
						$query_insert = mysqli_query($connection, "INSERT INTO users VALUES (NULL, '$email', '$encrypted_password', 'admin')");
						if($query_insert){
								echo"
										<script>
											alert('Sukses Tambah Admin');
											location.href = '../tambah_admin.php';
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
					location.href = '../tambah_admin.php'
				</script>
			";
	}
	else{
		header('location: ../admin.php');
	}

?>