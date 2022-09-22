<?php
$page = 'mengajar';
$pages = 'dsn';
    include "./partials/atas.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT * FROM mengajar WHERE id = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data = mysqli_fetch_assoc($query_check);
        }
        else{
          header('location: ./mengajar.php');
        }
      }
      else{
        header('location: ./mengajar.php');
      }
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Mengajar</h5>
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
                                                        <h5>Edit Mengajar</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./process/edit_mengajar.process.php" enctype="multipart/form-data">
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
                                                                <input type="text" name="nama_matakuliah" class="form-control" required="" value="<?= $data['nama_matakuliah'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Nama Mata Kuliah</label>
                                                            </div> 

                                                            <div class="form-group form-default">
                                                            <label>Pilih Semester</label>
                                                                    <select name="semester" id="" class="form-control" required>
                                                                        <option value="">Pilih Semester</option>
                                                                        <?php 
                                                                                if($data['semester'] == "ganjil"){
                                                                                    ?>
                                                                                        <option value="ganjil" selected>Ganjil</option>
                                                                                        <option value="genap">Genap</option>
                                                                                    <?php
                                                                                }
                                                                                if($data['semester'] == "genap"){
                                                                                    ?>
                                                                                        <option value="ganjil">Ganjil</option>
                                                                                        <option value="genap" selected>Genap</option>
                                                                                    <?php
                                                                                }
                                                                        ?>
                                                                        
                                                                    </select>
                                                                    <span class="form-bar"></span>
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <input type="number" name="tahun_akademik" class="form-control" required="" value="<?= $data['tahun_akademik'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Tahun Akademik</label>
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