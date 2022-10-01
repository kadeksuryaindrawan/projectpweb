<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($nip) && !empty($penulis_buku) && !empty($judul_buku) && !empty($penerbit) && !empty($tahun_terbit) && !empty($isbn) && is_numeric($id)){
            if($tahun_terbit > 0){
                $query_update = mysqli_query($connection, "UPDATE publikasi_buku SET nip = '$nip', penulis_buku = '$penulis_buku', judul_buku = '$judul_buku', penerbit = '$penerbit', tahun_terbit = $tahun_terbit, isbn = '$isbn' WHERE id_publikasibuku = $id");
                    if($query_update){
                        echo "	<script>
                                    alert('Buku sukses di edit!');
                                    location.href = '../buku.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Buku gagal di edit!!');
                                    location.href = '../buku.php';
                                </script>";
                    }
            }
            else{
                $pesan = "Tahun terbit harus lebih dari 0!";
            }
                    
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_buku.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../buku.php');
	}
?>