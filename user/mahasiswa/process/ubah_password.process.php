<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($password_lama) && !empty($password_baru) && !empty($password_baru2) && is_numeric($user_id)){
            $query_check = mysqli_query($connection, "SELECT * FROM users WHERE user_id = $user_id");
            $data = mysqli_fetch_assoc($query_check);
            $old_pw = $data['password'];

            if(password_verify($password_lama,$old_pw)){
                if($password_baru == $password_baru2){
                    if(strlen($password_baru) >= 7 ){
                            $encrypted_password = password_hash($password_baru,PASSWORD_BCRYPT, ['cost' => 12]);
                            $query_update = mysqli_query($connection, "UPDATE users SET password = '$encrypted_password' WHERE user_id = $user_id");
                            if($query_update){
                                echo "	<script>
                                            alert('Password Sukses Diubah!');
                                            location.href = '../dashboard.php';
                                        </script>";
                            }
                            else{
                                echo "	<script>
                                            alert('Password Gagal Diubah!');
                                            location.href = '../dashboard.php';
                                        </script>";
                            }
                    }
                    else{
                        $pesan = "Password setidaknya harus terdiri dari 7 karakter / lebih!";
                    }
                }
                else{
                    $pesan = "Password Baru dan Ulang Password Baru Tidak Boleh Berbeda!";
                }
            }
            else{
                $pesan = "Password Lama Salah!";
            }
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../ubah_password.php';
			 	</script>";
	}
	else{
		header('location: ../dashboard.php');
	}
?>