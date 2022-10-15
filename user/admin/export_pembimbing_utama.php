<?php
include "../../config/connection.php";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=pemimbing_utama.xls");
?>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Pembimbing Utama</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Dosen</th>
                                                                <th>Prodi</th>
                                                                <th>Jumlah Bimbingan</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT dosen.*,pembimbing_utama.*,prodi.* FROM dosen INNER JOIN pembimbing_utama USING(nip) INNER JOIN prodi USING(kode_prodi) ORDER BY pembimbing_utama.id DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['nama_dosen'])?></td>
                                                                        <td><?=ucwords($data['nama_prodi'])?></td>
                                                                        <td><?=ucwords($data['jumlah_bimbingan'])?></td>
                                                                        <td>
                                                                        <a class="text-warning" href="./edit_pembimbing_utama.php?id=<?php echo $data['id'] ?>"><button class="btn btn-warning waves-effect waves-light" style="margin-bottom:15px;">Edit</button></a>
                                                                        <a class="text-danger" href="./hapus_pembimbing_utama.php?id=<?php echo $data['id'] ?>" onclick = "return confirm('Yakin hapus pembimbing utama?')"><button class="btn btn-danger waves-effect waves-light" style="margin-bottom:15px;">Hapus</button></a>
                                                                        
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
                                        