<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nip) && !empty($tahun)){
                    $query_insert = mysqli_query($connection,"INSERT INTO ewmp VALUES (NULL,'$nip','$tahun',$pendidikan_prodi,$pendidikan_prodi_lain,$pendidikan_pt_luar,$penelitian,$pkm,$penunjang)");

                    if($query_insert){
                        echo"
                            <script>
                                alert('Sukses Tambah EWMP!');
                                location.href = '../ewmp.php';
                            </script>
                        ";
                    }
                    else{
                        echo"
                            <script> 
                                alert('Gagal Tambah EWMP!');
                                location.href = '../tambah_ewmp.php';
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
					location.href = '../tambah_ewmp.php'
				</script>
			";
	}
	else{
		header('location: ../ewmp.php');
	}

?>