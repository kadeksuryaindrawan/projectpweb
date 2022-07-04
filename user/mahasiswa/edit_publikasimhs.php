<?php
$page = 'publikasi_mhs';
$pages = 'mhs';
    include "./partials/atas.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT * FROM publikasi_mhs WHERE id_publikasimhs = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data = mysqli_fetch_assoc($query_check);
        }
        else{
          header('location: ./publikasi_mhs.php');
        }
      }
      else{
        header('location: ./publikasi_mhs.php');
      }
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Publikasi Mahasiswa</h5>
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
                                                        <h5>Edit Publikasi Mahasiswa</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./process/edit_publikasimhs.process.php" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="<?= $id ?>">
                                                            <input type="hidden" name="nim" value="<?= $nim ?>">
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