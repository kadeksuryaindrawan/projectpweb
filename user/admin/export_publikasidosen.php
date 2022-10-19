<?php
include "../../config/connection.php";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=publikasi_dosen.xls");
?>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Karya Ilmiah DTPS</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Dosen</th>
                                                                <th>Judul Artikel</th>
                                                                <th>Jumlah Sitasi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT publikasi_dosen.*,dosen.* FROM publikasi_dosen INNER JOIN dosen USING(nip) WHERE dosen.DTPS='y' ORDER BY publikasi_dosen.id_publikasidosen DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['nama_dosen'])?></td>
                                                                        <td><?=ucwords($data['judul_jurnal'])?></td>
                                                                        <td><?=ucwords($data['jumlah_sitasi'])?></td>
                                                                    </tr>
                                                                <?php
                                                            }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        