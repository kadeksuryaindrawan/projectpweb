<?php
$page = 'pembimbing_utama';
$pages = 'dsn';
    include "./partials/atas.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT * FROM pembimbing_utama WHERE id = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data = mysqli_fetch_assoc($query_check);
        }
        else{
          header('location: ./pembimbing_utama.php');
        }
      }
      else{
        header('location: ./pembimbing_utama.php');
      }
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Pembimbing Utama</h5>
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
                                                        <h5>Edit Pembimbing Utama</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./process/edit_pembimbing_utama.process.php" enctype="multipart/form-data">
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
                                                                
                                                                <label>Pilih Prodi</label>
                                                                    <select name="kode_prodi" id="" class="form-control" required>
                                                                        <option value="">Pilih Prodi</option>
                                                                        <?php 
                                                                        $query_dos = mysqli_query($connection, "SELECT * FROM prodi ORDER BY kode_prodi ASC");
                                                                        if(mysqli_num_rows($query_dos) > 0){
                                                                            while($data_dos = mysqli_fetch_assoc($query_dos)) {
                                                                                if($data['kode_prodi'] == $data_dos['kode_prodi']){
                                                                                    $isSelected = "Selected";
                                                                                }
                                                                                else{
                                                                                    $isSelected = "";
                                                                                }
                                                                            ?>
                                                                                <option value="<?= $data_dos['kode_prodi'] ?>" <?= $isSelected ?> ><?= ucwords($data_dos['nama_prodi']) ?></option>
                                                                            <?php
                                                                            }
                                                                        }
                                                                        else{
                                                                            ?>
                                                                            <option value="">Prodi tidak ada</option>
                                                                            <?php
                                                                        }

                                                                        ?>
                                                                    </select>
                                                                    <span class="form-bar"></span>
                                                                    
                                                                </div> 

                                                                <div class="form-group form-default">
                                                                <input type="number" name="jumlah_bimbingan" class="form-control" required="" value="<?= $data['jumlah_bimbingan'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Jumlah Bimbingan</label>
                                                            </div> 

                                                            

                                                            <div class="form-group form-default">
                                                                <input type="number" name="tahun" class="form-control" required="" value="<?= $data['tahun'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Tahun</label>
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