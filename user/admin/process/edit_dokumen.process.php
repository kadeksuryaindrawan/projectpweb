<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_file = $_FILES['file_pdf']['type'];
        $nama_file = $_FILES['file_pdf']['name'];
		if(!empty($tipe) && !empty($nama_dokumen) && !empty($tgl_dokumen) && is_numeric($id)){
            if($nama_file == ""){
                    $query_update = mysqli_query($connection, "UPDATE dokumen SET id_tipe = $tipe, nama_dokumen = '$nama_dokumen', tgl_dokumen = '$tgl_dokumen' WHERE id_dokumen = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Dokumen sukses di edit!');
                                    location.href = '../dokumen.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Dokumen gagal di edit!!');
                                    location.href = '../dokumen.php';
                                </script>";
                    }
                
            }
            else{
                if($tipe_file == "application/pdf"){
                    $query_check = mysqli_query($connection,"SELECT * FROM dokumen WHERE id_dokumen = $id");
                    $data = mysqli_fetch_assoc($query_check);
                    $file_lama = $data['file_pdf'];
                    $target_hapus = "../../../public/file/$file_lama";
                    unlink($target_hapus);
                    
                    $nama_baru = "dokumen_".$nama_dokumen."_".$id.".pdf";
                    $file_temp = $_FILES['file_pdf']['tmp_name'];
                    $folder    = "../../../public/file";
    
                    move_uploaded_file($file_temp, "$folder/$nama_baru");
                    $query_update = mysqli_query($connection, "UPDATE dokumen SET id_tipe = $tipe, nama_dokumen = '$nama_dokumen', tgl_dokumen = '$tgl_dokumen', file_pdf =  '$nama_baru' WHERE id_dokumen = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Dokumen sukses di edit!');
                                    location.href = '../dokumen.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Dokumen gagal di edit!!');
                                    location.href = '../dokumen.php';
                                </script>";
                    }
                }
                else{
                    $pesan = "File Bukan PDF!";
                }
            }
                    
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_dokumen.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../dokumen.php');
	}
?>