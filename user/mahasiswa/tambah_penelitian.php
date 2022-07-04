<?php
$page = 'penelitian';
    include "./partials/atas.php";
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Penelitian</h5>
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
                                                        <h5>Tambah Penelitian</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./process/tambah_penelitian.process.php" enctype="multipart/form-data">
                                                            <div class="form-group form-default">
                                                                <input type="text" name="judul_penelitian" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Judul Penelitian</label>
                                                            </div> 

                                                            <input type="hidden" name="nim" value="<?= $nim ?>">

                                                            <div class="form-group form-default">
                                                                
                                                            <label>Pilih Dosen Ketua</label>
                                                                <select name="nip" id="" class="form-control" required>
                                                                    <option value="">Pilih Ketua</option>
                                                                    <?php
                                                                        $query = mysqli_query($connection,"SELECT * FROM dosen ORDER BY nip ASC");
                                                                        if(mysqli_num_rows($query) > 0){
                                                                            while($data = mysqli_fetch_assoc($query)){
                                                                                ?>
                                                                                    <option value="<?= $data['nip'] ?>"><?= ucwords($data['nama_dosen']) ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                                
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <input type="number" name="tahun_penelitian" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Tahun Penelitian</label>
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <input type="text" name="tempat_penelitian" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Tempat Penelitian</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <label>Masukkan Anggota Penelitian</label>
                                                                <textarea name="anggota" id="" class="form-control"></textarea>
                                                                <span class="form-bar"></span>
                                                                
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <input type="number" name="dana" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Dana</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                            <label>Pilih Sumber Dana</label>
                                                                <select name="sumber_dana" id="" class="form-control" required>
                                                                    <option value="">Pilih Sumber Dana</option>
                                                                    <option value="DRPMDIKTI">DRPMDIKTI</option>
                                                                    <option value="DIPA">DIPA</option>
                                                                    <option value="SWADANA">SWADANA</option>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                                
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <label>Masukkan File PDF Proposal</label>
                                                                <input type="file" name="file_proposal" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <label>Masukkan File PDF Laporan</label>
                                                                <input type="file" name="file_laporan" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                            </div>
                                                            <input type="submit" name="submit" class="btn btn-success waves-effect waves-light" value="Tambah">
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