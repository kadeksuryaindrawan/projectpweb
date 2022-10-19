
<?php
    $page = 'publikasi_ilmiah';
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
                                          <h5 class="m-b-10">Publikasi Ilmiah DTPS</h5>
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
                                        <a href="./export_publikasi_ilmiah.php"><button class="btn btn-success waves-effect waves-light" style="margin-bottom:15px;">Export Excel</button></a>
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Publikasi Ilmiah DTPS</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Media Publikasi</th>
                                                                <th>TS-2</th>
                                                                <th>TS-1</th>
                                                                <th>TS</th>
                                                                <th>Jumlah</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT COUNT(*) AS jumlah, SUM(IF(YEAR(publikasi_dosen.tgl_publish)=2022,1,0)) as ts, SUM(IF(YEAR(publikasi_dosen.tgl_publish)=2021,1,0)) as ts1, SUM(IF(YEAR(publikasi_dosen.tgl_publish)=2020,1,0)) as ts2, dosen.*, peringkat_jurnal.*, publikasi_dosen.* FROM dosen INNER JOIN publikasi_dosen USING(nip) INNER JOIN peringkat_jurnal ON publikasi_dosen.peringkat_jurnal = peringkat_jurnal.id_peringkatjurnal WHERE dosen.DTPS = 'y' GROUP BY(peringkat_jurnal.jenis_media_publikasi)");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['jenis_media_publikasi'])?></td>
                                                                        <td><?= $data['ts2'] ?></td>
                                                                        <td><?= $data['ts1'] ?></td>
                                                                        <td><?= $data['ts'] ?></td>
                                                                        <td><?= $data['jumlah'] ?></td>
                                                                        
                                                                    </tr>
                                                                <?php
                                                            }
                                                            $totalQuery = mysqli_query($connection,"SELECT COUNT(*) AS total, SUM(IF(YEAR(publikasi_dosen.tgl_publish)=2022,1,0)) as ts, SUM(IF(YEAR(publikasi_dosen.tgl_publish)=2021,1,0)) as ts1, SUM(IF(YEAR(publikasi_dosen.tgl_publish)=2020,1,0)) as ts2, dosen.*, peringkat_jurnal.*, publikasi_dosen.* FROM dosen INNER JOIN publikasi_dosen USING(nip) INNER JOIN peringkat_jurnal ON publikasi_dosen.peringkat_jurnal = peringkat_jurnal.id_peringkatjurnal WHERE dosen.DTPS = 'y'");
                                                            $total = mysqli_fetch_assoc($totalQuery);
                                                            ?>
                                                                <tr>
                                                                    <td><strong>Total Jumlah</strong></td>
                                                                    <td></td>
                                                                    <td><?= $total['ts2'] ?></td>
                                                                    <td><?= $total['ts1'] ?></td>
                                                                    <td><?= $total['ts'] ?></td>
                                                                    <td><strong><?= $total['total'] ?></strong></td>
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