<?php
include "../../config/connection.php";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=pagelaran/pameran/presentasi.xls");
?>
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