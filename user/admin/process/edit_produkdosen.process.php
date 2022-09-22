<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_file = $_FILES['file_bukti']['type'];
        $nama_file = $_FILES['file_bukti']['name'];
		if(!empty($nip) && !empty($nama_produk) && !empty($deskripsi) && is_numeric($id)){
            if($nama_file == ""){
                    $query_update = mysqli_query($connection, "UPDATE produk_dosen SET nip = '$nip', nama_produk = '$nama_produk', deskripsi = '$deskripsi' WHERE id = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Produk Dosen sukses di edit!');
                                    location.href = '../produk_dosen.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Publikasi Dosen gagal di edit!!');
                                    location.href = '../produk_dosen.php';
                                </script>";
                    }
                
            }
            else if($nama_file != ""){
                if($tipe_file == "application/pdf"){
                    $query_check = mysqli_query($connection,"SELECT * FROM produk_dosen WHERE id = $id");
                    $data = mysqli_fetch_assoc($query_check);
                    $file_lama = $data['file_bukti'];
                    $target_hapus = "../../../public/file/$file_lama";
                    unlink($target_hapus);
                    
                    $nama_baru = "produk_dosen_".$nip."_".$id.".pdf";
                    $file_temp = $_FILES['file_bukti']['tmp_name'];
                    $folder    = "../../../public/file";
    
                    move_uploaded_file($file_temp, "$folder/$nama_baru");
                    $query_update = mysqli_query($connection, "UPDATE produk_dosen SET nip = '$nip', nama_produk = '$nama_produk', deskripsi = '$deskripsi', file_bukti = '$nama_baru' WHERE id = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Produk Dosen sukses di edit!');
                                    location.href = '../produk_dosen.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Produk Dosen gagal di edit!!');
                                    location.href = '../produk_dosen.php';
                                </script>";
                    }
                }
                else{
                    $pesan = "File Bukan PDF!";
                }
            }
            else{
                echo "	<script>
                            alert('Produk dosen gagal di edit!!');
                            location.href = '../produk_dosen.php';
                        </script>";
            }
                    
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_produkdosen.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../produk_dosen.php');
	}
?>