
<?php
    $page = 'pubuku';
    include "./partials/atas.php";
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Publikasi Buku</h5>
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
                                        <a href="./tambah_buku.php"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Tambah Buku</button></a> 
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Buku</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Judul Buku</th>
                                                                <th>Penulis Utama</th>
                                                                <th>Penulis Buku</th>
                                                                <th>Penerbit</th>
                                                                <th>Tahun Terbit</th>
                                                                <th>Status</th>
                                                                <th>ISBN</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT publikasi_buku.*,dosen.* FROM publikasi_buku INNER JOIN dosen USING(nip) ORDER BY publikasi_buku.id_publikasibuku DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['judul_buku'])?></td>
                                                                        <td><?=ucwords($data['nama_dosen'])?></td>
                                                                        <td><?=ucwords($data['penulis_buku'])?></td>
                                                                        <td><?=ucwords($data['penerbit'])?></td>
                                                                        <td><?=ucwords($data['tahun_terbit'])?></td>
                                                                        <?php
                                                                            if($data['status'] == 'terverifikasi'){
                                                                                ?>
                                                                                    <td class="text-success"><?=ucwords($data['status'])?></td>
                                                                                <?php
                                                                            }
                                                                            else{
                                                                                ?>
                                                                                    <td class="text-danger"><?=ucwords($data['status'])?></td>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                        <td><?=$data['isbn']?></td>
                                                                        <td>
                                                                        <a class="text-primary" href="./edit_buku.php?id=<?php echo $data['id_publikasibuku'] ?>"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Edit</button></a>
                                                                        <a class="text-danger" href="./hapus_buku.php?id=<?php echo $data['id_publikasibuku'] ?>" onclick = "return confirm('Yakin hapus buku?')"><button class="btn btn-danger waves-effect waves-light" style="margin-bottom:15px;">Hapus</button></a>
                                                                        <?php
                                                                            if($data['status'] == 'belum terverifikasi'){
                                                                                ?>
                                                                                    <a class="text-success" href="./verifikasi_buku.php?id=<?php echo $data['id_publikasibuku'] ?>" onclick = "return confirm('Yakin verifikasi buku?')"><button class="btn btn-success waves-effect waves-light" style="margin-bottom:15px;">Verifikasi</button></a>
                                                                                <?php
                                                                            }
                                                                        ?>
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