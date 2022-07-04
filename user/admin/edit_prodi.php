<?php
$page = 'prodi';
    include "./partials/atas.php";
    if(isset($_GET['kode_prodi']) && !empty($_GET['kode_prodi']) && is_numeric($_GET['kode_prodi'])){
        $kode_prodi= $_GET['kode_prodi'];
        $query_check = mysqli_query($connection, "SELECT * FROM prodi WHERE kode_prodi = $kode_prodi");
        if(mysqli_num_rows($query_check) == 1){
          $data= mysqli_fetch_assoc($query_check);
          
        }
        else{
          header('location: ./prodi.php');
        }
      }
      else{
        header('location: ./prodi.php');
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
                                                        <h5>Edit Prodi</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./process/edit_prodi.process.php">
                                                            <input type="hidden" name="kode_prodi" value="<?= $kode_prodi ?>">
                                                            <div class="form-group form-default">
                                                                <input type="text" name="nama_prodi" class="form-control" required="" value="<?= $data['nama_prodi'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Nama Prodi</label>
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