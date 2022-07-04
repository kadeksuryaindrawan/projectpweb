<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($email) && !empty($nip) && !empty($nidn) && !empty($nama_dosen) && !empty($alamat) && !empty($telp) && is_numeric($user_id)){
                    $query_update_user = mysqli_query($connection, "UPDATE users SET email = '$email' WHERE user_id = $user_id");
                    $query_update_dosen = mysqli_query($connection, "UPDATE dosen SET nip = '$nip', nidn = '$nidn', nama_dosen = '$nama_dosen', alamat = '$alamat', no_telp = '$telp' WHERE user_id = $user_id");
                    if($query_update_user && $query_update_dosen){
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