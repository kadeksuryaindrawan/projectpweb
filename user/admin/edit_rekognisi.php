<?php
$page = 'rekognisi';
    include "./partials/atas.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT * FROM rekognisi WHERE id = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data = mysqli_fetch_assoc($query_check);
        }
        else{
          header('location: ./rekognisi.php');
        }
      }
      else{
        header('location: ./rekognisi.php');
      }
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Rekognisi</h5>
                                          <p class="m-b-0">Selamat datang di dashboard admin ProdiKU</p>
                                      </div>
                                  </div>
                                  
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- Hover table card start -->
                                        <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Edit Rekognisi</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./process/edit_rekognisi.process.php" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="<?= $id ?>">
                                                            <div class="form-group form-default">
                                                                
                                                                <label>Pilih Dosen</label>
                                                                    <select name="nip" id="" class="form-control" required>
                                                                        <option value="">Pilih Dosen</option>
                                                                        <?php 
                                                                        $query_dos = mysqli_query($connection, "SELECT * FROM dosen ORDER BY nip ASC");
                                                                        if(mysqli_num_rows($query_dos) > 0){
                                                                            while($data_dos = mysqli_fetch_assoc($query_dos)) {
                                                                                if($data['nip'] == $data_dos['nip']){
                                                                                    $isSelected = "Selected";
                                                                                }
                                                                                else{
                                                                                    $isSelected = "";
                                                                                }
                                                                            ?>
                                                                                <option value="<?= $data_dos['nip'] ?>" <?= $isSelected ?> ><?= ucwords($data_dos['nama_dosen']) ?></option>
                                                                            <?php
                                                                            }
                                                                        }
                                                                        else{
                                                                            ?>
                                                                            <option value="">Dosen tidak ada</option>
                                                                            <?php
                                                                        }

                                                                        ?>
                                                                    </select>
                                                                    <span class="form-bar"></span>
                                                                    
                                                                </div> 
                                                            <div class="form-group form-default">
                                                                <input type="text" name="rekognisi" class="form-control" required="" value="<?= $data['rekognisi'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Rekognisi</label>
                                                            </div> 

                                                            <div class="form-group form-default">
                                                            <label>Pilih Tingkat</label>
                                                                    <select name="tingkat" id="" class="form-control" required>
                                                                        <option value="">Pilih Tingkat</option>
                                                                        <?php 
                                                                                if($data['tingkat'] == "wilayah"){
                                                                                    ?>
                                                                                        <option value="wilayah" selected>Wilayah</option>
                                                                                        <option value="nasional">Nasional</option>
                                                                                        <option value="internasional">Internasional</option>
                                                                                    <?php
                                                                                }
                                                                                if($data['tingkat'] == "nasional"){
                                                                                    ?>
                                                                                        <option value="wilayah">Wilayah</option>
                                                                                        <option value="nasional" selected>Nasional</option>
                                                                                        <option value="internasional">Internasional</option>
                                                                                    <?php
                                                                                }
                                                                                if($data['tingkat'] == "internasional"){
                                                                                    ?>
                                                                                        <option value="wilayah">Wilayah</option>
                                                                                        <option value="nasional">Nasional</option>
                                                                                        <option value="internasional" selected>Internasional</option>
                                                                                    <?php
                                                                                }
                                                                        ?>
                                                                    </select>
                                                                    <span class="form-bar"></span>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="number" name="tahun" class="form-control" required="" value="<?= $data['tahun'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Tahun</label>
                                                            </div>
                                                            
                                                            <div class="form-group form-default">
                                                                <label>Masukkan File SK PDF</label>
                                                                <input type="file" name="file_sk" class="form-control">
                                                                <span class="form-bar"></span>
                                                            </div>

                                                            <input type="submit" name="submit" class="btn btn-success waves-effect waves-light" value="Edit">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Hover table card end -->
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                    
<?php
    include "./partials/bawah.php";
?>              