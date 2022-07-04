<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_file = $_FILES['file_pdf']['type'];
        $nama_file = $_FILES['file_pdf']['name'];
		if(!empty($tipe) && !empty($nama_dokumen) && !empty($tgl_dokumen)){
            $query_check = mysqli_query($connection,"SELECT * FROM dokumen WHERE nama_dokumen = '$nama_dokumen'");
            if(mysqli_num_rows($query_check) == 0){
                if($tipe_file == "application/pdf"){
                        $query_insert = mysqli_query($connection,"INSERT INTO dokumen VALUES (NULL,$tipe,'$nama_dokumen','$tgl_dokumen',NULL)");
                        $query = mysqli_query($connection,"SELECT id_dokumen FROM dokumen ORDER BY id_dokumen DESC LIMIT 1");
                        $data = mysqli_fetch_assoc($query);
                        $id_dokumen = $data['id_dokumen'];
                        $nama_baru = "dokumen_".$nama_dokumen."_".$data['id_dokumen'].".pdf";
                        $file_temp = $_FILES['file_pdf']['tmp_name'];
                        $folder    = "../../../public/file";
    
                        move_uploaded_file($file_temp, "$folder/$nama_baru");
    
                        $query_update = mysqli_query($connection,"UPDATE dokumen SET file_pdf='$nama_baru' WHERE id_dokumen=$id_dokumen");
    
                        if($query_update){
                            echo"
                                <script>
                                    alert('Sukses Tambah Dokumen!');
                                    location.href = '../dokumen.php';
                                </script>
                            ";
                        }
                        else{
                            echo"
                                <script>
                                    alert('Gagal Tambah Dokumen!');
                                    location.href = '../tambah_dokumen.php';
                                </script>
                            ";
                        }
                }
                else{
                    $pesan = "File Bukan PDF!";
                }
            }
            else{
                $pesan = "Nama dokumen sudah ada sebelumnya, silahkan pakai nama lain!";
            }
			
		}
		else{
			$pesan = "Tolong Isi Semua Data";
		}

		echo "
				<script>
					alert('$pesan');
					location.href = '../tambah_dokumen.php'
				</script>
			";
	}
	else{
		header('location: ../dokumen.php');
	}

?>