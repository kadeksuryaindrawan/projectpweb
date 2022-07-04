<?php
$page = 'dosen';
$pages = 'dsn';
    include "./partials/atas.php";
    if(isset($_GET['nip']) && !empty($_GET['nip']) && is_numeric($_GET['nip'])){
        $nip= $_GET['nip'];
        $query_check = mysqli_query($connection, "SELECT users.*,dosen.*,prodi.* FROM users INNER JOIN dosen USING(user_id) INNER JOIN prodi ON dosen.prodi = prodi.kode_prodi WHERE dosen.nip = '$nip'");
        if(mysqli_num_rows($query_check) == 1){
          $data= mysqli_fetch_assoc($query_check);
          
        }
        else{
          header('location: ./dosen.php');
        }
      }
      else{
        header('location: ./dosen.php');
      }
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Dosen</h5>
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
                                                        <h5>Data Dosen Atas Nama : <?= ucwords($data['nama_dosen']) ?></h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <p style="font-size: 17px;">NIP : <?= $data['nip'] ?></p>
                                                        <p style="font-size: 17px;">NIDN : <?= $data['nidn'] ?></p>
                                                        <p style="font-size: 17px;">Email : <?= $data['email'] ?></p>
                                                        <p style="font-size: 17px;">Nama Dosen : <?= $data['nama_dosen'] ?></p>
                                                        <p style="font-size: 17px;">Alamat : <?= $data['alamat'] ?></p>
                                                        <p style="font-size: 17px;">No Telp : <?= $data['no_telp'] ?></p>
                                                        <p style="font-size: 17px;">Dosen Prodi : <?= $data['nama_prodi'] ?></p>
                                                        <div class="col-sm-12 text-center mt-5">
                                                            <a href="./dosen.php"><button class="btn btn-danger waves-effect waves-light">Kembali</button></a>
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