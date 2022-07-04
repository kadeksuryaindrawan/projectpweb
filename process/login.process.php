<?php
	require_once "../config/connection.php";
	session_start();

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password)){
			$query_check = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");

			if(mysqli_num_rows($query_check) == 1){
					$data_user = mysqli_fetch_assoc($query_check);
					$encrypted_password = $data_user['password'];

					if(password_verify($password,$encrypted_password)){
						$level = $data_user['level'];

						if($level == 'admin'){
							$_SESSION['user_login']['email'] = $data_user['email'];
							$_SESSION['user_login']['admin_id'] = $data_user['user_id'];

							echo"
									<script>
										alert('Login Sukses');
										location.href = '../user/admin/dashboard.php';
									</script>
								";
						}
						else if($level == 'dosen'){
							$_SESSION['user_login']['email'] = $data_user['email'];
							$_SESSION['user_login']['dosen_id'] = $data_user['user_id'];

							echo"

									<script>
										alert('Login Sukses');
										location.href = '../user/dosen/dashboard.php';
									</script>
								";
						}

                        else if($level == 'mahasiswa'){
							$_SESSION['user_login']['email'] = $data_user['email'];
							$_SESSION['user_login']['mahasiswa_id'] = $data_user['user_id'];

							echo"

									<script>
										alert('Login Sukses');
										location.href = '../user/mahasiswa/dashboard.php';
									</script>
								";
						}
						else if($level == 'guest'){
							$_SESSION['user_login']['email'] = $data_user['email'];
							$_SESSION['user_login']['guest_id'] = $data_user['user_id'];

							echo"

									<script>
										alert('Login Sukses');
										location.href = '../user/guest/dashboard.php';
									</script>
								";
						}
						else{
							$pesan = "Gagal login!";
						}
					}
					else{
						$pesan = "Email / Password Salah!";
					}
				
			}
			else{
				$pesan = "Email / Password tidak terdaftar!";
			}
		}
		else{
			$pesan = "Isikan sesuatu!";
		}

		echo "
				<script>
					alert('$pesan');
					location.href = '../index.php'
				</script>
			";

	}
	else{
		header("location: ../index.php");
	}

?>