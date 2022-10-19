<?php
include "../../config/connection.php";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=rekognisi.xls");
?>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Rekognisi</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Dosen</th>
                                                                <th>Bidang Keahlian</th>
                                                                <th>Rekognisi</th>
                                                                <th class="text-center">Wilayah</th>
                                                                <th class="text-center">Nasional</th>
                                                                <th class="text-center">Internasional</th>
                                                                <th class="text-center">Tahun</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT rekognisi.*,dosen.*,IF(tingkat='wilayah','V','') as wilayah, IF(tingkat='nasional','V','') as nasional, IF(tingkat='internasional','V','') as internasional FROM rekognisi INNER JOIN dosen USING(nip) WHERE dosen.DTPS='y' ORDER BY rekognisi.id DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['nama_dosen'])?></td>
                                                                        <td><?=ucwords($data['bidang_keahlian'])?></td>
                                                                        <td><?=ucfirst($data['rekognisi'])?></td>
                                                                        <td class="text-center"><?=$data['wilayah']?></td>
                                                                        <td class="text-center"><?=$data['nasional']?></td>
                                                                        <td class="text-center"><?=$data['internasional']?></td>
                                                                        <td class="text-center"><?= $data['tahun'] ?></td>
                                                                    </tr>
                                                                <?php
                                                            }

                                                            $totalQuery = mysqli_query($connection,"SELECT COUNT(rekognisi.tahun) as totalTahun, rekognisi.*,dosen.* FROM rekognisi INNER JOIN dosen USING(nip) WHERE dosen.DTPS='y' ORDER BY rekognisi.id DESC");
                                                            $total = mysqli_fetch_assoc($totalQuery);

                                                            $totalQuery2 = mysqli_query($connection,"SELECT COUNT(rekognisi.tingkat) as totalTingkat, rekognisi.*,dosen.* FROM rekognisi INNER JOIN dosen USING(nip) WHERE tingkat='wilayah' AND dosen.DTPS='y' ORDER BY rekognisi.id DESC");
                                                            $total2 = mysqli_fetch_assoc($totalQuery2);

                                                            $totalQuery3 = mysqli_query($connection,"SELECT COUNT(rekognisi.tingkat) as totalTingkat, rekognisi.*,dosen.* FROM rekognisi INNER JOIN dosen USING(nip) WHERE tingkat='nasional' AND dosen.DTPS='y' ORDER BY rekognisi.id DESC");
                                                            $total3 = mysqli_fetch_assoc($totalQuery3);

                                                            $totalQuery4 = mysqli_query($connection,"SELECT COUNT(rekognisi.tingkat) as totalTingkat, rekognisi.*,dosen.* FROM rekognisi INNER JOIN dosen USING(nip) WHERE tingkat='internasional' AND dosen.DTPS='y' ORDER BY rekognisi.id DESC");
                                                            $total4 = mysqli_fetch_assoc($totalQuery4);
                                                            ?>
                                                                <tr>
                                                                    <td><strong>Jumlah</strong></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="text-center"><strong><?= $total2['totalTingkat'] ?></strong></td>
                                                                    <td class="text-center"><strong><?= $total3['totalTingkat'] ?></strong></td>
                                                                    <td class="text-center"><strong><?= $total4['totalTingkat'] ?></strong></td>
                                                                    <td class="text-center"><strong><?= $total['totalTahun'] ?></strong></td>
                                                                </tr>
                                                            <?php
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        