<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nama_tipe) && is_numeric($id)){
                    $query_update = mysqli_query($connection, "UPDATE tipe_dokumen SET nama_tipe = '$nama_tipe' WHERE id_tipe = $id");
                    if($query_update){
                        echo "	<script>
                                    alert('Tipe Dokumen sukses di edit!');
                                    location.href = '../tipe_dokumen.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Tipe Dokumen gagal di edit!!');
                                    location.href = '../tipe_dokumen.php';
                                </script>";
                    }
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_tipe.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../tipe_dokumen.php');
	}
?>