<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
        $tipe_file = $_FILES['file_sk']['type'];
        $nama_file = $_FILES['file_sk']['name'];
		if(!empty($nip) && !empty($rekognisi) && !empty($tingkat) && !empty($tahun) && is_numeric($id)){
            if($nama_file == ""){
                    $query_update = mysqli_query($connection, "UPDATE rekognisi SET nip = '$nip', rekognisi = '$rekognisi', tingkat = '$tingkat', tahun = '$tahun' WHERE id = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Rekognisi sukses di edit!');
                                    location.href = '../rekognisi.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Rekognisi gagal di edit!!');
                                    location.href = '../rekognisi.php';
                                </script>";
                    }
                
            }
            else if($nama_file != ""){
                if($tipe_file == "application/pdf"){
                    $query_check = mysqli_query($connection,"SELECT * FROM rekognisi WHERE id = $id");
                    $data = mysqli_fetch_assoc($query_check);
                    $file_lama = $data['file_sk'];
                    $target_hapus = "../../../public/file/$file_lama";
                    unlink($target_hapus);
                    
                    $nama_baru = "rekognisi_".$nip."_".$id.".pdf";
                    $file_temp = $_FILES['file_sk']['tmp_name'];
                    $folder    = "../../../public/file";
    
                    move_uploaded_file($file_temp, "$folder/$nama_baru");
                    $query_update = mysqli_query($connection, "UPDATE rekognisi SET nip = '$nip', rekognisi = '$rekognisi', tingkat = '$tingkat', tahun = '$tahun', file_sk = '$nama_baru' WHERE id = $id");
                    
                    if($query_update){
                        echo "	<script>
                                    alert('Rekognisi sukses di edit!');
                                    location.href = '../rekognisi.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Rekognisi gagal di edit!!');
                                    location.href = '../rekognisi.php';
                                </script>";
                    }
                }
                else{
                    $pesan = "File Bukan PDF!";
                }
            }
            else{
                echo "	<script>
                            alert('Rekognisi gagal di edit!!');
                            location.href = '../rekognisi.php';
                        </script>";
            }
                    
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_rekognisi.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../rekognisi.php');
	}
?>