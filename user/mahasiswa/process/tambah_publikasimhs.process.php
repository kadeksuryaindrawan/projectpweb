<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_file = $_FILES['file_jurnal']['type'];
        $nama_file = $_FILES['file_jurnal']['name'];
		if(!empty($nim) && !empty($judul_jurnal) && !empty($nama_jurnal) && !empty($id_jurnalindex) && !empty($peringkat_jurnal) && !empty($tgl_publish) && !empty($institusi_penerbit)){
			if($tipe_file == "application/pdf"){
                    $query_insert = mysqli_query($connection,"INSERT INTO publikasi_mhs VALUES (NULL,'$nim','$judul_jurnal','$nama_jurnal',$id_jurnalindex,'$peringkat_jurnal','$tgl_publish','$institusi_penerbit',NULL)");
                    $query = mysqli_query($connection,"SELECT id_publikasimhs FROM publikasi_mhs ORDER BY id_publikasimhs DESC LIMIT 1");
                    $data = mysqli_fetch_assoc($query);
                    $id_publikasimhs = $data['id_publikasimhs'];
                    $nama_baru = "publikasi_mhs_".$nim."_".$data['id_publikasimhs'].".pdf";
                    $file_temp = $_FILES['file_jurnal']['tmp_name'];
                    $folder    = "../../../public/file";

                    move_uploaded_file($file_temp, "$folder/$nama_baru");

                    $query_update = mysqli_query($connection,"UPDATE publikasi_mhs SET file_jurnal='$nama_baru' WHERE id_publikasimhs=$id_publikasimhs");

                    if($query_update){
                        echo"
                            <script>
                                alert('Sukses Tambah Publikasi Mahasiswa!');
                                location.href = '../publikasi_mhs.php';
                            </script>
                        ";
                    }
                    else{
                        echo"
                            <script>
                                alert('Gagal Tambah Publikasi Mahasiswa!');
                                location.href = '../tambah_publikasimhs.php';
                            </script>
                        ";
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
					location.href = '../tambah_publikasimhs.php'
				</script>
			";
	}
	else{
		header('location: ../publikasi_mhs.php');
	}

?>