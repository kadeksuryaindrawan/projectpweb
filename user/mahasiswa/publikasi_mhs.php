
<?php
    $page = 'publikasi_mhs';
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
                                        <a href="./tambah_publikasimhs.php"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Tambah Publikasi Mahasiswa</button></a> 
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Publikasi Mahasiswa</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Judul Jurnal</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT publikasi_mhs.*,mahasiswa.* FROM publikasi_mhs INNER JOIN mahasiswa USING(nim) WHERE publikasi_mhs.nim = $nim ORDER BY publikasi_mhs.id_publikasimhs DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['judul_jurnal'])?></td>
                                                                        <td>
                                                                        <a class="text-info" href="./detail_publikasimhs.php?id=<?php echo $data['id_publikasimhs'] ?>"><button class="btn btn-info waves-effect waves-light" style="margin-bottom:15px;"><i class="fa fa-search"></i></button></a>
                                                                        <a class="text-primary" href="./lihat_file_jurnal_publikasimhs.php?id=<?php echo $data['id_publikasimhs'] ?>"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Lihat Jurnal</button></a>
                                                                        <a class="text-warning" href="./edit_publikasimhs.php?id=<?php echo $data['id_publikasimhs'] ?>"><button class="btn btn-warning waves-effect waves-light" style="margin-bottom:15px;">Edit</button></a>
                                                                        <a class="text-danger" href="./hapus_publikasimhs.php?id=<?php echo $data['id_publikasimhs'] ?>" onclick = "return confirm('Yakin hapus publikasi mahasiswa?')"><button class="btn btn-danger waves-effect waves-light" style="margin-bottom:15px;">Hapus</button></a>
                                                                        
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