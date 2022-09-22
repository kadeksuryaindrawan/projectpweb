
<?php
    $page = 'dosen_industri';
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
                                          <h5 class="m-b-10">Dosen Industri</h5>
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
                                        <a href="./tambah_dosen_industri.php"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Tambah Dosen Industri</button></a> 
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Dosen Industri</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>NIDK</th>
                                                                <th>Nama</th>
                                                                <th>Pendidikan Terakhir</th>
                                                                <th>Perusahaan</th>
                                                                <th>Bidang</th>
                                                                <th>List Sertifikat</th>
                                                                <th>List Matkul</th>
                                                                <th>Bobot SKS</th>
                                                                <th>Semester</th>
                                                                <th>Tahun</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT * FROM dosen_industri ORDER BY id DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['nidk'])?></td>
                                                                        <td><?=ucwords($data['nama'])?></td>
                                                                        <td><?=ucfirst($data['pendidikan_terakhir'])?></td>
                                                                        <td><?=ucfirst($data['perusahaan'])?></td>
                                                                        <td><?=ucfirst($data['bidang'])?></td>
                                                                        <td><?=ucfirst($data['list_sertifikat'])?></td>
                                                                        <td><?=ucfirst($data['list_matakuliah'])?></td>
                                                                        <td><?=$data['bobot_sks']?></td>
                                                                        <td><?=ucfirst($data['semester'])?></td>
                                                                        <td><?=$data['tahun']?></td>
                                                                        
                                                                        <td>
                                                                        <a class="text-warning" href="./edit_dosen_industri.php?id=<?php echo $data['id'] ?>"><button class="btn btn-warning waves-effect waves-light" style="margin-bottom:15px;">Edit</button></a>
                                                                        <a class="text-danger" href="./hapus_dosen_industri.php?id=<?php echo $data['id'] ?>" onclick = "return confirm('Yakin hapus dosen industri?')"><button class="btn btn-danger waves-effect waves-light" style="margin-bottom:15px;">Hapus</button></a>
                                                                        
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