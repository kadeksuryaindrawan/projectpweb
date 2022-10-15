
<?php
include "../../config/connection.php";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=publikasi_ilmiah.xls");
?>
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
                                                                <th>Jumlah</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        
                                                            $query = mysqli_query($connection, "SELECT COUNT(publikasi_dosen.id_publikasidosen) AS jumlah, peringkat_jurnal.* FROM publikasi_dosen INNER JOIN peringkat_jurnal ON publikasi_dosen.peringkat_jurnal = peringkat_jurnal.id_peringkatjurnal GROUP BY(peringkat_jurnal.jenis_media_publikasi)");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['jenis_media_publikasi'])?></td>
                                                                        <td><?= $data['jumlah'] ?></td>
                                                                        
                                                                    </tr>
                                                                <?php
                                                            }
                                                            $totalQuery = mysqli_query($connection,"SELECT COUNT(id_publikasidosen) as total FROM publikasi_dosen");
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