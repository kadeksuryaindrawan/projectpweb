<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_file = $_FILES['file_sk']['type'];
        $nama_file = $_FILES['file_sk']['name'];
		if(!empty($nip) && !empty($rekognisi) && !empty($tingkat) && !empty($tahun)){
			if($tipe_file == "application/pdf"){
                    $query_insert = mysqli_query($connection,"INSERT INTO rekognisi VALUES (NULL,'$nip','$rekognisi','$tingkat','$tahun',NULL)");
                    $query = mysqli_query($connection,"SELECT id FROM rekognisi ORDER BY id DESC LIMIT 1");
                    $data = mysqli_fetch_assoc($query);
                    $id = $data['id'];
                    $nama_baru = "rekognisi_".$nip."_".$data['id'].".pdf";
                    $file_temp = $_FILES['file_sk']['tmp_name'];
                    $folder    = "../../../public/file";

                    move_uploaded_file($file_temp, "$folder/$nama_baru");

                    $query_update = mysqli_query($connection,"UPDATE rekognisi SET file_sk='$nama_baru' WHERE id=$id");

                    if($query_update){
                        echo"
                            <script>
                                alert('Sukses Tambah Rekognisi!');
                                location.href = '../rekognisi.php';
                            </script>
                        ";
                    }
                    else{
                        echo"
                            <script>
                                alert('Gagal Tambah Rekognisi!');
                                location.href = '../tambah_rekognisi.php';
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
					location.href = '../tambah_rekognisi.php'
				</script>
			";
	}
	else{
		header('location: ../rekognisi.php');
	}

?>