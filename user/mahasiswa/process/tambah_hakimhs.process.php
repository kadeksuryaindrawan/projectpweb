<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_file = $_FILES['file_sertif']['type'];
        $nama_file = $_FILES['file_sertif']['name'];
		if(!empty($nim) && !empty($judul_haki) && !empty($tgl_terdaftar) && !empty($no_haki) && !empty($anggota)){
			if($tipe_file == "application/pdf"){
                if($no_haki > 0){
                    $query_insert = mysqli_query($connection,"INSERT INTO haki_mahasiswa VALUES (NULL,'$nim','$judul_haki','$tgl_terdaftar',$no_haki,NULL,'$anggota')");
                    $query = mysqli_query($connection,"SELECT id_hakimhs FROM haki_mahasiswa ORDER BY id_hakimhs DESC LIMIT 1");
                    $data = mysqli_fetch_assoc($query);
                    $id_hakimhs = $data['id_hakimhs'];
                    $nama_baru = "haki_mhs_".$nim."_".$data['id_hakimhs'].".pdf";
                    $file_temp = $_FILES['file_sertif']['tmp_name'];
                    $folder    = "../../../public/file";

                    move_uploaded_file($file_temp, "$folder/$nama_baru");

                    $query_update = mysqli_query($connection,"UPDATE haki_mahasiswa SET file_sertif='$nama_baru' WHERE id_hakimhs=$id_hakimhs");

                    if($query_update){
                        echo"
                            <script>
                                alert('Sukses Tambah Haki!');
                                location.href = '../haki_mhs.php';
                            </script>
                        ";
                    }
                    else{
                        echo"
                            <script>
                                alert('Gagal Tambah Haki!');
                                location.href = '../tambah_hakimhs.php';
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
					location.href = '../tambah_hakimhs.php'
				</script>
			";
	}
	else{
		header('location: ../haki_mhs.php');
	}

?>