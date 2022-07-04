<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(is_numeric($kode_prodi)){
                if($prodi == ""){
                    $query_update_prodi = mysqli_query($connection, "UPDATE prodi SET nip_kaprodi = '' WHERE kode_prodi = $kode_prodi");
                    if($query_update_prodi){
                        echo "	<script>
                                    alert('Tidak jadi memilih kaprodi!');
                                    location.href = '../prodi.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Kaprodi gagal dipilih!');
                                    location.href = '../prodi.php';
                                </script>";
                    }
                }
                else{
                    $query_update_prodi = mysqli_query($connection, "UPDATE prodi SET nip_kaprodi = '$prodi' WHERE kode_prodi = $kode_prodi");
                    if($query_update_prodi){
                        echo "	<script>
                                    alert('Kaprodi sukses dipilih!');
                                    location.href = '../prodi.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Kaprodi gagal dipilih!');
                                    location.href = '../prodi.php';
                                </script>";
                    }
                }
		}
		else{
			$pesan = "Ada kesalahan!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../prodi.php';
			 	</script>";
	}
	else{
		header('location: ../prodi.php');
	}
?>