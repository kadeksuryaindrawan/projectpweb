<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_file = $_FILES['file_bukti']['type'];
        $nama_file = $_FILES['file_bukti']['name'];
		if(!empty($nomor_sertif) && !empty($nip) && !empty($nama_sertif) && !empty($tanggal_berlaku) && is_numeric($id)){
            if($nama_file == ""){
                    $query_update = mysqli_query($connection, "UPDATE kompetensi SET nomor_sertif = $nomor_sertif, nip = '$nip', nama_sertif = '$nama_sertif', tanggal_berlaku = '$tanggal_berlaku' WHERE id = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Kompetensi sukses di edit!');
                                    location.href = '../kompetensi.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Kompetensi gagal di edit!!');
                                    location.href = '../kompetensi.php';
                                </script>";
                    }
                
            }
            else if($nama_file != ""){
                if($tipe_file == "application/pdf"){
                    $query_check = mysqli_query($connection,"SELECT * FROM kompetensi WHERE id = $id");
                    $data = mysqli_fetch_assoc($query_check);
                    $file_lama = $data['file_bukti'];
                    $target_hapus = "../../../public/file/$file_lama";
                    unlink($target_hapus);
                    
                    $nama_baru = "kompetensi_".$nip."_".$id.".pdf";
                    $file_temp = $_FILES['file_bukti']['tmp_name'];
                    $folder    = "../../../public/file";
    
                    move_uploaded_file($file_temp, "$folder/$nama_baru");
                    $query_update = mysqli_query($connection, "UPDATE kompetensi SET nomor_sertif = $nomor_sertif, nip = '$nip', nama_sertif = '$nama_sertif', tanggal_berlaku = '$tanggal_berlaku', file_bukti = '$nama_baru' WHERE id = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Kompetensi sukses di edit!');
                                    location.href = '../kompetensi.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Kompetensi gagal di edit!!');
                                    location.href = '../kompetensi.php';
                                </script>";
                    }
                }
                else{
                    $pesan = "File Bukan PDF!";
                }
            }
            else{
                echo "	<script>
                            alert('Kompetensi gagal di edit!!');
                            location.href = '../kompetensi.php';
                        </script>";
            }
                    
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_kompetensi.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../kompetensi.php');
	}
?>