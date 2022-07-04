<?php
$page = 'dashboard';
    include "./partials/atas.php";
        $query_check = mysqli_query($connection, "SELECT users.*,dosen.* FROM users INNER JOIN dosen USING(user_id) WHERE users.user_id = $dosen_id");
        if(mysqli_num_rows($query_check) == 1){
          $data = mysqli_fetch_assoc($query_check);
        }
        else{
          header('location: ./dashboard.php');
        }
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Data Diri</h5>
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
                                                        <h5>Edit Data Diri</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./process/edit_datadiri.process.php">
                                                            <input type="hidden" name="user_id" value="<?= $dosen_id ?>">
                                                            <div class="form-group form-default">
                                                                <input type="email" name="email" class="form-control" required="" value="<?= $data['email'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Email</label>
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <input type="number" name="nip" class="form-control" required="" value="<?= $data['nip'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">NIP</label>
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <input type="number" name="nidn" class="form-control" required="" value="<?= $data['nidn'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">NIDN</label>
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <input type="text" name="nama_dosen" class="form-control" required="" value="<?= $data['nama_dosen'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Nama Dosen</label>
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <textarea name="alamat" id="" class="form-control" required><?= $data['alamat'] ?></textarea>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Alamat</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="number" name="telp" class="form-control" value="<?= $data['no_telp'] ?>" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">No Telp</label>
                                                            </div>

                                                            <input type="submit" name="submit" class="btn btn-success waves-effect waves-light" value="Edit">
                                                        </form>
                                                        <a href="./lihat_datadiri.php"><button class="btn btn-danger mt-2">Kembali</button></a>
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