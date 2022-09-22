<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nip) && !empty($nama_matakuliah) && !empty($semester) && !empty($tahun_akademik) && !empty($kode_prodi)){
                    $query_insert = mysqli_query($connection,"INSERT INTO mengajar VALUES (NULL,'$nip','$nama_matakuliah','$semester','$tahun_akademik',$kode_prodi)");

                    if($query_insert){
                        echo"
                            <script>
                                alert('Sukses Tambah Mengajar!');
                                location.href = '../mengajar.php';
                            </script>
                        ";
                    }
                    else{
                        echo"
                            <script>
                                alert('Gagal Tambah Mengajar!');
                                location.href = '../tambah_mengajar.php';
                            </script>
                        ";
                    }
		}
		else{
			$pesan = "Tolong Isi Semua Data";
		}
		echo "
				<script>
					alert('$pesan');
					location.href = '../tambah_mengajar.php'
				</script>
			";
	}
	else{
		header('location: ../mengajar.php');
	}

?>