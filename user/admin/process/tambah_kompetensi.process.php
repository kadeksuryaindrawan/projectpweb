<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_file = $_FILES['file_bukti']['type'];
        $nama_file = $_FILES['file_bukti']['name'];
		if(!empty($nip) && !empty($nomor_sertif) && !empty($nama_sertif) && !empty($tanggal_berlaku)){
			if($tipe_file == "application/pdf"){
                    $query_insert = mysqli_query($connection,"INSERT INTO kompetensi VALUES (NULL,$nomor_sertif,'$nip','$nama_sertif','$tanggal_berlaku',NULL)");
                    $query = mysqli_query($connection,"SELECT id FROM kompetensi ORDER BY id DESC LIMIT 1");
                    $data = mysqli_fetch_assoc($query);
                    $id = $data['id'];
                    $nama_baru = "kompetensi_".$nip."_".$data['id'].".pdf";
                    $file_temp = $_FILES['file_bukti']['tmp_name'];
                    $folder    = "../../../public/file";

                    move_uploaded_file($file_temp, "$folder/$nama_baru");

                    $query_update = mysqli_query($connection,"UPDATE kompetensi SET file_bukti='$nama_baru' WHERE id=$id");

                    if($query_update){
                        echo"
                            <script>
                                alert('Sukses Tambah Kompetensi!');
                                location.href = '../kompetensi.php';
                            </script>
                        ";
                    }
                    else{
                        echo"
                            <script>
                                alert('Gagal Tambah Kompetensi!');
                                location.href = '../tambah_kompetensi.php';
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
					location.href = '../tambah_kompetensi.php'
				</script>
			";
	}
	else{
		header('location: ../kompetensi.php');
	}

?>