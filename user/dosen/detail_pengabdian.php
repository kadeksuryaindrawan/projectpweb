<?php
$page = 'pengabdian';
    include "./partials/atas.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT pengabdian.*, dosen.* FROM pengabdian INNER JOIN dosen USING(nip) WHERE pengabdian.id_pengabdian = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data= mysqli_fetch_assoc($query_check);
        }
        else{
          header('location: ./pengabdian.php');
        }
      }
      else{
        header('location: ./pengabdian.php');
      }
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Pengabdian</h5>
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
                                                        <h5>Pengabdian dengan nama : <?= ucwords($data['nama_pengabdian']) ?></h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <p style="font-size: 17px;">Nama Pengabdian : <?= ucwords($data['nama_pengabdian']) ?></p>
                                                        <p style="font-size: 17px;">Nama Ketua Pengabdian : <?= ucwords($data['nama_dosen']) ?></p>
                                                        <p style="font-size: 17px;">NIP Ketua Pengabdian : <?= $data['nip'] ?></p>
                                                        <p style="font-size: 17px;">Tanggal Pengabdian : <?= date("d-M-Y", strtotime($data['tgl_pengabdian'])) ?></p>
                                                        <p style="font-size: 17px;">Tempat Pengabdian : <?= ucwords($data['tempat_pengabdian']) ?></p>
                                                        <p style="font-size: 17px;">Dana : <?="Rp. ".number_format($data['dana'],2,",",".") ?></p>
                                                        <p style="font-size: 17px;">Sumber Dana: <?= strtoupper($data['sumber_dana']) ?></p>
                                                        <div class="col-sm-12 text-center mt-5">
                                                            <a href="./pengabdian.php"><button class="btn btn-danger waves-effect waves-light">Kembali</button></a>
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