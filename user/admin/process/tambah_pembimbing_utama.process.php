<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nip) && !empty($kode_prodi) && !empty($jumlah_bimbingan) && !empty($tahun)){
                    $query_insert = mysqli_query($connection,"INSERT INTO pembimbing_utama VALUES (NULL,'$nip',$kode_prodi,$jumlah_bimbingan,'$tahun')");

                    if($query_insert){
                        echo"
                            <script>
                                alert('Sukses Tambah Pembimbing Utama!');
                                location.href = '../pembimbing_utama.php';
                            </script>
                        ";
                    }
                    else{
                        echo"
                            <script>
                                alert('Gagal Tambah Pembimbing Utama!');
                                location.href = '../tambah_pembimbing_utama.php';
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
					location.href = '../tambah_pembimbing_utama.php'
				</script>
			";
	}
	else{
		header('location: ../pembimbing_utama.php');
	}

?>