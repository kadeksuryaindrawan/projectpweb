<?php
$page = 'produk_dosen';
$pages = 'dsn';
    include "./partials/atas.php";
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Produk Dosen</h5>
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
                                                        <h5>Tambah Produk Dosen</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">

                                                        <form class="form-material" method="POST" action="./process/tambah_produkdosen.process.php" enctype="multipart/form-data">
                                                            
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
                                                                <input type="text" name="nama_produk" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Nama Produk</label>
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <textarea class="form-control" name="deskripsi" required=""></textarea>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Deskripsi</label>
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <label>Masukkan File PDF Bukti</label>
                                                                <input type="file" name="file_bukti" class="form-control" required="">
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