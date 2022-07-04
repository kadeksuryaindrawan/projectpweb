<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_proposal = $_FILES['file_proposal']['type'];
        $nama_proposal = $_FILES['file_proposal']['name'];

        $tipe_laporan = $_FILES['file_laporan']['type'];
        $nama_laporan = $_FILES['file_laporan']['name'];
		if(!empty($judul_penelitian) && !empty($tahun_penelitian) && !empty($tempat_penelitian) && !empty($nip) && !empty($anggota) && !empty($dana) && !empty($sumber_dana) && is_numeric($id)){
            if($tahun_penelitian > 0){
                if($dana > 0){
                    if($nama_proposal == "" && $nama_laporan == ""){
                        $query_update = mysqli_query($connection, "UPDATE penelitian SET judul_penelitian = '$judul_penelitian', tahun_penelitian = '$tahun_penelitian', tempat_penelitian = '$tempat_penelitian', nip = '$nip', anggota = '$anggota', dana = $dana, sumber_dana = '$sumber_dana' WHERE id_penelitian = $id");
                        
                        if($query_update){
                            echo "	<script>
                                        alert('Penelitian sukses di edit!');
                                        location.href = '../penelitian.php';
                                    </script>";
                        }
                        else{
                            echo "	<script>
                                        alert('Penelitian gagal di edit!!');
                                        location.href = '../penelitian.php';
                                    </script>";
                        }
                    
                    }
                    elseif($nama_proposal != "" && $nama_laporan == ""){
                        if($tipe_proposal == "application/pdf"){
                            $query_check = mysqli_query($connection,"SELECT * FROM penelitian WHERE id_penelitian = $id");
                            $data = mysqli_fetch_assoc($query_check);
                            $proposal_lama = $data['file_proposal'];
                            $target_hapus = "../../../public/file/$proposal_lama";
                            unlink($target_hapus);
                            
                            $nama_proposal = "penelitian_proposal_".$nip."_".$id.".pdf";
                            $file_temp_proposal = $_FILES['file_proposal']['tmp_name'];
                            $folder    = "../../../public/file";
            
                            move_uploaded_file($file_temp_proposal, "$folder/$nama_proposal");
                            $query_update = mysqli_query($connection, "UPDATE penelitian SET judul_penelitian = '$judul_penelitian', tahun_penelitian = '$tahun_penelitian', tempat_penelitian = '$tempat_penelitian', nip = '$nip', anggota = '$anggota', dana = $dana, sumber_dana = '$sumber_dana', file_proposal = '$nama_proposal' WHERE id_penelitian = $id");
                            
                            if($query_update){
                                echo "	<script>
                                            alert('Penelitian sukses di edit!');
                                            location.href = '../penelitian.php';
                                        </script>";
                            }
                            else{
                                echo "	<script>
                                            alert('Penelitian gagal di edit!!');
                                            location.href = '../penelitian.php';
                                        </script>";
                            }
                        }
                        else{
                            $pesan = "File Bukan PDF!";
                        }
                    }
                    elseif($nama_laporan != "" && $nama_proposal == ""){
                        if($tipe_laporan == "application/pdf"){
                            $query_check = mysqli_query($connection,"SELECT * FROM penelitian WHERE id_penelitian = $id");
                            $data = mysqli_fetch_assoc($query_check);
                            $laporan_lama = $data['file_laporan'];
                            $target_hapus = "../../../public/file/$laporan_lama";
                            unlink($target_hapus);
                            
                            $nama_laporan = "penelitian_laporan_".$nip."_".$id.".pdf";
                            $file_temp_laporan = $_FILES['file_laporan']['tmp_name'];
                            $folder    = "../../../public/file";
            
                            move_uploaded_file($file_temp_laporan, "$folder/$nama_laporan");
                            $query_update = mysqli_query($connection, "UPDATE penelitian SET judul_penelitian = '$judul_penelitian', tahun_penelitian = '$tahun_penelitian', tempat_penelitian = '$tempat_penelitian', nip = '$nip', anggota = '$anggota', dana = $dana, sumber_dana = '$sumber_dana', file_laporan = '$nama_laporan' WHERE id_penelitian = $id");
                            
                            if($query_update){
                                echo "	<script>
                                            alert('Penelitian sukses di edit!');
                                            location.href = '../penelitian.php';
                                        </script>";
                            }
                            else{
                                echo "	<script>
                                            alert('Penelitian gagal di edit!!');
                                            location.href = '../penelitian.php';
                                        </script>";
                            }
                        }
                        else{
                            $pesan = "File Bukan PDF!";
                        }
                    }
                    else{
                        if($tipe_proposal == "application/pdf" && $tipe_laporan == "application/pdf"){
                            $query_check = mysqli_query($connection,"SELECT * FROM penelitian WHERE id_penelitian = $id");
                            $data = mysqli_fetch_assoc($query_check);
                            $proposal_lama = $data['file_proposal'];
                            $laporan_lama = $data['file_laporan'];
                            $target_hapus_proposal = "../../../public/file/$proposal_lama";
                            $target_hapus_laporan = "../../../public/file/$laporan_lama";
                            unlink($target_hapus_proposal);
                            unlink($target_hapus_laporan);
                            
                            $nama_proposal = "penelitian_proposal_".$nip."_".$id.".pdf";
                            $nama_laporan = "penelitian_laporan_".$nip."_".$id.".pdf";
                            $file_temp_proposal = $_FILES['file_proposal']['tmp_name'];
                            $file_temp_laporan = $_FILES['file_laporan']['tmp_name'];
                            $folder    = "../../../public/file";
                            
                            move_uploaded_file($file_temp_proposal, "$folder/$nama_proposal");
                            move_uploaded_file($file_temp_laporan, "$folder/$nama_laporan");
                            $query_update = mysqli_query($connection, "UPDATE penelitian SET judul_penelitian = '$judul_penelitian', tahun_penelitian = '$tahun_penelitian', tempat_penelitian = '$tempat_penelitian', nip = '$nip', anggota = '$anggota', dana = $dana, sumber_dana = '$sumber_dana', file_proposal = '$nama_proposal', file_laporan = '$nama_laporan' WHERE id_penelitian = $id");
                            
                            if($query_update){
                                echo "	<script>
                                            alert('Penelitian sukses di edit!');
                                            location.href = '../penelitian.php';
                                        </script>";
                            }
                            else{
                                echo "	<script>
                                            alert('Penelitian gagal di edit!!');
                                            location.href = '../penelitian.php';
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
                $pesan = "Tahun penelitian harus lebih dari 0!";
            }  
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_penelitian.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../penelitian.php');
	}
?>