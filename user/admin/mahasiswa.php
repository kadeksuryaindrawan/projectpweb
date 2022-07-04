
<?php
    $page = 'mahasiswa';
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
                                          <h5 class="m-b-10">Mahasiswa</h5>
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
                                        <a href="./tambah_mahasiswa.php"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Tambah Mahasiswa</button></a> 
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Mahasiswa</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>NIM</th>
                                                                <th>Nama Mahasiswa</th>
                                                                <th>Tahun Diterima</th>
                                                                <th>Prodi</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT mahasiswa.*,prodi.* FROM mahasiswa INNER JOIN prodi ON mahasiswa.prodi = prodi.kode_prodi ORDER BY mahasiswa.nim DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=$data['nim']?></td>
                                                                        <td><?=ucwords($data['nama_mahasiswa'])?></td>
                                                                        <td><?=$data['tahun_diterima']?></td>
                                                                        <td><?=ucwords($data['nama_prodi'])?></td>
                                                                        <td>
                                                                        <a class="text-warning" href="./detail_mahasiswa.php?nim=<?php echo $data['nim'] ?>"><button class="btn btn-warning waves-effect waves-light" style="margin-bottom:15px;"><i class="fa fa-search"></i></button></a>
                                                                        <a class="text-primary" href="./edit_mahasiswa.php?nim=<?php echo $data['nim'] ?>"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Edit</button></a>
                                                                        <a class="text-danger" href="./hapus_mahasiswa.php?nim=<?php echo $data['nim'] ?>" onclick = "return confirm('Yakin hapus mahasiswa?')"><button class="btn btn-danger waves-effect waves-light" style="margin-bottom:15px;">Hapus</button></a>
                                                            
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