<?php
include "../../config/connection.php";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ewmp.xls");
?>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar EWMP</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Dosen</th>
                                                                <th>DTPS</th>
                                                                <th>Pendidikan Prodi</th>
                                                                <th>Pendidikan Prodi Lain</th>
                                                                <th>Pendidikan PT Luar</th>
                                                                <th>Penelitian</th>
                                                                <th>PKM</th>
                                                                <th>Penunjang</th>
                                                                <th>Jumlah(sks)</th>
                                                                <th>Rata Per Semester</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT ewmp.*, (pendidikan_prodi + pendidikan_prodi_lain + pendidikan_pt_luar + penelitian + pkm + penunjang) as total, ((pendidikan_prodi + pendidikan_prodi_lain + pendidikan_pt_luar + penelitian + pkm + penunjang)/2) as rata, dosen.* FROM ewmp INNER JOIN dosen USING(nip)  GROUP BY(dosen.nama_dosen) ORDER BY ewmp.id DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['nama_dosen'])?></td>
                                                                        <td>
                                                                            <?php
                                                                                if($data['DTPS'] == 'y'){
                                                                                    ?>
                                                                                        V
                                                                                    <?php
                                                                                }
                                                                                if($data['DTPS'] == 'n'){
                                                                                    ?>
                                                                                        
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                            
                                                                        </td>
                                                                        <td><?=str_replace(".",",",$data['pendidikan_prodi'])?></td>
                                                                        <td><?=str_replace(".",",",$data['pendidikan_prodi_lain'])?></td>
                                                                        <td><?=str_replace(".",",",$data['pendidikan_pt_luar'])?></td>
                                                                        <td><?=str_replace(".",",",$data['penelitian'])?></td>
                                                                        <td><?=str_replace(".",",",$data['pkm'])?></td>
                                                                        <td><?=str_replace(".",",",$data['penunjang'])?></td>
                                                                        <td><?=number_format($data['total'],3,",",".")?></td>
                                                                        <td><?=number_format($data['rata'],2,",",".")?></td>
                                                                    </tr>
                                                                <?php
                                                            }

                                                            $totalQuery = mysqli_query($connection,"SELECT ewmp.*,dosen.*, AVG(pendidikan_prodi + pendidikan_prodi_lain + pendidikan_pt_luar + penelitian + pkm + penunjang) AS ratadtj, AVG((pendidikan_prodi + pendidikan_prodi_lain + pendidikan_pt_luar + penelitian + pkm + penunjang)/2) as ratadtr FROM ewmp INNER JOIN dosen USING(nip) WHERE dosen.DTPS = 'n'");
                                                            $total = mysqli_fetch_assoc($totalQuery);
                                                            ?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td><strong>Rata-rata DT</strong></td>
                                                                    <td><strong><?= number_format($total['ratadtj'],2,",",".") ?></strong></td>
                                                                    <td><strong><?= number_format($total['ratadtr'],2,",",".") ?></strong></td>
                                                                </tr>
                                                            <?php

                                                            $totalQuery = mysqli_query($connection,"SELECT ewmp.*,dosen.*, AVG(pendidikan_prodi + pendidikan_prodi_lain + pendidikan_pt_luar + penelitian + pkm + penunjang) AS ratadtj, AVG((pendidikan_prodi + pendidikan_prodi_lain + pendidikan_pt_luar + penelitian + pkm + penunjang)/2) as ratadtr FROM ewmp INNER JOIN dosen USING(nip) WHERE dosen.DTPS = 'y'");
                                                            $total = mysqli_fetch_assoc($totalQuery);
                                                            ?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td><strong>Rata-rata DTPS</strong></td>
                                                                    <td><strong><?= number_format($total['ratadtj'],2,",",".") ?></strong></td>
                                                                    <td><strong><?= number_format($total['ratadtr'],2,",",".") ?></strong></td>
                                                                </tr>
                                                            <?php
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        