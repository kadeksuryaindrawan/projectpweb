<?php
require_once "../../config/connection.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT * FROM dokumen WHERE id_dokumen = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data= mysqli_fetch_assoc($query_check);
          $filename = "../../public/file/".$data['file_pdf'];
            header("Content-type: application/pdf");
            header("Content-Length: " . filesize($filename));
            readfile($filename);
        }
        else{
          header('location: ./dokumen.php');
        }
      }
      else{
        header('location: ./dokumen.php');
      }
?> 
                  