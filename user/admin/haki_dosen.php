
<?php
    $page = 'haki_dosen';
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
                                          <h5 class="m-b-10">Haki Dosen</h5>
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
                                        <a href="./tambah_hakidosen.php"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Tambah Haki</button></a> 
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Haki Dosen</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Dosen</th>
                                                                <th>Judul Haki</th>
                                                                <th>Tanggal Terdaftar</th>
                                                                <th>Jenis</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT haki_dosen.*,dosen.* FROM haki_dosen INNER JOIN dosen USING(nip) ORDER BY haki_dosen.id_hakidosen DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=$data['nama_dosen']?></td>
                                                                        <td><?=ucwords($data['judul_haki'])?></td>
                                                                        <td><?=date("d-M-Y", strtotime($data['tgl_terdaftar']))?></td>
                                                                        <td><?=ucwords($data['jenis'])?></td>
                                                                        <td>
                                                                        <a class="text-warning" href="./detail_hakidosen.php?id=<?php echo $data['id_hakidosen'] ?>"><button class="btn btn-warning waves-effect waves-light" style="margin-bottom:15px;"><i class="fa fa-search"></i></button></a>
                                                                        <a class="text-primary" href="./lihat_hakidosen.php?id=<?php echo $data['id_hakidosen'] ?>"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Lhat Sertif</button></a>
                                                                        <a class="text-danger" href="./hapus_hakidosen.php?id=<?php echo $data['id_hakidosen'] ?>" onclick = "return confirm('Yakin hapus haki dosen?')"><button class="btn btn-danger waves-effect waves-light" style="margin-bottom:15px;">Hapus</button></a>
                                                            
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