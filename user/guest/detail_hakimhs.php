<?php
$page = 'haki_mhs';
$pages = 'mhs';
    include "./partials/atas.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT haki_mahasiswa.*, mahasiswa.* FROM haki_mahasiswa INNER JOIN mahasiswa USING(nim) WHERE haki_mahasiswa.id_hakimhs = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data= mysqli_fetch_assoc($query_check);
        }
        else{
          header('location: ./haki_mhs.php');
        }
      }
      else{
        header('location: ./haki_mhs.php');
      }
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Haki Mahasiswa</h5>
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
                                                        <h5>Haki Mahasiswa Atas Nama : <?= ucwords($data['nama_mahasiswa']) ?></h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <p style="font-size: 17px;">Nama : <?= ucwords($data['nama_mahasiswa']) ?></p>
                                                        <p style="font-size: 17px;">NIM : <?= $data['nim'] ?></p>
                                                        <p style="font-size: 17px;">Judul Haki : <?= strtoupper($data['judul_haki']) ?></p>
                                                        <p style="font-size: 17px;">Tanggal Terdaftar : <?= date("d-M-Y", strtotime($data['tgl_terdaftar'])) ?></p>
                                                        <p style="font-size: 17px;">No Haki : <?= $data['no_haki'] ?></p>
                                                        <p style="font-size: 17px;">Anggota : <?= ucwords($data['anggota']) ?></p>
                                                        <div class="col-sm-12 text-center mt-5">
                                                            <a href="./haki_mhs.php"><button class="btn btn-danger waves-effect waves-light">Kembali</button></a>
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