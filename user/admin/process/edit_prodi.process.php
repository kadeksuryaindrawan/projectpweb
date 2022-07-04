<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nama_prodi) && is_numeric($kode_prodi)){
                    $query_update = mysqli_query($connection, "UPDATE prodi SET nama_prodi = '$nama_prodi' WHERE kode_prodi = $kode_prodi");
                    if($query_update){
                        echo "	<script>
                                    alert('Nama Prodi sukses di edit!');
                                    location.href = '../prodi.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Nama Prodi gagal di edit!!');
                                    location.href = '../prodi.php';
                                </script>";
                    }
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_prodi.php?kode_prodi=$kode_prodi';
			 	</script>";
	}
	else{
		header('location: ../prodi.php');
	}
?>