<?php
$page = 'dok';
$pages = 'dokumen';
    include "./partials/atas.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT * FROM dokumen WHERE id_dokumen = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data= mysqli_fetch_assoc($query_check);
          
        }
        else{
          header('location: ./dokumen.php');
        }
      }
      else{
        header('location: ./dokumen.php');
      }
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Dokumen</h5>
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
                                                        <h5>Edit Dokumen</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./process/edit_dokumen.process.php" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="<?= $id ?>">
                                                            <div class="form-group form-default">
                                                                
                                                            <label>Pilih Tipe Dokumen</label>
                                                                <select name="tipe" id="" class="form-control" required>
                                                                    <option value="">Pilih Tipe</option>
                                                                    <?php 
                                                                    $query_tipe = mysqli_query($connection, "SELECT * FROM tipe_dokumen ORDER BY id_tipe DESC");
                                                                    if(mysqli_num_rows($query_tipe) > 0){
                                                                        while($data_tipe = mysqli_fetch_assoc($query_tipe)) {
                                                                            if($data['id_tipe'] == $data_tipe['id_tipe']){
                                                                                $isSelected = "Selected";
                                                                            }
                                                                            else{
                                                                                $isSelected = "";
                                                                            }
                                                                        ?>
                                                                            <option value="<?= $data_tipe['id_tipe'] ?>" <?= $isSelected ?> ><?= ucwords($data_tipe['nama_tipe']) ?></option>
                                                                        <?php
                                                                        }
                                                                    }
                                                                    else{
                                                                        ?>
                                                                        <option value="">Tipe Dokumen tidak ada</option>
                                                                        <?php
                                                                    }

                                                                    ?>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                                
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <input type="text" name="nama_dokumen" class="form-control" required="" value="<?= $data['nama_dokumen'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Nama Dokumen</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <label>Tanggal Dokumen</label>
                                                                <input type="date" name="tgl_dokumen" class="form-control" required="" value="<?= $data['tgl_dokumen'] ?>">
                                                                <span class="form-bar"></span>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <label>Masukkan File PDF</label>
                                                                <input type="file" name="file_pdf" class="form-control">
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