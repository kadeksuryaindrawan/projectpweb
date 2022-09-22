<?php
$page = 'ewmp';
    include "./partials/atas.php";
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">EWMP</h5>
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
                                                        <h5>Tambah EWMP</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">

                                                        <form class="form-material" method="POST" action="./process/tambah_ewmp.process.php" enctype="multipart/form-data">
                                                            
                                                        <div class="form-group form-default">
                                                                
                                                                <label>Pilih Dosen</label>
                                                                    <select name="nip" id="" class="form-control" required>
                                                                        <option value="">Pilih Dosen</option>
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
                                                                <input type="number" name="tahun" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Tahun</label>
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <input type="text" name="pendidikan_prodi" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Angka Pendidikan Prodi</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="text" name="pendidikan_prodi_lain" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Angka Pendidikan Prodi Lain</label>
                                                            </div>
                                                            
                                                            <div class="form-group form-default">
                                                                <input type="text" name="pendidikan_pt_luar" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Angka Pendidikan PT Luar</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="text" name="penelitian" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Angka Penelitian</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="text" name="pkm" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Angka PKM</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="text" name="penunjang" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Angka Penunjang</label>
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