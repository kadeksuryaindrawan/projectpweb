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
                                                                <th>Tingkat</th>
                                                                <th>Tahun</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT rekognisi.*,dosen.* FROM rekognisi INNER JOIN dosen USING(nip) ORDER BY rekognisi.id DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['nama_dosen'])?></td>
                                                                        <td><?=ucwords($data['bidang_keahlian'])?></td>
                                                                        <td><?=ucfirst($data['rekognisi'])?></td>
                                                                        <td><?=ucwords($data['tingkat'])?></td>
                                                                        <td><?= $data['tahun'] ?></td>
                                                                        <td>
                                                                        <a class="text-primary" href="./lihat_file_rekognisi.php?id=<?php echo $data['id'] ?>"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Lihat File</button></a>
                                                                        <a class="text-warning" href="./edit_rekognisi.php?id=<?php echo $data['id'] ?>"><button class="btn btn-warning waves-effect waves-light" style="margin-bottom:15px;">Edit</button></a>
                                                                        <a class="text-danger" href="./hapus_rekognisi.php?id=<?php echo $data['id'] ?>" onclick = "return confirm('Yakin hapus rekognisi?')"><button class="btn btn-danger waves-effect waves-light" style="margin-bottom:15px;">Hapus</button></a>
                                                                        
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                            }

                                                            $totalQuery = mysqli_query($connection,"SELECT COUNT(rekognisi.tahun) as totalTahun, rekognisi.*,dosen.* FROM rekognisi INNER JOIN dosen USING(nip) ORDER BY rekognisi.id DESC");
                                                            $total = mysqli_fetch_assoc($totalQuery);

                                                            $totalQuery2 = mysqli_query($connection,"SELECT COUNT(rekognisi.tingkat) as totalTingkat, rekognisi.*,dosen.* FROM rekognisi INNER JOIN dosen USING(nip) WHERE tingkat='wilayah' ORDER BY rekognisi.id DESC");
                                                            $total2 = mysqli_fetch_assoc($totalQuery2);

                                                            $totalQuery3 = mysqli_query($connection,"SELECT COUNT(rekognisi.tingkat) as totalTingkat, rekognisi.*,dosen.* FROM rekognisi INNER JOIN dosen USING(nip) WHERE tingkat='nasional' ORDER BY rekognisi.id DESC");
                                                            $total3 = mysqli_fetch_assoc($totalQuery3);

                                                            $totalQuery4 = mysqli_query($connection,"SELECT COUNT(rekognisi.tingkat) as totalTingkat, rekognisi.*,dosen.* FROM rekognisi INNER JOIN dosen USING(nip) WHERE tingkat='internasional' ORDER BY rekognisi.id DESC");
                                                            $total4 = mysqli_fetch_assoc($totalQuery4);
                                                            ?>
                                                                <tr>
                                                                    <td><strong>Jumlah</strong></td>
                                                                    <td></td>
                                                                    <td><strong>Wilayah : <?= $total2['totalTingkat'] ?></strong></td>
                                                                    <td><strong>Nasional : <?= $total3['totalTingkat'] ?></strong></td>
                                                                    <td><strong>Internasional : <?= $total4['totalTingkat'] ?></strong></td>
                                                                    <td><strong>Total : <?= $total['totalTahun'] ?></strong></td>
                                                                    <td></td>
                                                                </tr>
                                                            <?php
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        