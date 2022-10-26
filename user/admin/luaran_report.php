
<?php
    $page = 'luaran_report';
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
                                          <h5 class="m-b-10">Luaran</h5>
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
                                        <a href="./export_luaran.php"><button class="btn btn-success waves-effect waves-light" style="margin-bottom:15px;">Export Excel</button></a>
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Luaran DTPS</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Judul Luaran Penelitian/PKM</th>
                                                                <th>Tahun</th>
                                                                <th>Keterangan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                    <tr>
                                                                        <th scope="row"><strong>I</strong></th>
                                                                        <td>
                                                                        <strong>HKI :</strong> <br>
                                                                            a) Paten
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT haki_dosen.*, dosen.*,YEAR(tgl_terdaftar) as tahun FROM haki_dosen INNER JOIN dosen USING(nip) WHERE dosen.DTPS = 'y' AND haki_dosen.jenis = 'paten' ORDER BY haki_dosen.id_hakidosen DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"></th>
                                                                        <td><?=$nomor++.". ".ucwords($data['judul_haki'])?></td>
                                                                        <td><?= $data['tahun'] ?></td>
                                                                        <td><?= ucwords($data['no_haki']) ?></td>
                                                                    </tr>
                                                                <?php
                                                            }

                                                            $totalQuery = mysqli_query($connection,"SELECT COUNT(*) as total,haki_dosen.*, dosen.*,YEAR(tgl_terdaftar) as tahun FROM haki_dosen INNER JOIN dosen USING(nip) WHERE dosen.DTPS = 'y' AND haki_dosen.jenis = 'paten' ORDER BY haki_dosen.id_hakidosen DESC");
                                                            $total = mysqli_fetch_assoc($totalQuery);
                                                            ?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><strong>Jumlah</strong></td>
                                                                    <td><strong>Na = <?= $total['total'] ?></strong></td>
                                                                    <td></td>
                                                                </tr>
                                                            <?php
                                                        ?>

                                                                    <tr>
                                                                        <th scope="row"><strong>II</strong></th>
                                                                        <td>
                                                                           <strong>HKI :</strong> <br>
                                                                            a) Hak Cipta
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT haki_dosen.*, dosen.*,YEAR(tgl_terdaftar) as tahun FROM haki_dosen INNER JOIN dosen USING(nip) WHERE dosen.DTPS = 'y' AND haki_dosen.jenis = 'hak cipta' ORDER BY haki_dosen.id_hakidosen DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"></th>
                                                                        <td><?=$nomor++.". ".ucwords($data['judul_haki'])?></td>
                                                                        <td><?= $data['tahun'] ?></td>
                                                                        <td><?= ucwords($data['no_haki']) ?></td>
                                                                    </tr>
                                                                <?php
                                                            }

                                                            $totalQuery = mysqli_query($connection,"SELECT COUNT(*) as total,haki_dosen.*, dosen.*,YEAR(tgl_terdaftar) as tahun FROM haki_dosen INNER JOIN dosen USING(nip) WHERE dosen.DTPS = 'y' AND haki_dosen.jenis = 'hak cipta' ORDER BY haki_dosen.id_hakidosen DESC");
                                                            $total = mysqli_fetch_assoc($totalQuery);
                                                            ?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><strong>Jumlah</strong></td>
                                                                    <td><strong>Nb = <?= $total['total'] ?></strong></td>
                                                                    <td></td>
                                                                </tr>
                                                            <?php
                                                        ?>
                                                        
                                                        <tr>
                                                                        <th scope="row"><strong>III</strong></th>
                                                                        <td>
                                                                            <strong>Teknologi Tepat Guna</strong>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT teknologi_tepat_guna.*, dosen.* FROM teknologi_tepat_guna INNER JOIN dosen USING(nip) WHERE dosen.DTPS = 'y' ORDER BY teknologi_tepat_guna.id DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"></th>
                                                                        <td><?=$nomor++.". ".ucwords($data['judul'])?></td>
                                                                        <td><?= $data['tahun'] ?></td>
                                                                        <td><?= ucwords($data['deskripsi']) ?></td>
                                                                    </tr>
                                                                <?php
                                                            }

                                                            $totalQuery = mysqli_query($connection,"SELECT COUNT(*) as total, teknologi_tepat_guna.*, dosen.* FROM teknologi_tepat_guna INNER JOIN dosen USING(nip) WHERE dosen.DTPS = 'y' ORDER BY teknologi_tepat_guna.id DESC");
                                                            $total = mysqli_fetch_assoc($totalQuery);
                                                            ?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><strong>Jumlah</strong></td>
                                                                    <td><strong>Nc = <?= $total['total'] ?></strong></td>
                                                                    <td></td>
                                                                </tr>
                                                            <?php
                                                        ?>

                                                                    <tr>
                                                                        <th scope="row"><strong>IV</strong></th>
                                                                        <td>
                                                                            <strong>Buku ber-ISBN</strong>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT publikasi_buku.*, dosen.* FROM publikasi_buku INNER JOIN dosen USING(nip) WHERE dosen.DTPS = 'y' ORDER BY publikasi_buku.id_publikasibuku DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"></th>
                                                                        <td><?=$nomor++.". ".ucwords($data['judul_buku'])?></td>
                                                                        <td><?= $data['tahun_terbit'] ?></td>
                                                                        <td><?= ucwords($data['penerbit']) ?> ISBN <?= ucwords($data['isbn']) ?></td>
                                                                    </tr>
                                                                <?php
                                                            }

                                                            $totalQuery = mysqli_query($connection,"SELECT COUNT(*) as total, publikasi_buku.*, dosen.* FROM publikasi_buku INNER JOIN dosen USING(nip) WHERE dosen.DTPS = 'y' ORDER BY publikasi_buku.id_publikasibuku DESC");
                                                            $total = mysqli_fetch_assoc($totalQuery);
                                                            ?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><strong>Jumlah</strong></td>
                                                                    <td><strong>Nd = <?= $total['total'] ?></strong></td>
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