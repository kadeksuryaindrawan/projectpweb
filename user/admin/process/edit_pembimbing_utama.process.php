<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nip) && !empty($kode_prodi) && !empty($jumlah_bimbingan) && !empty($tahun) && is_numeric($id)){
                    $query_update = mysqli_query($connection, "UPDATE pembimbing_utama SET nip = '$nip', kode_prodi = $kode_prodi, jumlah_bimbingan = $jumlah_bimbingan, tahun = '$tahun' WHERE id = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Pembimbing Utama sukses di edit!');
                                    location.href = '../pembimbing_utama.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Pembimbing Utama gagal di edit!!');
                                    location.href = '../pembimbing_utama.php';
                                </script>";
                    }
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_pembimbing_utama.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../pembimbing_utama.php');
	}
?>