<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($email) && !empty($nim) && !empty($nama_mahasiswa) && !empty($alamat) && !empty($telp) && is_numeric($user_id)){
                    $query_update_user = mysqli_query($connection, "UPDATE users SET email = '$email' WHERE user_id = $user_id");
                    $query_update_mahasiswa = mysqli_query($connection, "UPDATE mahasiswa SET nim = '$nim', nama_mahasiswa = '$nama_mahasiswa', alamat = '$alamat', no_telp = '$telp' WHERE user_id = $user_id");
                    if($query_update_user && $query_update_mahasiswa){
                        echo "	<script>
                                    alert('Data diri sukses di edit!');
                                    location.href = '../dashboard.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Data diri Gagal di edit!');
                                    location.href = '../dashboard.php';
                                </script>";
                    }
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../dashboard.php';
			 	</script>";
	}
	else{
		header('location: ../dashboard.php');
	}
?>