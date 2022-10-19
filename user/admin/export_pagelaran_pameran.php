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
                                                                <th>TS-2</th>
                                                                <th>TS-1</th>
                                                                <th>TS</th>
                                                                <th>Jumlah</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT COUNT(*) AS jumlah, SUM(IF(YEAR(haki_dosen.tgl_terdaftar)=2022,1,0)) as ts, SUM(IF(YEAR(haki_dosen.tgl_terdaftar)=2021,1,0)) as ts1, SUM(IF(YEAR(haki_dosen.tgl_terdaftar)=2020,1,0)) as ts2, haki_dosen.*, dosen.* FROM haki_dosen INNER JOIN dosen USING(nip) WHERE dosen.DTPS = 'y' GROUP BY (jenis) ORDER BY id_hakidosen DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['jenis'])?></td>
                                                                        <td><?=$data['ts2']?></td>
                                                                        <td><?=$data['ts1']?></td>
                                                                        <td><?=$data['ts']?></td>
                                                                        <td><?=$data['jumlah']?></td>
                                                                        
                                                                    </tr>
                                                                    
                                                                <?php
                                                            }
                                                            $totalQuery = mysqli_query($connection,"SELECT COUNT(*) AS total, SUM(IF(YEAR(haki_dosen.tgl_terdaftar)=2022,1,0)) as ts, SUM(IF(YEAR(haki_dosen.tgl_terdaftar)=2021,1,0)) as ts1, SUM(IF(YEAR(haki_dosen.tgl_terdaftar)=2020,1,0)) as ts2, haki_dosen.*, dosen.* FROM haki_dosen INNER JOIN dosen USING(nip) WHERE dosen.DTPS = 'y'");
                                                            $total = mysqli_fetch_assoc($totalQuery);
                                                            ?>
                                                                <tr>
                                                                    <td><strong>Total Jumlah</strong></td>
                                                                    <td></td>
                                                                    <td><strong><?= $total['ts2'] ?></strong></td>
                                                                    <td><strong><?= $total['ts1'] ?></strong></td>
                                                                    <td><strong><?= $total['ts'] ?></strong></td>
                                                                    <td><strong><?= $total['total'] ?></strong></td>
                                                                </tr>
                                                            <?php
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>