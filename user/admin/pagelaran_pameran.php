
<?php
    $page = 'pagelaran_pameran';
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
                                          <h5 class="m-b-10">Pagelaran / Pameran / Presentasi</h5>
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
                                        <!-- <a href="./tambah_hakidosen.php"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Tambah Haki</button></a>  -->
                                        <a href="./export_pagelaran_pameran.php"><button class="btn btn-success waves-effect waves-light" style="margin-bottom:15px;">Export Excel</button></a>
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Pagelaran / Pameran / Presentasi</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Jenis</th>
                                                                <th>Jumlah</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT COUNT(id_hakidosen) AS jumlah, jenis FROM haki_dosen GROUP BY (jenis) ORDER BY id_hakidosen DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['jenis'])?></td>
                                                                        <td><?=$data['jumlah']?></td>
                                                                        
                                                                    </tr>
                                                                    
                                                                <?php
                                                            }
                                                            $totalQuery = mysqli_query($connection,"SELECT COUNT(id_hakidosen) as total FROM haki_dosen");
                                                            $total = mysqli_fetch_assoc($totalQuery);
                                                            ?>
                                                                <tr>
                                                                    <td><strong>Total Jumlah</strong></td>
                                                                    <td></td>
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