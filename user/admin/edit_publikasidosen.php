<?php
$page = 'publikasi_dosen';
$pages = 'dsn';
    include "./partials/atas.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT * FROM publikasi_dosen WHERE id_publikasidosen = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data = mysqli_fetch_assoc($query_check);
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
                                                        <h5>Edit Publikasi Dosen</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./process/edit_publikasidosen.process.php" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="<?= $id ?>">
                                                            <div class="form-group form-default">
                                                                
                                                                <label>Pilih Dosen</label>
                                                                    <select name="nip" id="" class="form-control" required>
                                                                        <option value="">Pilih Dosen</option>
                                                                        <?php 
                                                                        $query_dos = mysqli_query($connection, "SELECT * FROM dosen ORDER BY nip ASC");
                                                                        if(mysqli_num_rows($query_dos) > 0){
                                                                            while($data_dos = mysqli_fetch_assoc($query_dos)) {
                                                                                if($data['nip'] == $data_dos['nip']){
                                                                                    $isSelected = "Selected";
                                                                                }
                                                                                else{
                                                                                    $isSelected = "";
                                                                                }
                                                                            ?>
                                                                                <option value="<?= $data_dos['nip'] ?>" <?= $isSelected ?> ><?= ucwords($data_dos['nama_dosen']) ?></option>
                                                                            <?php
                                                                            }
                                                                        }
                                                                        else{
                                                                            ?>
                                                                            <option value="">Dosen tidak ada</option>
                                                                            <?php
                                                                        }

                                                                        ?>
                                                                    </select>
                                                                    <span class="form-bar"></span>
                                                                    
                                                                </div> 
                                                            <div class="form-group form-default">
                                                                <input type="text" name="judul_jurnal" class="form-control" value="<?= $data['judul_jurnal'] ?>" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Judul Jurnal</label>
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <input type="text" name="nama_jurnal" class="form-control" value="<?= $data['nama_jurnal'] ?>" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Nama Jurnal</label>
                                                            </div> 

                                                                <div class="form-group form-default">
                                                                    <label>Pilih Jurnal Index</label>
                                                                    <select name="id_jurnalindex" id="id_jurnalindex" class="form-control">
                                                                        <option value="">Pilih Jurnal Index</option>
                                                                        <?php
                                                                            $query = mysqli_query($connection,"SELECT * FROM jurnal_index ORDER BY id_jurnalindex DESC");
                                                                            if(mysqli_num_rows($query) > 0){
                                                                                while($data_jurnal = mysqli_fetch_assoc($query)){
                                                                                    ?>
                                                                                        <option value="<?= $data_jurnal['id_jurnalindex'] ?>"><?= ucwords($data_jurnal['nama_jurnalindex']) ?></option>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                    <span class="form-bar"></span>
                                                                    
                                                                </div> 

                                                                <div class="form-group form-default">
                                                                    <label>Pilih Peringkat Jurnal</label>
                                                                    <select name="peringkat_jurnal" id="peringkat_jurnal" class="form-control">
                                                                    <option value="">Pilih Jurnal Index Dahulu</option>
                                                                    </select>
                                                                    <span class="form-bar"></span>
                                                                    
                                                                </div>

                                                            <div class="form-group form-default">
                                                                <label>Tanggal Publish</label>
                                                                <input type="date" name="tgl_publish" class="form-control" value="<?= $data['tgl_publish'] ?>" required="" >
                                                                <span class="form-bar"></span>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="text" name="institusi_penerbit" class="form-control" value="<?= $data['institusi_penerbit'] ?>" >
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Institusi Penerbit</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <label>Masukkan File PDF Jurnal</label>
                                                                <input type="file" name="file_jurnal" class="form-control">
                                                                <span class="form-bar"></span>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="number" name="jumlah_sitasi" class="form-control" required="" value="<?= $data['jumlah_sitasi'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Jumlah Sitasi</label>
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
                    <script>
                        $(document).ready(function(){
                            $('#id_jurnalindex').change(function(event){
                            // variabel dari nilai combo box kendaraan
                                var id_jurnalindex = $('#id_jurnalindex').val();
                                $('#peringkat_jurnal').removeAttr('disabled');
                                $('#peringkat_jurnal').empty();
                                // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                                $.ajax({
                                    type: 'POST',
                                    url: 'ambil_data.php',
                                    data: 'id_jurnalindex='+id_jurnalindex,
                                    success: function(data){
                                        $('#peringkat_jurnal').append(data);
                                    }
                                });
                            });
                        });
                        
                    </script>
<?php
    include "./partials/bawah.php";
?>              