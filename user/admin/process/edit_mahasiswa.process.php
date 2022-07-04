<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($email) && !empty($nim_edit) && !empty($tahun_diterima) && !empty($nama_mahasiswa) && !empty($alamat) && !empty($telp) && !empty($prodi) && is_numeric($nim)){
                if($password == ""){
                    $query_update_user = mysqli_query($connection, "UPDATE users SET email = '$email' WHERE user_id = $user_id");
                    $query_update_mahasiswa = mysqli_query($connection, "UPDATE mahasiswa SET nim = '$nim_edit', nama_mahasiswa = '$nama_mahasiswa', alamat = '$alamat', no_telp = '$telp', tahun_diterima = $tahun_diterima, prodi = $prodi WHERE nim = '$nim'");
                    if($query_update_user && $query_update_mahasiswa){
                        echo "	<script>
                                    alert('Data mahasiswa sukses di edit!');
                                    location.href = '../mahasiswa.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Data mahasiswa Gagal di edit!');
                                    location.href = '../mahasiswa.php';
                                </script>";
                    }
                }
                else{
                    if($password == $repassword){
                        if(strlen($password) >= 7 ){
                            $encrypted_password = password_hash($password,PASSWORD_BCRYPT, ['cost' => 12]);
                            $query_update_user = mysqli_query($connection, "UPDATE users SET email = '$email', password = '$encrypted_password' WHERE user_id = $user_id");
                            $query_update_mahasiswa = mysqli_query($connection, "UPDATE mahasiswa SET nim = '$nim_edit', nama_mahasiswa = '$nama_mahasiswa', alamat = '$alamat', no_telp = '$telp', tahun_diterima = $tahun_diterima, prodi = $prodi WHERE nim = '$nim'");
                            if($query_update_user && $query_update_mahasiswa){
                                echo "	<script>
                                            alert('Data mahasiswa sukses di edit!');
                                            location.href = '../mahasiswa.php';
                                        </script>";
                            }
                            else{
                                echo "	<script>
                                            alert('Data mahasiswa Gagal di edit!');
                                            location.href = '../mahasiswa.php';
                                        </script>";
                            }
                        }
                        else{
                            $pesan = "Password setidaknya harus terdiri dari 7 kalimat atau lebih!";
                        }
                    }
                    else{
                        $pesan = "Password dan repassword harus sama!";
                    }
                }
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_mahasiswa.php?nim=$nim';
			 	</script>";
	}
	else{
		header('location: ../mahasiswa.php');
	}
?>