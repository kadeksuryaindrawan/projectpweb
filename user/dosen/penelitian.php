
<?php
    $page = 'penelitian';
    include "./partials/atas.php";
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Penelitian</h5>
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
                                        <a href="./tambah_penelitian.php"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Tambah Penelitian</button></a> 
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Penelitian</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Judul Penelitian</th>
                                                                <th>Nama Ketua</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT penelitian.*,dosen.* FROM penelitian INNER JOIN dosen USING(nip) WHERE penelitian.nip = $nip ORDER BY penelitian.id_penelitian DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['judul_penelitian'])?></td>
                                                                        <td><?=ucwords($data['nama_dosen'])?></td>
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
                                                                        <td>
                                                                        <a class="text-info" href="./detail_penelitian.php?id=<?php echo $data['id_penelitian'] ?>"><button class="btn btn-info waves-effect waves-light" style="margin-bottom:15px;"><i class="fa fa-search"></i></button></a>
                                                                        <a class="text-warning" href="./edit_penelitian.php?id=<?php echo $data['id_penelitian'] ?>"><button class="btn btn-warning waves-effect waves-light" style="margin-bottom:15px;">Edit</button></a>
                                                                        <a class="text-danger" href="./hapus_penelitian.php?id=<?php echo $data['id_penelitian'] ?>" onclick = "return confirm('Yakin hapus penelitian?')"><button class="btn btn-danger waves-effect waves-light" style="margin-bottom:15px;">Hapus</button></a> <br>
                                                                        <a class="text-primary" href="./lihat_file_proposal_penelitian.php?id=<?php echo $data['id_penelitian'] ?>"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Lihat Proposal</button></a>
                                                                        <a class="text-primary" href="./lihat_file_laporan_penelitian.php?id=<?php echo $data['id_penelitian'] ?>"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Lihat Laporan</button></a>
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