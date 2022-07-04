<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_file = $_FILES['file_jurnal']['type'];
        $nama_file = $_FILES['file_jurnal']['name'];
		if(!empty($nip) && !empty($judul_jurnal) && !empty($nama_jurnal) && !empty($id_jurnalindex) && !empty($peringkat_jurnal) && !empty($tgl_publish) && !empty($institusi_penerbit)){
			if($tipe_file == "application/pdf"){
                    $query_insert = mysqli_query($connection,"INSERT INTO publikasi_dosen VALUES (NULL,'$nip','$judul_jurnal','$nama_jurnal',$id_jurnalindex,'$peringkat_jurnal','$tgl_publish','$institusi_penerbit',NULL)");
                    $query = mysqli_query($connection,"SELECT id_publikasidosen FROM publikasi_dosen ORDER BY id_publikasidosen DESC LIMIT 1");
                    $data = mysqli_fetch_assoc($query);
                    $id_publikasidosen = $data['id_publikasidosen'];
                    $nama_baru = "publikasi_dosen_".$nip."_".$data['id_publikasidosen'].".pdf";
                    $file_temp = $_FILES['file_jurnal']['tmp_name'];
                    $folder    = "../../../public/file";

                    move_uploaded_file($file_temp, "$folder/$nama_baru");

                    $query_update = mysqli_query($connection,"UPDATE publikasi_dosen SET file_jurnal='$nama_baru' WHERE id_publikasidosen=$id_publikasidosen");

                    if($query_update){
                        echo"
                            <script>
                                alert('Sukses Tambah Publikasi Dosen!');
                                location.href = '../publikasi_dosen.php';
                            </script>
                        ";
                    }
                    else{
                        echo"
                            <script>
                                alert('Gagal Tambah Publikasi Dosen!');
                                location.href = '../tambah_publikasidosen.php';
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
					location.href = '../tambah_publikasidosen.php'
				</script>
			";
	}
	else{
		header('location: ../publikasi_dosen.php');
	}

?>