<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($id_jurnalindex) && !empty($nama_peringkatjurnal) && is_numeric($id)){
                    $query_update = mysqli_query($connection, "UPDATE peringkat_jurnal SET id_jurnalindex = $id_jurnalindex, nama_peringkatjurnal = '$nama_peringkatjurnal' WHERE id_peringkatjurnal = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Peringkat Jurnal sukses di edit!');
                                    location.href = '../peringkat_jurnal.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Peringkat Jurnal gagal di edit!!');
                                    location.href = '../peringkat_jurnal.php';
                                </script>";
                    }
                    
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_peringkatjurnal.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../peringkat_jurnal.php');
	}
?>