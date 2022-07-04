<?php
$page = 'prestasi_mhs';
$pages = 'mhs';
    include "./partials/atas.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT prestasi_mhs.*, mahasiswa.* FROM prestasi_mhs INNER JOIN mahasiswa USING(nim) WHERE prestasi_mhs.id_prestasi = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data= mysqli_fetch_assoc($query_check);
          
        }
        else{
          header('location: ./prestasi_mhs.php');
        }
      }
      else{
        header('location: ./prestasi_mhs.php');
      }
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
                                                        <h5>Prestasi Mahasiswa Atas Nama : <?= ucwords($data['nama_mahasiswa']) ?></h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <p style="font-size: 17px;">Nama : <?= ucwords($data['nama_mahasiswa']) ?></p>
                                                        <p style="font-size: 17px;">NIM : <?= $data['nim'] ?></p>
                                                        <p style="font-size: 17px;">Nama Event : <?= strtoupper($data['nama_event']) ?></p>
                                                        <p style="font-size: 17px;">Tahun Event : <?= $data['tahun_event'] ?></p>
                                                        <p style="font-size: 17px;">Peringkat : <?= $data['peringkat'] ?></p>
                                                        <p style="font-size: 17px;">Tingkat : <?= ucwords($data['tingkat']) ?></p>
                                                        <p style="font-size: 17px;">Tipe : <?= ucwords($data['type']) ?></p>
                                                        <div class="col-sm-12 text-center mt-5">
                                                            <a href="./prestasi_mhs.php"><button class="btn btn-danger waves-effect waves-light">Kembali</button></a>
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