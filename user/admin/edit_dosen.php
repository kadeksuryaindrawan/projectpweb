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
                                                        <h5>Edit Dosen</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                    <form class="form-material" method="POST" action="./process/edit_dosen.process.php">
                                                        <input type="hidden" name="user_id" value="<?= $data['user_id'] ?>">
                                                        <input type="hidden" name="nip" value="<?= $nip ?>">
                                                            <div class="form-group form-default">
                                                                <input type="email" name="email" class="form-control" value="<?= $data['email'] ?>" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Email</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="password" name="password" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Password</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="password" name="repassword" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Re-password</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="number" name="nip_edit" class="form-control" required="" value="<?= $data['nip'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan NIP</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="number" name="nidn" class="form-control" value="<?= $data['nidn'] ?>" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan NIDN</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="text" name="nama_dosen" class="form-control" value="<?= $data['nama_dosen'] ?>" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Nama</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <textarea name="alamat" id="" class="form-control" required><?= $data['alamat'] ?></textarea>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Alamat</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="number" name="telp" class="form-control" value="<?= $data['no_telp'] ?>" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan No Telp</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <label>Pilih Prodi</label>
                                                                <select name="prodi" id="" class="form-control" required>
                                                                    <option value="">Pilih Prodi Untuk Dosen</option>
                                                                    <?php 
                                                                    $query_prodi = mysqli_query($connection, "SELECT * FROM prodi ORDER BY kode_prodi DESC");
                                                                    if(mysqli_num_rows($query_prodi) > 0){
                                                                        while($data_prodi = mysqli_fetch_assoc($query_prodi)) {
                                                                            if($data['prodi'] == $data_prodi['kode_prodi']){
                                                                                $isSelected = "Selected";
                                                                            }
                                                                            else{
                                                                                $isSelected = "";
                                                                            }
                                                                        ?>
                                                                            <option value="<?= $data_prodi['kode_prodi'] ?>" <?= $isSelected ?> ><?= ucwords($data_prodi['nama_prodi']) ?></option>
                                                                        <?php
                                                                        }
                                                                    }
                                                                    else{
                                                                        ?>
                                                                        <option value="">Prodi tidak ditemukan!</option>
                                                                        <?php
                                                                    }

                                                                    ?>
                                                                </select>
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