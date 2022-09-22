<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nama_jabatan) && is_numeric($id)){
                    $query_update = mysqli_query($connection, "UPDATE jabatan SET nama_jabatan = '$nama_jabatan' WHERE id = $id");
                    if($query_update){
                        echo "	<script>
                                    alert('Jabatan sukses di edit!');
                                    location.href = '../jabatan.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Jabatan gagal di edit!!');
                                    location.href = '../jabatan.php';
                                </script>";
                    }
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_jabatan.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../jabatan.php');
	}
?>