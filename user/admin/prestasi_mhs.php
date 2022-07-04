
<?php
    $page = 'prestasi_mhs';
    $pages = 'mhs';
    include "./partials/atas.php";
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Prestasi Mahasiswa</h5>
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
                                        <a href="./tambah_prestasi.php"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Tambah Prestasi</button></a> 
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Prestasi Mahasiswa</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Mahasiswa</th>
                                                                <th>Nama Event</th>
                                                                <th>Tingkat</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT prestasi_mhs.*,mahasiswa.* FROM prestasi_mhs INNER JOIN mahasiswa USING(nim) ORDER BY prestasi_mhs.id_prestasi DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=$data['nama_mahasiswa']?></td>
                                                                        <td><?=ucwords($data['nama_event'])?></td>
                                                                        <td><?=ucwords($data['tingkat'])?></td>
                                                                        <td>
                                                                        <a class="text-warning" href="./detail_prestasi.php?id=<?php echo $data['id_prestasi'] ?>"><button class="btn btn-warning waves-effect waves-light" style="margin-bottom:15px;"><i class="fa fa-search"></i></button></a>
                                                                        <a class="text-primary" href="./lihat_sertif.php?id=<?php echo $data['id_prestasi'] ?>"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Lihat Sertif</button></a>
                                                                        <a class="text-danger" href="./hapus_prestasi.php?id=<?php echo $data['id_prestasi'] ?>" onclick = "return confirm('Yakin hapus prestasi?')"><button class="btn btn-danger waves-effect waves-light" style="margin-bottom:15px;">Hapus</button></a>
                                                            
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                            }
                                                        ?>
                                                        </tbody>
                                                    </table>
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