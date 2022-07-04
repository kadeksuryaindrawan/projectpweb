<?php
$page = 'prestasi_mhs';
$pages = 'mhs';
    include "./partials/atas.php";
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Prestasi Mahasiswa</h5>
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
                                                        <h5>Tambah Prestasi Mahasiswa</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./process/tambah_prestasi.process.php" enctype="multipart/form-data">
                                                            <input type="hidden" name="nim" value="<?= $nim ?>">

                                                            <div class="form-group form-default">
                                                                <input type="text" name="nama_event" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Nama Event</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="number" name="tahun_event" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Tahun Event</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="number" name="peringkat" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Peringkat</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                            <label>Pilih Tingkat</label>
                                                                <select name="tingkat" id="" class="form-control" required>
                                                                    <option value="">Pilih Tingkat</option>
                                                                    <option value="politeknik">Politeknik</option>
                                                                    <option value="nasional">Nasional</option>
                                                                    <option value="internasional">Internasional</option>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                                
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <label>Masukkan File Sertif PDF</label>
                                                                <input type="file" name="file_sertif" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                            </div>

                                                            <div class="form-group form-default">
                                                            <label>Pilih Type Prestasi</label>
                                                                <select name="type" id="" class="form-control" required>
                                                                    <option value="">Pilih Tipe</option>
                                                                    <option value="Akademik">Akademik</option>
                                                                    <option value="Non Akademik">Non Akademik</option>
                                                                </select>
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