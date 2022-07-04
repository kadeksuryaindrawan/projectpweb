<?php
    require_once "../../config/connection.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT * FROM prestasi_mhs WHERE id_prestasi = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data= mysqli_fetch_assoc($query_check);
            // The location of the PDF file
            // on the server
            $filename = "../../public/file/".$data['file_sertif'];
            
            // Header content type
            header("Content-type: application/pdf");
            
            header("Content-Length: " . filesize($filename));
            
            // Send the file to the browser.
            readfile($filename);
        }
        else{
          header('location: ./prestasi_mhs.php');
        }
      }
      else{
        header('location: ./prestasi_mhs.php');
      }
?>     