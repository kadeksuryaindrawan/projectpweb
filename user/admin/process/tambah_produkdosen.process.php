<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_file = $_FILES['file_bukti']['type'];
        $nama_file = $_FILES['file_bukti']['name'];
		if(!empty($nip) && !empty($nama_produk) && !empty($deskripsi)){
			if($tipe_file == "application/pdf"){
                    $query_insert = mysqli_query($connection,"INSERT INTO produk_dosen VALUES (NULL,'$nip','$nama_produk','$deskripsi',NULL)");
                    $query = mysqli_query($connection,"SELECT id FROM produk_dosen ORDER BY id DESC LIMIT 1");
                    $data = mysqli_fetch_assoc($query);
                    $id = $data['id'];
                    $nama_baru = "produk_dosen_".$nip."_".$data['id'].".pdf";
                    $file_temp = $_FILES['file_bukti']['tmp_name'];
                    $folder    = "../../../public/file";

                    move_uploaded_file($file_temp, "$folder/$nama_baru");

                    $query_update = mysqli_query($connection,"UPDATE produk_dosen SET file_bukti='$nama_baru' WHERE id=$id");

                    if($query_update){
                        echo"
                            <script>
                                alert('Sukses Tambah Produk Dosen!');
                                location.href = '../produk_dosen.php';
                            </script>
                        ";
                    }
                    else{
                        echo"
                            <script>
                                alert('Gagal Tambah Produk Dosen!');
                                location.href = '../tambah_produkdosen.php';
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
					location.href = '../tambah_produkdosen.php'
				</script>
			";
	}
	else{
		header('location: ../produk_dosen.php');
	}

?>