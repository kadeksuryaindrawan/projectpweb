
<?php
    $page = 'rekognisi_report';
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
                                          <h5 class="m-b-10">Rekognisi</h5>
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
                                        <a href="./export_rekognisi.php"><button class="btn btn-success waves-effect waves-light" style="margin-bottom:15px;">Export Excel</button></a>
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Rekognisi</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Dosen</th>
                                                                <th>Bidang Keahlian</th>
                                                                <th>Rekognisi</th>
                                                                <th class="text-center">Wilayah</th>
                                                                <th class="text-center">Nasional</th>
                                                                <th class="text-center">Internasional</th>
                                                                <th class="text-center">Tahun</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT rekognisi.*,dosen.*,IF(tingkat='wilayah','V','') as wilayah, IF(tingkat='nasional','V','') as nasional, IF(tingkat='internasional','V','') as internasional FROM rekognisi INNER JOIN dosen USING(nip) WHERE dosen.DTPS='y' ORDER BY rekognisi.id DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['nama_dosen'])?></td>
                                                                        <td><?=ucwords($data['bidang_keahlian'])?></td>
                                                                        <td><?=ucfirst($data['rekognisi'])?></td>
                                                                        <td class="text-center"><?=$data['wilayah']?></td>
                                                                        <td class="text-center"><?=$data['nasional']?></td>
                                                                        <td class="text-center"><?=$data['internasional']?></td>
                                                                        <td class="text-center"><?= $data['tahun'] ?></td>
                                                                    </tr>
                                                                <?php
                                                            }

                                                            $totalQuery = mysqli_query($connection,"SELECT COUNT(rekognisi.tahun) as totalTahun, rekognisi.*,dosen.* FROM rekognisi INNER JOIN dosen USING(nip) WHERE dosen.DTPS='y' ORDER BY rekognisi.id DESC");
                                                            $total = mysqli_fetch_assoc($totalQuery);

                                                            $totalQuery2 = mysqli_query($connection,"SELECT COUNT(rekognisi.tingkat) as totalTingkat, rekognisi.*,dosen.* FROM rekognisi INNER JOIN dosen USING(nip) WHERE tingkat='wilayah' AND dosen.DTPS='y' ORDER BY rekognisi.id DESC");
                                                            $total2 = mysqli_fetch_assoc($totalQuery2);

                                                            $totalQuery3 = mysqli_query($connection,"SELECT COUNT(rekognisi.tingkat) as totalTingkat, rekognisi.*,dosen.* FROM rekognisi INNER JOIN dosen USING(nip) WHERE tingkat='nasional' AND dosen.DTPS='y' ORDER BY rekognisi.id DESC");
                                                            $total3 = mysqli_fetch_assoc($totalQuery3);

                                                            $totalQuery4 = mysqli_query($connection,"SELECT COUNT(rekognisi.tingkat) as totalTingkat, rekognisi.*,dosen.* FROM rekognisi INNER JOIN dosen USING(nip) WHERE tingkat='internasional' AND dosen.DTPS='y' ORDER BY rekognisi.id DESC");
                                                            $total4 = mysqli_fetch_assoc($totalQuery4);
                                                            ?>
                                                                <tr>
                                                                    <td><strong>Jumlah</strong></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="text-center"><strong><?= $total2['totalTingkat'] ?></strong></td>
                                                                    <td class="text-center"><strong><?= $total3['totalTingkat'] ?></strong></td>
                                                                    <td class="text-center"><strong><?= $total4['totalTingkat'] ?></strong></td>
                                                                    <td class="text-center"><strong><?= $total['totalTahun'] ?></strong></td>
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