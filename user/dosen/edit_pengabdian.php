<?php
$page = 'pengabdian';
    include "./partials/atas.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT * FROM pengabdian WHERE id_pengabdian = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data = mysqli_fetch_assoc($query_check);
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
                                                        <h5>Edit Pengabdian</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./process/edit_pengabdian.process.php" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="<?= $id ?>">
                                                            <div class="form-group form-default">
                                                                <input type="text" name="nama_pengabdian" class="form-control" required="" value="<?= $data['nama_pengabdian'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Nama Pengabdian</label>
                                                            </div> 

                                                            <input type="hidden" name="nip" value="<?= $nip ?>">

                                                            <div class="form-group form-default">
                                                                <label>Tanggal Pengabdian</label>
                                                                <input type="date" name="tgl_pengabdian" class="form-control" required="" value="<?= $data['tgl_pengabdian'] ?>">
                                                                <span class="form-bar"></span>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="text" name="tempat_pengabdian" class="form-control" required="" value="<?= $data['tempat_pengabdian'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Tempat Pengabdian</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="number" name="dana" class="form-control" required="" value="<?= $data['dana'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Dana</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                            <label>Pilih Sumber Dana</label>
                                                                <select name="sumber_dana" id="" class="form-control" required>
                                                                    <option value="">Pilih Sumber Dana</option>
                                                                    <option value="DRPMDIKTI" <?php if($data['sumber_dana'] == "DRPMDIKTI") echo 'Selected';?>>DRPMDIKTI</option>
                                                                    <option value="DIPA" <?php if($data['sumber_dana'] == "DIPA") echo 'Selected';?>>DIPA</option>
                                                                    <option value="SWADANA" <?php if($data['sumber_dana'] == "SWADANA") echo 'Selected';?>>SWADANA</option>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                                
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <label>Masukkan File PDF Proposal</label>
                                                                <input type="file" name="file_proposal" class="form-control">
                                                                <span class="form-bar"></span>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <label>Masukkan File PDF Laporan</label>
                                                                <input type="file" name="file_laporan" class="form-control">
                                                                <span class="form-bar"></span>
                                                            </div>

                                                            <input type="submit" name="submit" class="btn btn-success waves-effect waves-light" value="Edit">
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