<?php
include "../../config/connection.php";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=jumlah_pengabdian.xls");
?>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Jumlah Pengabdian</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Sumber Pembiayaan</th>
                                                                <th>Jumlah</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT COUNT(id_pengabdian) AS jumlah, sumber_dana, status FROM pengabdian WHERE status='terverifikasi' GROUP BY(sumber_dana)");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['sumber_dana'])?></td>
                                                                        <td><?=ucwords($data['jumlah'])?></td>
                                                                        
                                                                    </tr>
                                                                <?php
                                                            }
                                                            $totalQuery = mysqli_query($connection,"SELECT COUNT(id_pengabdian) AS total, sumber_dana, status FROM pengabdian WHERE status='terverifikasi'");
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