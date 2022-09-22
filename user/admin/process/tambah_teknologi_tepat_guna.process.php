<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nip) && !empty($judul) && !empty($deskripsi) && !empty($tahun)){
                    $query_insert = mysqli_query($connection,"INSERT INTO teknologi_tepat_guna VALUES (NULL,'$nip','$judul','$deskripsi','$tahun')");

                    if($query_insert){
                        echo"
                            <script>
                                alert('Sukses Tambah Teknologi Tepat Guna!');
                                location.href = '../teknologi_tepat_guna.php';
                            </script>
                        ";
                    }
                    else{
                        echo"
                            <script>
                                alert('Gagal Tambah Teknologi Tepat Guna!');
                                location.href = '../tambah_teknologi_tepat_guna.php';
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
					location.href = '../tambah_teknologi_tepat_guna.php'
				</script>
			";
	}
	else{
		header('location: ../teknologi_tepat_guna.php');
	}

?>