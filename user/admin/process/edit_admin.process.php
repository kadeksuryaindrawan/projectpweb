<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['submit'])){
		extract($_POST);
		if(!empty($email) && is_numeric($id)){
            $query_admin_lama = mysqli_query($connection, "SELECT * FROM users WHERE user_id = $id");
 			$data_admin_lama = mysqli_fetch_assoc($query_admin_lama);
 			$email_lama = $data_admin_lama['email'];
 			$query_check = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email' AND email != '$email_lama'");
 			if(mysqli_num_rows($query_check) == 0){
                if($password == ""){
                    $query_update_admin = mysqli_query($connection, "UPDATE users SET email = '$email' WHERE user_id = $id");
                    if($query_update_admin){
                        echo "	<script>
                                    alert('Data admin sukses di edit!');
                                    location.href = '../admin.php';
                                </script>";
                    }
                    else{
                        echo "	<script>
                                    alert('Data admin Gagal di edit!');
                                    location.href = '../admin.php';
                                </script>";
                    }
                }
                else{
                    if($password == $repassword){
                        if(strlen($password) >= 7 ){
                            $encrypted_password = password_hash($password,PASSWORD_BCRYPT, ['cost' => 12]);
                            $query_update_admin = mysqli_query($connection, "UPDATE users SET email = '$email', password = '$encrypted_password' WHERE user_id = $id");
                            if($query_update_admin){
                                echo "	<script>
                                            alert('Data admin sukses di edit!');
                                            location.href = '../admin.php';
                                        </script>";
                            }
                            else{
                                echo "	<script>
                                            alert('Data admin Gagal di edit!');
                                            location.href = '../admin.php';
                                        </script>";
                            }
                        }
                        else{
                            $pesan = "Password setidaknya harus terdiri dari 7 kalimat atau lebih!";
                        }
                    }
                    else{
                        $pesan = "Password dan repassword harus sama!";
                    }
                }
 			}
 			else{
 				$pesan = "Admin Sudah Ada Sebelumnya!";
 			}
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../edit_admin.php?id=$id';
			 	</script>";
	}
	else{
		header('location: ../admin.php');
	}
?>