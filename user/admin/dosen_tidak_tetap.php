
<?php
    $page = 'dosen_tidak_tetap';
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
                                        <a href="./tambah_dosen_tidak_tetap.php"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Tambah Dosen</button></a> 
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Dosen Tidak Tetap</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Dosen</th>
                                                                <th>NIDN</th>
                                                                <th>Pendidikan Pasca Sarjana</th>
                                                                <th>Bidang Keahlian</th>
                                                                <th>Jabatan Akademik</th>
                                                                <th>Sertifikat Kompetensi</th>
                                                                <th>Matakuliah yang diampu</th>
                                                                <th>Kesesuaian Bidang</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT jabatan.*,dosen.*,mengajar.*,kompetensi.* FROM jabatan INNER JOIN dosen ON jabatan.id = dosen.jabatan_akademik LEFT JOIN mengajar ON mengajar.nip = dosen.nip LEFT JOIN kompetensi ON mengajar.nip = kompetensi.nip WHERE dosen.status_dosen = 'tidak_tetap' AND dosen.prodi = mengajar.kode_prodi GROUP BY dosen.nip ORDER BY dosen.nip DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['nama_dosen'])?></td>
                                                                        <td><?=$data['nidn']?></td>
                                                                        <td><?=ucwords($data['pendidikan_terakhir'])?></td>
                                                                        <td><?=ucwords($data['bidang_keahlian'])?></td>
                                                                        <td><?=ucwords($data['nama_jabatan'])?></td>
                                                                        <td><?=ucwords($data['nama_sertif'])?></td>
                                                                        <td><?=ucwords($data['nama_matakuliah'])?></td>
                                                                        <td><?=ucwords($data['kesesuaian_bidang'])?></td>
                                                                        <td>
                                                                        <!-- <a class="text-warning" href="./detail_dosen.php?nip=<?php echo $data['nip'] ?>"><button class="btn btn-warning waves-effect waves-light" style="margin-bottom:15px;"><i class="fa fa-search"></i></button></a> -->
                                                                        <a class="text-primary" href="./edit_dosen_tidak_tetap.php?user_id=<?php echo $data['user_id'] ?>"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Edit</button></a>
                                                                        <a class="text-danger" href="./hapus_dosen_tidak_tetap.php?user_id=<?php echo $data['user_id'] ?>" onclick = "return confirm('Yakin hapus dosen?')"><button class="btn btn-danger waves-effect waves-light" style="margin-bottom:15px;">Hapus</button></a>
                                                            
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