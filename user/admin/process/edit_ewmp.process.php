<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nip) && !empty($tahun) && is_numeric($id)){
                    $query_update = mysqli_query($connection, "UPDATE ewmp SET nip = '$nip', tahun = '$tahun', pendidikan_prodi = $pendidikan_prodi, pendidikan_prodi_lain = $pendidikan_prodi_lain, pendidikan_pt_luar = $pendidikan_pt_luar, penelitian = $penelitian, pkm = $pkm, penunjang = $penunjang WHERE id = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('EWMP sukses di edit!');
                                    location.href = '../ewmp.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('EWMP gagal di edit!!');
                                    location.href = '../ewmp.php';
                                </script>";
                    }
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_ewmp.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../ewmp.php');
	}
?>