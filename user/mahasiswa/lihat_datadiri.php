<?php
$page = 'dashboard';
    include "./partials/atas.php";
    $query_check = mysqli_query($connection, "SELECT users.*,mahasiswa.*,prodi.* FROM users INNER JOIN mahasiswa USING(user_id) INNER JOIN prodi ON mahasiswa.prodi = prodi.kode_prodi WHERE users.user_id = $mahasiswa_id");
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
                                                        <h5>Data Diri <?= ucwords($data['nama_mahasiswa']) ?></h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <p style="font-size: 17px;">Email : <?= $data['email'] ?></p>
                                                        <p style="font-size: 17px;">NIM : <?= $data['nim'] ?></p>
                                                        <p style="font-size: 17px;">Tahun Diterima : <?= $data['tahun_diterima'] ?></p>
                                                        <p style="font-size: 17px;">Nama : <?= ucwords($data['nama_mahasiswa']) ?></p>
                                                        <p style="font-size: 17px;">Alamat : <?= ucfirst($data['alamat']) ?></p>
                                                        <p style="font-size: 17px;">No Telp : <?= $data['no_telp'] ?></p>
                                                        <p style="font-size: 17px;">Prodi : <?= ucwords($data['nama_prodi']) ?></p>
                                                        <div class="col-sm-12 text-center mt-5">
                                                            <a href="./data_diri.php"><button class="btn btn-success waves-effect waves-light">Edit Data Diri</button></a>
                                                            <a href="./dashboard.php"><button class="btn btn-danger waves-effect waves-light">Kembali</button></a>
                                                        </div>
                                                        
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