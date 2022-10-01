<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_file = $_FILES['file_sertif']['type'];
        $nama_file = $_FILES['file_sertif']['name'];
		if(!empty($nip) && !empty($judul_haki) && !empty($tgl_terdaftar) && !empty($no_haki) && !empty($anggota) && !empty($jenis)){
			if($tipe_file == "application/pdf"){
                if($no_haki > 0){
                    $query_insert = mysqli_query($connection,"INSERT INTO haki_dosen VALUES (NULL,'$nip','$judul_haki','$tgl_terdaftar',$no_haki,NULL,'$anggota','$jenis')");
                    $query = mysqli_query($connection,"SELECT id_hakidosen FROM haki_dosen ORDER BY id_hakidosen DESC LIMIT 1");
                    $data = mysqli_fetch_assoc($query);
                    $id_hakidosen = $data['id_hakidosen'];
                    $nama_baru = "haki_dosen_".$nip."_".$data['id_hakidosen'].".pdf";
                    $file_temp = $_FILES['file_sertif']['tmp_name'];
                    $folder    = "../../../public/file";

                    move_uploaded_file($file_temp, "$folder/$nama_baru");

                    $query_update = mysqli_query($connection,"UPDATE haki_dosen SET file_sertif='$nama_baru' WHERE id_hakidosen=$id_hakidosen");

                    if($query_update){
                        echo"
                            <script>
                                alert('Sukses Tambah Haki!');
                                location.href = '../haki_dosen.php';
                            </script>
                        ";
                    }
                    else{
                        echo"
                            <script>
                                alert('Gagal Tambah Haki!');
                                location.href = '../tambah_hakidosen.php';
                            </script>
                        ";
                    }
                }
                else{
                    $pesan = "No Haki harus lebih dari 0 !";
                }
            }
            else{
                $pesan = "File Bukan PDF!";
            }
		}
		else{
			$pesan = "Tolong Isi Semua Data";
		}

		echo "
				<script>
					alert('$pesan');
					location.href = '../tambah_hakidosen.php'
				</script>
			";
	}
	else{
		header('location: ../haki_dosen.php');
	}

?>