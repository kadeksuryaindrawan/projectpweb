<?php
$page = 'pubuku';
    include "./partials/atas.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT * FROM publikasi_buku WHERE id_publikasibuku = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data= mysqli_fetch_assoc($query_check);
          
        }
        else{
          header('location: ./buku.php');
        }
      }
      else{
        header('location: ./buku.php');
      }
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Publikasi Buku</h5>
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
                                                        <h5>Edit Buku</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./process/edit_buku.process.php">
                                                            <input type="hidden" name="id" value="<?= $id ?>">
                                                            <div class="form-group form-default">
                                                                <input type="text" name="judul_buku" class="form-control" required="" value="<?= $data['judul_buku'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Judul Buku</label>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                
                                                            <label>Pilih Dosen Penulis Utama</label>
                                                                <select name="nip" id="" class="form-control" required>
                                                                    <option value="">Pilih Penulis  Utama</option>
                                                                    <?php 
                                                                    $query_dosen = mysqli_query($connection, "SELECT * FROM dosen ORDER BY nip ASC");
                                                                    if(mysqli_num_rows($query_dosen) > 0){
                                                                        while($data_dosen = mysqli_fetch_assoc($query_dosen)) {
                                                                            if($data['nip'] == $data_dosen['nip']){
                                                                                $isSelected = "Selected";
                                                                            }
                                                                            else{
                                                                                $isSelected = "";
                                                                            }
                                                                        ?>
                                                                            <option value="<?= $data_dosen['nip'] ?>" <?= $isSelected ?> ><?= ucwords($data_dosen['nama_dosen']) ?></option>
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
                                                                <label>Masukkan Penulis Buku</label>
                                                                <textarea name="penulis_buku" class="form-control"><?= $data['penulis_buku'] ?></textarea>
                                                                <span class="form-bar"></span>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="text" name="penerbit" class="form-control" required="" value="<?= $data['penerbit'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Penerbit</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="number" name="tahun_terbit" class="form-control" required="" value="<?= $data['tahun_terbit'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Tahun Terbit</label>
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