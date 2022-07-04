<?php
$page = 'prodi';
    include "./partials/atas.php";
    if(isset($_GET['kode_prodi']) && !empty($_GET['kode_prodi']) && is_numeric($_GET['kode_prodi'])){
        $kode_prodi = $_GET['kode_prodi'];
        $query_check = mysqli_query($connection, "SELECT * FROM prodi WHERE kode_prodi = $kode_prodi");
        if(mysqli_num_rows($query_check) == 1){
          $data= mysqli_fetch_assoc($query_check);
          
        }
        else{
          header('location: ./admin.php');
        }
      }
      else{
        header('location: ./admin.php');
      }
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Prodi</h5>
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
                                                        <h5>Pilih Kaprodi Untuk prodi <?= strtoupper($data['nama_prodi']) ?></h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./process/pilih_kaprodi.process.php">
                                                            <input type="hidden" name="kode_prodi" value="<?= $kode_prodi ?>">
                                                            <div class="form-group form-default">
                                                                <label>Pilih Kaprodi untuk prodi <?= strtoupper($data['nama_prodi']) ?></label>
                                                                <select name="prodi" id="" class="form-control">
                                                                    <option value="">Pilih Kaprodi</option>
                                                                    <?php
                                                                        $query = mysqli_query($connection,"SELECT * FROM dosen WHERE prodi = $kode_prodi ORDER BY nip DESC");
                                                                        if(mysqli_num_rows($query) > 0){
                                                                            while($data_prodi = mysqli_fetch_assoc($query)){
                                                                                ?>
                                                                                    <option value="<?= $data_prodi['nip'] ?>"><?= ucwords($data_prodi['nama_dosen']) ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                                
                                                            </div>

                                                            <input type="submit" name="submit" class="btn btn-success waves-effect waves-light" value="Pilih">
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