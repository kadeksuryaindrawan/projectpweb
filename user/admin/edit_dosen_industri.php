<?php
$page = 'dosen_industri';
$pages = 'dsn';
    include "./partials/atas.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT * FROM dosen_industri WHERE id = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data = mysqli_fetch_assoc($query_check);
        }
        else{
          header('location: ./dosen_industri.php');
        }
      }
      else{
        header('location: ./dosen_industri.php');
      }
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Dosen Industri</h5>
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
                                                        <h5>Edit Dosen Industri</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./process/edit_dosen_industri.process.php" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="<?= $id ?>">
                                                            <div class="form-group form-default">
                                                                <input type="number" name="nidk" class="form-control" required="" value="<?= $data['nidk'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan NIDK</label>
                                                        </div>

                                                        <div class="form-group form-default">
                                                                <input type="text" name="nama" class="form-control" required="" value="<?= $data['nama'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Nama</label>
                                                        </div>

                                                        <div class="form-group form-default">
                                                                <input type="text" name="pendidikan_terakhir" class="form-control" required="" value="<?= $data['pendidikan_terakhir'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Pendidikan Terakhir</label>
                                                        </div>

                                                        <div class="form-group form-default">
                                                                <input type="text" name="perusahaan" class="form-control" required="" value="<?= $data['perusahaan'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Perusahaan</label>
                                                        </div>

                                                        <div class="form-group form-default">
                                                                <input type="text" name="bidang" class="form-control" required="" value="<?= $data['bidang'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Bidang</label>
                                                        </div>

                                                        <div class="form-group form-default">
                                                                <textarea class="form-control" name="list_sertifikat" required=""> <?= $data['list_sertifikat'] ?></textarea>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan List Sertifikat</label>
                                                        </div>
                                                        
                                                        <div class="form-group form-default">
                                                                <textarea class="form-control" name="list_matakuliah" required=""><?= $data['list_matakuliah'] ?></textarea>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan List Mata Kuliah</label>
                                                        </div>

                                                        <div class="form-group form-default">
                                                                <input type="number" name="bobot_sks" class="form-control" required="" value="<?= $data['bobot_sks'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Bobot SKS</label>
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
                                                                <input type="number" name="tahun" class="form-control" required=""  value="<?= $data['tahun'] ?>">
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