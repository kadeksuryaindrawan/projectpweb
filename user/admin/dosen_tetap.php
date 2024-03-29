
<?php
    $page = 'dosen_tetap';
    $pages = 'report';
    include "./partials/atas.php";
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Dosen Tetap</h5>
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
                                        
                                        <a href="./export_dosen_tetap.php"><button class="btn btn-success waves-effect waves-light" style="margin-bottom:15px;">Export Excel</button></a>
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
                                                                <th>Nama Dosen</th>
                                                                <th>NIDN</th>
                                                                <th>Pendidikan Pasca Sarjana</th>
                                                                <th>Bidang Keahlian</th>
                                                                <th>DTPS</th>
                                                                <th>Jabatan Akademik</th>
                                                                <th>Sertifikat Kompetensi</th>
                                                                <th>Matakuliah yang diampu</th>
                                                                <th>Kesesuaian Bidang</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT jabatan.*,dosen.*,mengajar.*,kompetensi.* FROM jabatan INNER JOIN dosen ON jabatan.id = dosen.jabatan_akademik LEFT JOIN mengajar ON mengajar.nip = dosen.nip LEFT JOIN kompetensi ON mengajar.nip = kompetensi.nip WHERE dosen.status_dosen = 'tetap' AND dosen.prodi = mengajar.kode_prodi GROUP BY mengajar.kode_prodi ORDER BY dosen.nip DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['nama_dosen'])?></td>
                                                                        <td><?=$data['nidn']?></td>
                                                                        <td><?=ucwords($data['pendidikan_terakhir'])?></td>
                                                                        <td><?=ucwords($data['bidang_keahlian'])?></td>
                                                                        <td>
                                                                            <?php
                                                                                if($data['DTPS'] == 'y'){
                                                                                    ?>
                                                                                        V
                                                                                    <?php
                                                                                }

                                                                                if($data['DTPS'] == 'n'){
                                                                                    ?>
                                                                                        
                                                                                    <?php
                                                                                }
                                                                            ?>    
                                                                        <td><?=ucwords($data['nama_jabatan'])?></td>
                                                                        <td><?=ucwords($data['nama_sertif'])?></td>
                                                                        <td><?=ucwords($data['nama_matakuliah'])?></td>
                                                                        <td>
                                                                        <?php
                                                                                if($data['kesesuaian_bidang'] == 'y'){
                                                                                    ?>
                                                                                        V
                                                                                    <?php
                                                                                }

                                                                                if($data['kesesuaian_bidang'] == 'n'){
                                                                                    ?>
                                                                                        
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                            }

                                                            $totalQuery = mysqli_query($connection,"SELECT jabatan.*,COUNT(dosen.nip) as total,COUNT(dosen.DTPS) as totalDTPS,dosen.*,mengajar.*,kompetensi.* FROM jabatan INNER JOIN dosen ON jabatan.id = dosen.jabatan_akademik LEFT JOIN mengajar ON mengajar.nip = dosen.nip LEFT JOIN kompetensi ON mengajar.nip = kompetensi.nip WHERE dosen.status_dosen = 'tetap' AND dosen.prodi = mengajar.kode_prodi GROUP BY dosen.nip ORDER BY dosen.nip DESC");
                                                            $total = mysqli_fetch_assoc($totalQuery);
                                                            ?>
                                                                <tr>
                                                                    <td><strong>Jumlah</strong></td>
                                                                    <td><strong>NDT : <?= $total['total'] ?></strong></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td><strong>NDTPS : <?= $total['totalDTPS'] ?></strong></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            <?php
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