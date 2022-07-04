<?php
$page = 'peringkat_jurnal';
$pages = 'jurnal';
    include "./partials/atas.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT * FROM peringkat_jurnal WHERE id_peringkatjurnal = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data= mysqli_fetch_assoc($query_check);
          
        }
        else{
          header('location: ./peringkat_jurnal.php');
        }
      }
      else{
        header('location: ./peringkat_jurnal.php');
      }
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Peringkat Jurnal</h5>
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
                                                        <h5>Edit Peringkat Jurnal</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./process/edit_peringkatjurnal.process.php">
                                                            <input type="hidden" name="id" id="" value="<?=$id?>">
                                                            <div class="form-group form-default">
                                                                
                                                            <label>Pilih Jurnal Index</label>
                                                                <select name="id_jurnalindex" id="" class="form-control" required>
                                                                    <option value="">Pilih Jurnal Index</option>
                                                                    <?php 
                                                                    $query_jurnal_index = mysqli_query($connection, "SELECT * FROM jurnal_index ORDER BY id_jurnalindex DESC");
                                                                    if(mysqli_num_rows($query_jurnal_index) > 0){
                                                                        while($data_jurnal_index = mysqli_fetch_assoc($query_jurnal_index)) {
                                                                            if($data['id_jurnalindex'] == $data_jurnal_index['id_jurnalindex']){
                                                                                $isSelected = "Selected";
                                                                            }
                                                                            else{
                                                                                $isSelected = "";
                                                                            }
                                                                        ?>
                                                                            <option value="<?= $data_jurnal_index['id_jurnalindex'] ?>" <?= $isSelected ?> ><?= ucwords($data_jurnal_index['nama_jurnalindex']) ?></option>
                                                                        <?php
                                                                        }
                                                                    }
                                                                    else{
                                                                        ?>
                                                                        <option value="">Jurnal Index tidak ada</option>
                                                                        <?php
                                                                    }

                                                                    ?>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                                
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <input type="text" name="nama_peringkatjurnal" class="form-control" value="<?= $data['nama_peringkatjurnal'] ?>" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Nama Peringkat Jurnal</label>
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