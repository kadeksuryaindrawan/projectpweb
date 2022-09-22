<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nip) && !empty($nama_matakuliah) && !empty($semester) && !empty($tahun_akademik) && !empty($kode_prodi) && is_numeric($id)){
                    $query_update = mysqli_query($connection, "UPDATE mengajar SET nip = '$nip', nama_matakuliah = '$nama_matakuliah', semester = '$semester', tahun_akademik = '$tahun_akademik', kode_prodi = $kode_prodi WHERE id = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Mengajar sukses di edit!');
                                    location.href = '../mengajar.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Mengajar gagal di edit!!');
                                    location.href = '../mengajar.php';
                                </script>";
                    }
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_mengajar.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../mengajar.php');
	}
?>