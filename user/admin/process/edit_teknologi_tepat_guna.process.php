<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nip) && !empty($judul) && !empty($deskripsi) && !empty($tahun) && is_numeric($id)){
                    $query_update = mysqli_query($connection, "UPDATE teknologi_tepat_guna SET nip = '$nip', judul = '$judul', deskripsi = '$deskripsi', tahun = '$tahun' WHERE id = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Teknologi Tepat Guna sukses di edit!');
                                    location.href = '../teknologi_tepat_guna.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Teknologi Tepat Guna gagal di edit!!');
                                    location.href = '../teknologi_tepat_guna.php';
                                </script>";
                    }
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_teknologi_tepat_guna.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../teknologi_tepat_guna.php');
	}
?>