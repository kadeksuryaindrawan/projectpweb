<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nama_jurnalindex) && is_numeric($id)){
                    $query_update = mysqli_query($connection, "UPDATE jurnal_index SET nama_jurnalindex = '$nama_jurnalindex' WHERE id_jurnalindex = $id");
                    if($query_update){
                        echo "	<script>
                                    alert('Jurnal index sukses di edit!');
                                    location.href = '../jurnal_index.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Jurnal index gagal di edit!!');
                                    location.href = '../jurnal_index.php';
                                </script>";
                    }
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_jurnalindex.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../jurnal_index.php');
	}
?>