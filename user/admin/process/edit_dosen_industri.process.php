<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nidk) && !empty($nama) && !empty($pendidikan_terakhir) && !empty($perusahaan) && !empty($bidang) && !empty($list_sertifikat) && !empty($list_matakuliah) && !empty($bobot_sks) && !empty($semester) && !empty($tahun) && is_numeric($id)){
                    $query_update = mysqli_query($connection, "UPDATE dosen_industri SET nidk = '$nidk', nama = '$nama', pendidikan_terakhir = '$pendidikan_terakhir', perusahaan = '$perusahaan', bidang = '$bidang', list_sertifikat = '$list_sertifikat', list_matakuliah = '$list_matakuliah', bobot_sks = $bobot_sks, semester = '$semester', tahun = '$tahun' WHERE id = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Dosen industri sukses di edit!');
                                    location.href = '../dosen_industri.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Dosen industri gagal di edit!!');
                                    location.href = '../dosen_industri.php';
                                </script>";
                    }
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_dosen_industri.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../dosen_industri.php');
	}
?>