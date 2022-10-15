<?php
include "../../config/connection.php";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=dosen_industri.xls");
?>
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
                                                                <th>Nama Dosen</th>
                                                                <th>NIDK</th>
                                                                <th>Perusahaan</th>
                                                                <th>Pendidikan Tertinggi</th>
                                                                <th>Bidang Keahlian</th>
                                                                <th>Sertifikat Profesi</th>
                                                                <th>Mata Kuliah</th>
                                                                <th>Bobot SKS</th>
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
                                                                        <td><?=ucwords($data['nama'])?></td>
                                                                        <td><?=ucwords($data['nidk'])?></td>
                                                                        <td><?=ucfirst($data['perusahaan'])?></td>
                                                                        <td><?=ucfirst($data['pendidikan_terakhir'])?></td>
                                                                        <td><?=ucfirst($data['bidang'])?></td>
                                                                        <td><?=ucfirst($data['list_sertifikat'])?></td>
                                                                        <td><?=ucfirst($data['list_matakuliah'])?></td>
                                                                        <td><?=$data['bobot_sks']?></td>
                                                                        
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
                                        