<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_proposal = $_FILES['file_proposal']['type'];
        $nama_proposal = $_FILES['file_proposal']['name'];

        $tipe_laporan = $_FILES['file_laporan']['type'];
        $nama_laporan = $_FILES['file_laporan']['name'];

		if(!empty($judul_penelitian) && !empty($tahun_penelitian) && !empty($tempat_penelitian) && !empty($nip) && !empty($anggota) && !empty($dana) && !empty($sumber_dana)){
            $query_check = mysqli_query($connection,"SELECT * FROM penelitian WHERE judul_penelitian = '$judul_penelitian'");
            if(mysqli_num_rows($query_check) == 0){
                if($tahun_penelitian > 0){
                    if($dana > 0){
                        if($tipe_proposal == "application/pdf" && $tipe_laporan == "application/pdf"){
    
                                $query_insert = mysqli_query($connection,"INSERT INTO penelitian VALUES (NULL,'$judul_penelitian','$tahun_penelitian','$tempat_penelitian','$nip','$anggota',$dana,'$sumber_dana',NULL,NULL,'belum terverifikasi',NULL)");
                                $query = mysqli_query($connection,"SELECT id_penelitian FROM penelitian ORDER BY id_penelitian DESC LIMIT 1");
                                $data = mysqli_fetch_assoc($query);
                                $id_penelitian = $data['id_penelitian'];
    
                                $nama_proposal = "penelitian_proposal_".$nip."_".$data['id_penelitian'].".pdf";
                                $nama_laporan = "penelitian_laporan_".$nip."_".$data['id_penelitian'].".pdf";
                                $file_temp_proposal = $_FILES['file_proposal']['tmp_name'];
                                $file_temp_laporan = $_FILES['file_laporan']['tmp_name'];
    
                                $folder    = "../../../public/file";
            
                                move_uploaded_file($file_temp_proposal, "$folder/$nama_proposal");
                                move_uploaded_file($file_temp_laporan, "$folder/$nama_laporan");
            
                                $query_update = mysqli_query($connection,"UPDATE penelitian SET file_proposal='$nama_proposal', file_laporan='$nama_laporan' WHERE id_penelitian=$id_penelitian");
            
                                if($query_update){
                                    echo"
                                        <script>
                                            alert('Sukses Tambah penelitian!');
                                            location.href = '../penelitian.php';
                                        </script>
                                    ";
                                }
                                else{
                                    echo"
                                        <script>
                                            alert('Gagal Tambah penelitian!');
                                            location.href = '../tambah_penelitian.php';
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
                    $pesan = "Tahun penelitian harus lebih dari 0!";
                }
            }
            else{
                $pesan = "Nama penelitian sudah ada sebelumnya, silahkan pakai nama lain!";
            }
			
		}
		else{
			$pesan = "Tolong Isi Semua Data";
		}

		echo "
				<script>
					alert('$pesan');
					location.href = '../tambah_penelitian.php'
				</script>
			";
	}
	else{
		header('location: ../penelitian.php');
	}

?>