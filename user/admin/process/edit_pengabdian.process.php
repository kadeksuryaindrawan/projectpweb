<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_proposal = $_FILES['file_proposal']['type'];
        $nama_proposal = $_FILES['file_proposal']['name'];

        $tipe_laporan = $_FILES['file_laporan']['type'];
        $nama_laporan = $_FILES['file_laporan']['name'];
		if(!empty($nama_pengabdian) && !empty($tgl_pengabdian) && !empty($tempat_pengabdian) && !empty($nip) && !empty($dana) && !empty($sumber_dana) && is_numeric($id)){
            if($dana > 0){
                if($nama_proposal == "" && $nama_laporan == ""){
                    $query_update = mysqli_query($connection, "UPDATE pengabdian SET nama_pengabdian = '$nama_pengabdian', tgl_pengabdian = '$tgl_pengabdian', tempat_pengabdian = '$tempat_pengabdian', nip = '$nip', dana = $dana, sumber_dana = '$sumber_dana' WHERE id_pengabdian = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('pengabdian sukses di edit!');
                                    location.href = '../pengabdian.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('pengabdian gagal di edit!!');
                                    location.href = '../pengabdian.php';
                                </script>";
                    }
                
                }
                elseif($nama_proposal != "" && $nama_laporan == ""){
                    if($tipe_proposal == "application/pdf"){
                        $query_check = mysqli_query($connection,"SELECT * FROM pengabdian WHERE id_pengabdian = $id");
                        $data = mysqli_fetch_assoc($query_check);
                        $proposal_lama = $data['file_proposal'];
                        $target_hapus = "../../../public/file/$proposal_lama";
                        unlink($target_hapus);
                        
                        $nama_proposal = "pengabdian_proposal_".$nip."_".$id.".pdf";
                        $file_temp_proposal = $_FILES['file_proposal']['tmp_name'];
                        $folder    = "../../../public/file";
        
                        move_uploaded_file($file_temp_proposal, "$folder/$nama_proposal");
                        $query_update = mysqli_query($connection, "UPDATE pengabdian SET nama_pengabdian = '$nama_pengabdian', tgl_pengabdian = '$tgl_pengabdian', tempat_pengabdian = '$tempat_pengabdian', nip = '$nip', dana = $dana, sumber_dana = '$sumber_dana', file_proposal = '$nama_proposal' WHERE id_pengabdian = $id");
                        
                        if($query_update){
                            echo "	<script>
                                        alert('Pengabdian sukses di edit!');
                                        location.href = '../pengabdian.php';
                                    </script>";
                        }
                        else{
                            echo "	<script>
                                        alert('Pengabdian gagal di edit!!');
                                        location.href = '../pengabdian.php';
                                    </script>";
                        }
                    }
                    else{
                        $pesan = "File Bukan PDF!";
                    }
                }
                elseif($nama_laporan != "" && $nama_proposal == ""){
                    if($tipe_laporan == "application/pdf"){
                        $query_check = mysqli_query($connection,"SELECT * FROM pengabdian WHERE id_pengabdian = $id");
                        $data = mysqli_fetch_assoc($query_check);
                        $laporan_lama = $data['file_laporan'];
                        $target_hapus = "../../../public/file/$laporan_lama";
                        unlink($target_hapus);
                        
                        $nama_laporan = "pengabdian_laporan_".$nip."_".$id.".pdf";
                        $file_temp_laporan = $_FILES['file_laporan']['tmp_name'];
                        $folder    = "../../../public/file";
        
                        move_uploaded_file($file_temp_laporan, "$folder/$nama_laporan");
                        $query_update = mysqli_query($connection, "UPDATE pengabdian SET nama_pengabdian = '$nama_pengabdian', tgl_pengabdian = '$tgl_pengabdian', tempat_pengabdian = '$tempat_pengabdian', nip = '$nip', dana = $dana, sumber_dana = '$sumber_dana', file_laporan = '$nama_laporan' WHERE id_pengabdian = $id");
                        
                        if($query_update){
                            echo "	<script>
                                        alert('Pengabdian sukses di edit!');
                                        location.href = '../pengabdian.php';
                                    </script>";
                        }
                        else{
                            echo "	<script>
                                        alert('Pengabdian gagal di edit!!');
                                        location.href = '../pengabdian.php';
                                    </script>";
                        }
                    }
                    else{
                        $pesan = "File Bukan PDF!";
                    }
                }
                else{
                    if($tipe_proposal == "application/pdf" && $tipe_laporan == "application/pdf"){
                        $query_check = mysqli_query($connection,"SELECT * FROM pengabdian WHERE id_pengabdian = $id");
                        $data = mysqli_fetch_assoc($query_check);
                        $proposal_lama = $data['file_proposal'];
                        $laporan_lama = $data['file_laporan'];
                        $target_hapus_proposal = "../../../public/file/$proposal_lama";
                        $target_hapus_laporan = "../../../public/file/$laporan_lama";
                        unlink($target_hapus_proposal);
                        unlink($target_hapus_laporan);
                        
                        $nama_proposal = "pengabdian_proposal_".$nip."_".$id.".pdf";
                        $nama_laporan = "pengabdian_laporan_".$nip."_".$id.".pdf";
                        $file_temp_proposal = $_FILES['file_proposal']['tmp_name'];
                        $file_temp_laporan = $_FILES['file_laporan']['tmp_name'];
                        $folder    = "../../../public/file";
                        
                        move_uploaded_file($file_temp_proposal, "$folder/$nama_proposal");
                        move_uploaded_file($file_temp_laporan, "$folder/$nama_laporan");
                        $query_update = mysqli_query($connection, "UPDATE pengabdian SET nama_pengabdian = '$nama_pengabdian', tgl_pengabdian = '$tgl_pengabdian', tempat_pengabdian = '$tempat_pengabdian', nip = '$nip', dana = $dana, sumber_dana = '$sumber_dana', file_proposal = '$nama_proposal', file_laporan = '$nama_laporan' WHERE id_pengabdian = $id");
                        
                        if($query_update){
                            echo "	<script>
                                        alert('Pengabdian sukses di edit!');
                                        location.href = '../pengabdian.php';
                                    </script>";
                        }
                        else{
                            echo "	<script>
                                        alert('Pengabdian gagal di edit!!');
                                        location.href = '../pengabdian.php';
                                    </script>";
                        }
                    }
                    else{
                        $pesan = "File Bukan PDF!";
                    }
                }
            }
            else{
                $pesan = "Dana harus lebih dari 0!";
            }      
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_pengabdian.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../pengabdian.php');
	}
?>