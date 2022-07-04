<?php
$page = 'publikasi_dosen';
$pages = 'dsn';
    include "./partials/atas.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT dosen.*,publikasi_dosen.*,peringkat_jurnal.*,jurnal_index.* FROM dosen INNER JOIN publikasi_dosen USING(nip) INNER JOIN peringkat_jurnal ON publikasi_dosen.peringkat_jurnal = peringkat_jurnal.id_peringkatjurnal INNER JOIN jurnal_index ON peringkat_jurnal.id_jurnalindex = jurnal_index.id_jurnalindex WHERE publikasi_dosen.id_publikasidosen = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data= mysqli_fetch_assoc($query_check);
        }
        else{
          header('location: ./publikasi_dosen.php');
        }
      }
      else{
        header('location: ./publikasi_dosen.php');
      }
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Publikasi Dosen</h5>
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
                                                        <h5>Publikasi Dosen Atas Nama : <?= ucwords($data['nama_dosen']) ?></h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <p style="font-size: 17px;">Nama : <?= ucwords($data['nama_dosen']) ?></p>
                                                        <p style="font-size: 17px;">NIP : <?= $data['nip'] ?></p>
                                                        <p style="font-size: 17px;">Judul Jurnal : <?= strtoupper($data['judul_jurnal']) ?></p>
                                                        <p style="font-size: 17px;">Nama Jurnal : <?= strtoupper($data['nama_jurnal']) ?></p>
                                                        <p style="font-size: 17px;">Nama Jurnal Index : <?= strtoupper($data['nama_jurnalindex']) ?></p>
                                                        <p style="font-size: 17px;">Peringkat Jurnal : <?= strtoupper($data['nama_peringkatjurnal']) ?></p>
                                                        <p style="font-size: 17px;">Tanggal Publish : <?= date("d-M-Y", strtotime($data['tgl_publish'])) ?></p>
                                                        <p style="font-size: 17px;">Institusi Penerbit : <?= ucwords($data['institusi_penerbit']) ?></p>
                                                        <div class="col-sm-12 text-center mt-5">
                                                            <a href="./publikasi_dosen.php"><button class="btn btn-danger waves-effect waves-light">Kembali</button></a>
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