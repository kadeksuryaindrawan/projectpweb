<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_proposal = $_FILES['file_proposal']['type'];
        $nama_proposal = $_FILES['file_proposal']['name'];

        $tipe_laporan = $_FILES['file_laporan']['type'];
        $nama_laporan = $_FILES['file_laporan']['name'];

		if(!empty($nama_pengabdian) && !empty($tgl_pengabdian) && !empty($tempat_pengabdian) && !empty($nip) && !empty($dana) && !empty($sumber_dana)){
            $query_check = mysqli_query($connection,"SELECT * FROM pengabdian WHERE nama_pengabdian = '$nama_pengabdian'");
            if(mysqli_num_rows($query_check) == 0){
                if($dana > 0){
                    if($tipe_proposal == "application/pdf" && $tipe_laporan == "application/pdf"){

                            $query_insert = mysqli_query($connection,"INSERT INTO pengabdian VALUES (NULL,'$nama_pengabdian','$tgl_pengabdian','$tempat_pengabdian','$nip',$dana,'$sumber_dana',NULL,NULL,'belum terverifikasi')");
                            $query = mysqli_query($connection,"SELECT id_pengabdian FROM pengabdian ORDER BY id_pengabdian DESC LIMIT 1");
                            $data = mysqli_fetch_assoc($query);
                            $id_pengabdian = $data['id_pengabdian'];

                            $nama_proposal = "pengabdian_proposal_".$nip."_".$data['id_pengabdian'].".pdf";
                            $nama_laporan = "pengabdian_laporan_".$nip."_".$data['id_pengabdian'].".pdf";
                            $file_temp_proposal = $_FILES['file_proposal']['tmp_name'];
                            $file_temp_laporan = $_FILES['file_laporan']['tmp_name'];

                            $folder    = "../../../public/file";
        
                            move_uploaded_file($file_temp_proposal, "$folder/$nama_proposal");
                            move_uploaded_file($file_temp_laporan, "$folder/$nama_laporan");
        
                            $query_update = mysqli_query($connection,"UPDATE pengabdian SET file_proposal='$nama_proposal', file_laporan='$nama_laporan' WHERE id_pengabdian=$id_pengabdian");
        
                            if($query_update){
                                echo"
                                    <script>
                                        alert('Sukses Tambah Pengabdian!');
                                        location.href = '../pengabdian.php';
                                    </script>
                                ";
                            }
                            else{
                                echo"
                                    <script>
                                        alert('Gagal Tambah Pengabdian!');
                                        location.href = '../tambah_pengabdian.php';
                                    </script>
                                ";
                            }
                    }
                    else{
                        $pesan = "File Bukan PDF!";
                    }
                }
                else{
                    $pesan = "Dana harus lebih dari 0!";
                }
                
            }
            else{
                $pesan = "Nama pengabdian sudah ada sebelumnya, silahkan pakai nama lain!";
            }
			
		}
		else{
			$pesan = "Tolong Isi Semua Data";
		}

		echo "
				<script>
					alert('$pesan');
					location.href = '../tambah_pengabdian.php'
				</script>
			";
	}
	else{
		header('location: ../pengabdian.php');
	}

?>