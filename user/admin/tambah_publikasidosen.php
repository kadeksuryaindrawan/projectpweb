<?php
$page = 'publikasi_dosen';
$pages = 'dsn';
    include "./partials/atas.php";
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
                                                        <h5>Tambah Publikasi Dosen</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">

                                                        <form class="form-material" method="POST" action="./process/tambah_publikasidosen.process.php" enctype="multipart/form-data">
                                                            
                                                        <div class="form-group form-default">
                                                                
                                                                <label>Pilih Dosen</label>
                                                                    <select name="nip" id="" class="form-control" required>
                                                                        <option value="">Pilih Dosen</option>
                                                                        <?php
                                                                            $query = mysqli_query($connection,"SELECT * FROM dosen ORDER BY nip ASC");
                                                                            if(mysqli_num_rows($query) > 0){
                                                                                while($data = mysqli_fetch_assoc($query)){
                                                                                    ?>
                                                                                        <option value="<?= $data['nip'] ?>"><?= ucwords($data['nama_dosen']) ?></option>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                    <span class="form-bar"></span>
                                                                    
                                                                </div> 
                                                            <div class="form-group form-default">
                                                                <input type="text" name="judul_jurnal" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Judul Jurnal</label>
                                                            </div> 

                                                            <div class="form-group form-default">
                                                                <input type="text" name="nama_jurnal" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Nama Jurnal</label>
                                                            </div> 

                                                                <div class="form-group form-default">
                                                                    <label>Pilih Jurnal Index</label>
                                                                    <select name="id_jurnalindex" id="id_jurnalindex" class="form-control" required>
                                                                        <option value="">Pilih Jurnal Index</option>
                                                                        <?php
                                                                            $query = mysqli_query($connection,"SELECT * FROM jurnal_index ORDER BY id_jurnalindex DESC");
                                                                            if(mysqli_num_rows($query) > 0){
                                                                                while($data = mysqli_fetch_assoc($query)){
                                                                                    ?>
                                                                                        <option value="<?= $data['id_jurnalindex'] ?>"><?= ucwords($data['nama_jurnalindex']) ?></option>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                    <span class="form-bar"></span>
                                                                    
                                                                </div> 

                                                                <div class="form-group form-default">
                                                                    <label>Pilih Peringkat Jurnal</label>
                                                                    <select name="peringkat_jurnal" id="peringkat_jurnal" class="form-control" disabled required>
                                                                    <option value="">Pilih Jurnal Index Dahulu</option>
                                                                    </select>
                                                                    <span class="form-bar"></span>
                                                                    
                                                                </div>

                                                            <div class="form-group form-default">
                                                                <label>Tanggal Publish</label>
                                                                <input type="date" name="tgl_publish" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="text" name="institusi_penerbit" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Institusi Penerbit</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <label>Masukkan File PDF Jurnal</label>
                                                                <input type="file" name="file_jurnal" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="number" name="jumlah_sitasi" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Jumlah Sitasi</label>
                                                            </div>

                                                            <input type="submit" name="submit" class="btn btn-success waves-effect waves-light" value="Tambah">
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