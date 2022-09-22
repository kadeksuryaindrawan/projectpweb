<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nidk) && !empty($nama) && !empty($pendidikan_terakhir) && !empty($perusahaan) && !empty($bidang) && !empty($list_sertifikat) && !empty($list_matakuliah) && !empty($bobot_sks) && !empty($semester) && !empty($tahun)){
                    $query_insert = mysqli_query($connection,"INSERT INTO dosen_industri VALUES (NULL,'$nidk','$nama','$pendidikan_terakhir','$perusahaan','$bidang','$list_sertifikat','$list_matakuliah',$bobot_sks,'$semester','$tahun')");

                    if($query_insert){
                        echo"
                            <script>
                                alert('Sukses Tambah Dosen Industri!');
                                location.href = '../dosen_industri.php';
                            </script>
                        ";
                    }
                    else{
                        echo"
                            <script>
                                alert('Gagal Tambah Mengah Dosen Industri!');
                                location.href = '../tambah_dosen_industri.php';
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
					location.href = '../tambah_dosen_industri.php'
				</script>
			";
	}
	else{
		header('location: ../dosen_industri.php');
	}

?>