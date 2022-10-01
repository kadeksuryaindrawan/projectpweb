<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($email) && !empty($nip_edit) && !empty($nidn) && !empty($nama_dosen) && !empty($alamat) && !empty($telp) && !empty($prodi) && !empty($pendidikan_terakhir) && !empty($bidang_keahlian) && !empty($DTPS) && !empty($jabatan_akademik) && !empty($nomor_serdos) && !empty($kesesuaian_bidang) && !empty($status_dosen) && is_numeric($nip)){
                if($password == ""){
                    $query_update_user = mysqli_query($connection, "UPDATE users SET email = '$email' WHERE user_id = $user_id");
                    $query_update_dosen = mysqli_query($connection, "UPDATE dosen SET nip = '$nip_edit', nidn = '$nidn', nama_dosen = '$nama_dosen', alamat = '$alamat', no_telp = '$telp', prodi = $prodi, pendidikan_terakhir = '$pendidikan_terakhir', bidang_keahlian = '$bidang_keahlian', DTPS = '$DTPS', jabatan_akademik = $jabatan_akademik, nomor_serdos = '$nomor_serdos', kesesuaian_bidang = '$kesesuaian_bidang', status_dosen = '$status_dosen' WHERE nip = '$nip'");
                    if($query_update_user && $query_update_dosen){
                        echo "	<script>
                                    alert('Data dosen sukses di edit!');
                                    location.href = '../dosen_tidak_tetap.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Data dosen Gagal di edit!');
                                    location.href = '../dosen_tidak_tetap.php';
                                </script>";
                    }
                }
                else{
                    if($password == $repassword){
                        if(strlen($password) >= 7 ){
                            $encrypted_password = password_hash($password,PASSWORD_BCRYPT, ['cost' => 12]);
                            $query_update_user = mysqli_query($connection, "UPDATE users SET email = '$email', password = '$encrypted_password' WHERE user_id = $user_id");
                            $query_update_dosen = mysqli_query($connection, "UPDATE dosen SET nip = '$nip_edit', nidn = '$nidn', nama_dosen = '$nama_dosen', alamat = '$alamat', no_telp = '$telp', prodi = $prodi, pendidikan_terakhir = '$pendidikan_terakhir', bidang_keahlian = '$bidang_keahlian', DTPS = '$DTPS', jabatan_akademik = $jabatan_akademik, nomor_serdos = '$nomor_serdos', kesesuaian_bidang = '$kesesuaian_bidang', status_dosen = '$status_dosen' WHERE nip = '$nip'");
                            if($query_update_user && $query_update_dosen){
                                echo "	<script>
                                            alert('Data dosen sukses di edit!');
                                            location.href = '../dosen_tidak_tetap.php';
                                        </script>";
                            }
                            else{
                                echo "	<script>
                                            alert('Data dosen Gagal di edit!');
                                            location.href = '../dosen_tidak_tetap.php';
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
			 		location.href = '../edit_dosen_tidak_tetap.php?nip=$nip';
			 	</script>";
	}
	else{
		header('location: ../dosen_tidak_tetap.php');
	}
?>