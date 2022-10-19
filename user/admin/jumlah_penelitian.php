
<?php
    $page = 'jumlah_penelitian';
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
                                          <h5 class="m-b-10">Jumlah Penelitian</h5>
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
                                        <!-- <a href="./tambah_pengabdian.php"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Tambah Pengabdian</button></a>  -->
                                        <a href="./export_jumlah_penelitian.php"><button class="btn btn-success waves-effect waves-light" style="margin-bottom:15px;">Export Excel</button></a>
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Penelitian DTPS</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Sumber Pembiayaan</th>
                                                                <th>TS-2</th>
                                                                <th>TS-1</th>
                                                                <th>TS</th>
                                                                <th>Jumlah</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT COUNT(*) AS jumlah, SUM(IF(tahun_penelitian=2022,1,0)) as ts, SUM(IF(tahun_penelitian=2021,1,0)) as ts1, SUM(IF(tahun_penelitian=2020,1,0)) as ts2, penelitian.*, dosen.* FROM penelitian INNER JOIN dosen USING(nip) WHERE penelitian.status='terverifikasi' AND dosen.DTPS = 'y' GROUP BY(sumber_dana) ");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['sumber_dana'])?></td>
                                                                        <td><?=ucwords($data['ts2'])?></td>
                                                                        <td><?=ucwords($data['ts1'])?></td>
                                                                        <td><?=ucwords($data['ts'])?></td>
                                                                        <td><?=ucwords($data['jumlah'])?></td>
                                                                        
                                                                    </tr>
                                                                <?php
                                                            }
                                                            $totalQuery = mysqli_query($connection,"SELECT COUNT(*) AS total, SUM(IF(tahun_penelitian=2022,1,0)) as ts, SUM(IF(tahun_penelitian=2021,1,0)) as ts1, SUM(IF(tahun_penelitian=2020,1,0)) as ts2, penelitian.*, dosen.* FROM penelitian INNER JOIN dosen USING(nip) WHERE penelitian.status='terverifikasi' AND dosen.DTPS = 'y'");
                                                            $total = mysqli_fetch_assoc($totalQuery);
                                                            ?>
                                                                <tr>
                                                                    <td><strong>Total Jumlah</strong></td>
                                                                    <td></td>
                                                                    <td><strong><?= $total['ts2'] ?></strong></td>
                                                                    <td><strong><?= $total['ts1'] ?></strong></td>
                                                                    <td><strong><?= $total['ts'] ?></strong></td>
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