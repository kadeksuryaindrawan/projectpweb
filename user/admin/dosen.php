
<?php
    $page = 'dosen';
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
                                        <a href="./tambah_dosen.php"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Tambah Dosen</button></a> 
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Dosen Tetap</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>NIP</th>
                                                                <th>Nama Dosen</th>
                                                                <th>Prodi</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php

                                                            $query = mysqli_query($connection, "SELECT users.*,dosen.*,prodi.* FROM users INNER JOIN dosen USING(user_id) INNER JOIN prodi ON dosen.prodi = prodi.kode_prodi ORDER BY users.user_id DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=$data['nip']?></td>
                                                                        <td><?=ucwords($data['nama_dosen'])?></td>
                                                                        <td><?=ucwords($data['nama_prodi'])?></td>
                                                                        <td>
                                                                        <a class="text-warning" href="./detail_dosen.php?nip=<?php echo $data['nip'] ?>"><button class="btn btn-warning waves-effect waves-light" style="margin-bottom:15px;"><i class="fa fa-search"></i></button></a>
                                                                        <a class="text-primary" href="./edit_dosen.php?user_id=<?php echo $data['user_id'] ?>"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Edit</button></a>
                                                                        <a class="text-danger" href="./hapus_dosen.php?user_id=<?php echo $data['user_id'] ?>" onclick = "return confirm('Yakin hapus dosen?')"><button class="btn btn-danger waves-effect waves-light" style="margin-bottom:15px;">Hapus</button></a>
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