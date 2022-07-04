<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($id_jurnalindex) && !empty($nama_peringkatjurnal)){
            $query_check = mysqli_query($connection,"SELECT * FROM peringkat_jurnal WHERE nama_peringkatjurnal = '$nama_peringkatjurnal'");
            if(mysqli_num_rows($query_check) == 0){
                
                        $query_insert = mysqli_query($connection,"INSERT INTO peringkat_jurnal VALUES (NULL,$id_jurnalindex,'$nama_peringkatjurnal')");
    
                        if($query_insert){
                            echo"
                                <script>
                                    alert('Sukses Tambah Peringkat Jurnal!');
                                    location.href = '../tambah_peringkatjurnal.php';
                                </script>
                            ";
                        }
                        else{
                            echo"
                                <script>
                                    alert('Gagal Tambah Peringkat Jurnal!');
                                    location.href = '../tambah_peringkatjurnal.php';
                                </script>
                            ";
                        }
            }
            else{
                $pesan = "Nama Peringkat Jurnal sudah ada sebelumnya, silahkan pakai nama lain!";
            }
			
		}
		else{
			$pesan = "Tolong Isi Semua Data";
		}

		echo "
				<script>
					alert('$pesan');
					location.href = '../tambah_peringkatjurnal.php'
				</script>
			";
	}
	else{
		header('location: ../peringkat_jurnal.php');
	}

?>