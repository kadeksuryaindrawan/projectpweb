<?php
$page = 'penelitian';
    include "./partials/atas.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT penelitian.*, dosen.* FROM penelitian INNER JOIN dosen USING(nip) WHERE penelitian.id_penelitian = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data= mysqli_fetch_assoc($query_check);
        }
        else{
          header('location: ./penelitian.php');
        }
      }
      else{
        header('location: ./penelitian.php');
      }
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Penelitian</h5>
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
                                                        <h5>Penelitian dengan judul : <?= ucwords($data['judul_penelitian']) ?></h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <p style="font-size: 17px;">Judul penelitian : <?= ucwords($data['judul_penelitian']) ?></p>
                                                        <p style="font-size: 17px;">Nama Ketua penelitian : <?= ucwords($data['nama_dosen']) ?></p>
                                                        <p style="font-size: 17px;">NIP Ketua penelitian : <?= $data['nip'] ?></p>
                                                        <p style="font-size: 17px;">Tahun penelitian : <?= $data['tahun_penelitian'] ?></p>
                                                        <p style="font-size: 17px;">Tempat penelitian : <?= ucwords($data['tempat_penelitian']) ?></p>
                                                        <p style="font-size: 17px;">Anggota penelitian : <?= ucwords($data['anggota']) ?></p>
                                                        <p style="font-size: 17px;">Dana : <?="Rp. ".number_format($data['dana'],2,",",".") ?></p>
                                                        <p style="font-size: 17px;">Sumber Dana: <?= strtoupper($data['sumber_dana']) ?></p>
                                                        <div class="col-sm-12 text-center mt-5">
                                                            <a href="./penelitian.php"><button class="btn btn-danger waves-effect waves-light">Kembali</button></a>
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