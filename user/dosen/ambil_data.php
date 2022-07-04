<?php
    require_once "../../config/connection.php";

    if(isset($_POST['id_jurnalindex'])) {
        $id_jurnalindex = $_POST["id_jurnalindex"];
        $query2 = mysqli_query($connection,"SELECT * FROM peringkat_jurnal WHERE id_jurnalindex = $id_jurnalindex");

        if(mysqli_num_rows($query2) > 0){
            while($data_peringkatjurnal = mysqli_fetch_assoc($query2)){
                ?>
                    <option value="<?= $data_peringkatjurnal['id_peringkatjurnal'] ?>"><?= strtoupper($data_peringkatjurnal['nama_peringkatjurnal']) ?></option>
                <?php
            }
            
        }
        else{
            ?>
                <option value="">Peringkat Jurnal Tidak Tersedia!</option>
            <?php
        }
    }

?>