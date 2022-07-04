<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_file = $_FILES['file_sertif']['type'];
        $nama_file = $_FILES['file_sertif']['name'];
		if(!empty($nim) && !empty($nama_event) && !empty($tahun_event) && !empty($peringkat) && !empty($tingkat) && !empty($type)){
			if($tipe_file == "application/pdf"){
                if($peringkat > 0){
                    $query_insert = mysqli_query($connection,"INSERT INTO prestasi_mhs VALUES (NULL,'$nim','$nama_event',$tahun_event,$peringkat,'$tingkat',NULL,'$type')");
                    $query = mysqli_query($connection,"SELECT id_prestasi FROM prestasi_mhs ORDER BY id_prestasi DESC LIMIT 1");
                    $data = mysqli_fetch_assoc($query);
                    $id_prestasi = $data['id_prestasi'];
                    $nama_baru = "prestasi_".$nim."_".$data['id_prestasi'].".pdf";
                    $file_temp = $_FILES['file_sertif']['tmp_name'];
                    $folder    = "../../../public/file";

                    move_uploaded_file($file_temp, "$folder/$nama_baru");

                    $query_update = mysqli_query($connection,"UPDATE prestasi_mhs SET file_sertif='$nama_baru' WHERE id_prestasi=$id_prestasi");

                    if($query_update){
                        echo"
                            <script>
                                alert('Sukses Tambah Prestasi!');
                                location.href = '../prestasi_mhs.php';
                            </script>
                        ";
                    }
                    else{
                        echo"
                            <script>
                                alert('Gagal Tambah Prestasi!');
                                location.href = '../tambah_prestasi.php';
                            </script>
                        ";
                    }
                }
                else{
                    $pesan = "Peringkat harus lebih dari 0 !";
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
					location.href = '../tambah_prestasi.php'
				</script>
			";
	}
	else{
		header('location: ../prestasi_mhs.php');
	}

?>