<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_file = $_FILES['file_jurnal']['type'];
        $nama_file = $_FILES['file_jurnal']['name'];
		if(!empty($nim) && !empty($judul_jurnal) && !empty($nama_jurnal) && !empty($tgl_publish) && !empty($institusi_penerbit) && is_numeric($id)){
            if($nama_file == "" && $id_jurnalindex == "" && $peringkat_jurnal == ""){
                    $query_update = mysqli_query($connection, "UPDATE publikasi_mhs SET nim = '$nim', judul_jurnal = '$judul_jurnal', nama_jurnal = '$nama_jurnal', tgl_publish = '$tgl_publish', institusi_penerbit = '$institusi_penerbit' WHERE id_publikasimhs = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Publikasi Mahasiswa sukses di edit!');
                                    location.href = '../publikasi_mhs.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Publikasi Mahasiswa gagal di edit!!');
                                    location.href = '../publikasi_mhs.php';
                                </script>";
                    }
                
            }
            else if($nama_file != "" && $id_jurnalindex == "" && $peringkat_jurnal == ""){
                if($tipe_file == "application/pdf"){
                    $query_check = mysqli_query($connection,"SELECT * FROM publikasi_mhs WHERE id_publikasimhs = $id");
                    $data = mysqli_fetch_assoc($query_check);
                    $file_lama = $data['file_jurnal'];
                    $target_hapus = "../../../public/file/$file_lama";
                    unlink($target_hapus);
                    
                    $nama_baru = "publikasi_mhs_".$nim."_".$id.".pdf";
                    $file_temp = $_FILES['file_jurnal']['tmp_name'];
                    $folder    = "../../../public/file";
    
                    move_uploaded_file($file_temp, "$folder/$nama_baru");
                    $query_update = mysqli_query($connection, "UPDATE publikasi_mhs SET nim = '$nim', judul_jurnal = '$judul_jurnal', nama_jurnal = '$nama_jurnal', tgl_publish = '$tgl_publish', institusi_penerbit = '$institusi_penerbit', file_jurnal = '$nama_baru' WHERE id_publikasimhs = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Publikasi Mahasiswa sukses di edit!');
                                    location.href = '../publikasi_mhs.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Publikasi Mahasiswa gagal di edit!!');
                                    location.href = '../publikasi_mhs.php';
                                </script>";
                    }
                }
                else{
                    $pesan = "File Bukan PDF!";
                }
            }

            else if($nama_file == "" && $id_jurnalindex != "" && $peringkat_jurnal != ""){
                $query_update = mysqli_query($connection, "UPDATE publikasi_mhs SET nim = '$nim', judul_jurnal = '$judul_jurnal', nama_jurnal = '$nama_jurnal',id_jurnalindex = $id_jurnalindex, peringkat_jurnal = '$peringkat_jurnal', tgl_publish = '$tgl_publish', institusi_penerbit = '$institusi_penerbit' WHERE id_publikasimhs = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Publikasi Mahasiswa sukses di edit!');
                                    location.href = '../publikasi_mhs.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Publikasi Mahasiswa gagal di edit!!');
                                    location.href = '../publikasi_mhs.php';
                                </script>";
                    }
            }

            else if($nama_file != "" && $id_jurnalindex != "" && $peringkat_jurnal != ""){
                if($tipe_file == "application/pdf"){
                    $query_check = mysqli_query($connection,"SELECT * FROM publikasi_mhs WHERE id_publikasimhs = $id");
                    $data = mysqli_fetch_assoc($query_check);
                    $file_lama = $data['file_jurnal'];
                    $target_hapus = "../../../public/file/$file_lama";
                    unlink($target_hapus);
                    
                    $nama_baru = "publikasi_mhs_".$nim."_".$id.".pdf";
                    $file_temp = $_FILES['file_jurnal']['tmp_name'];
                    $folder    = "../../../public/file";
    
                    move_uploaded_file($file_temp, "$folder/$nama_baru");
                    $query_update = mysqli_query($connection, "UPDATE publikasi_mhs SET nim = '$nim', judul_jurnal = '$judul_jurnal', nama_jurnal = '$nama_jurnal',id_jurnalindex = $id_jurnalindex, peringkat_jurnal = '$peringkat_jurnal', tgl_publish = '$tgl_publish', institusi_penerbit = '$institusi_penerbit', file_jurnal = '$nama_baru' WHERE id_publikasimhs = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Publikasi Mahasiswa sukses di edit!');
                                    location.href = '../publikasi_mhs.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Publikasi Mahasiswa gagal di edit!!');
                                    location.href = '../publikasi_mhs.php';
                                </script>";
                    }
                }
                else{
                    $pesan = "File Bukan PDF!";
                }
            }
            else{
                echo "	<script>
                            alert('Publikasi Mahasiswa gagal di edit!!');
                            location.href = '../publikasi_mhs.php';
                        </script>";
            }
                    
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_publikasimhs.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../publikasi_mhs.php');
	}
?>