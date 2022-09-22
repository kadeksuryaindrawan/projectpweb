
<?php
    $page = 'ewmp';
    include "./partials/atas.php";
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">EWMP</h5>
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
                                        <a href="./tambah_ewmp.php"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Tambah EWMP</button></a> 
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar EWMP</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Dosen</th>
                                                                <th>Tahun</th>
                                                                <th>Pendidikan Prodi</th>
                                                                <th>Pendidikan Prodi Lain</th>
                                                                <th>Pendidikan PT Luar</th>
                                                                <th>Penelitian</th>
                                                                <th>PKM</th>
                                                                <th>Penunjang</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT ewmp.*,dosen.* FROM ewmp INNER JOIN dosen USING(nip) ORDER BY ewmp.id DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['nama_dosen'])?></td>
                                                                        <td><?=$data['tahun']?></td>
                                                                        <td><?=$data['pendidikan_prodi']?></td>
                                                                        <td><?=$data['pendidikan_prodi_lain']?></td>
                                                                        <td><?=$data['pendidikan_pt_luar']?></td>
                                                                        <td><?=$data['penelitian']?></td>
                                                                        <td><?=$data['pkm']?></td>
                                                                        <td><?=$data['penunjang']?></td>
                                                                        
                                                                        <td>
                                                                        <a class="text-warning" href="./edit_ewmp.php?id=<?php echo $data['id'] ?>"><button class="btn btn-warning waves-effect waves-light" style="margin-bottom:15px;">Edit</button></a>
                                                                        <a class="text-danger" href="./hapus_ewmp.php?id=<?php echo $data['id'] ?>" onclick = "return confirm('Yakin hapus EWMP?')"><button class="btn btn-danger waves-effect waves-light" style="margin-bottom:15px;">Hapus</button></a>
                                                                        
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