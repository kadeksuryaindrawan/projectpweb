<?php
include "../../config/connection.php";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=dosen_tetap.xls");
?>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Dosen Tetap</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Dosen</th>
                                                                <th>NIDN</th>
                                                                <th>Pendidikan Pasca Sarjana</th>
                                                                <th>Bidang Keahlian</th>
                                                                <th>DTPS</th>
                                                                <th>Jabatan Akademik</th>
                                                                <th>Sertifikat Kompetensi</th>
                                                                <th>Matakuliah yang diampu</th>
                                                                <th>Kesesuaian Bidang</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT jabatan.*,dosen.*,mengajar.*,kompetensi.* FROM jabatan INNER JOIN dosen ON jabatan.id = dosen.jabatan_akademik LEFT JOIN mengajar ON mengajar.nip = dosen.nip LEFT JOIN kompetensi ON mengajar.nip = kompetensi.nip WHERE dosen.status_dosen = 'tetap' AND dosen.prodi = mengajar.kode_prodi GROUP BY dosen.nip ORDER BY dosen.nip DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['nama_dosen'])?></td>
                                                                        <td><?=$data['nidn']?></td>
                                                                        <td><?=ucwords($data['pendidikan_terakhir'])?></td>
                                                                        <td><?=ucwords($data['bidang_keahlian'])?></td>
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
                                                                        <td><?=ucwords($data['nama_jabatan'])?></td>
                                                                        <td><?=ucwords($data['nama_sertif'])?></td>
                                                                        <td><?=ucwords($data['nama_matakuliah'])?></td>
                                                                        <td>
                                                                        <?php
                                                                                if($data['kesesuaian_bidang'] == 'y'){
                                                                                    ?>
                                                                                        V
                                                                                    <?php
                                                                                }

                                                                                if($data['kesesuaian_bidang'] == 'n'){
                                                                                    ?>
                                                                                        
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                        <!-- <a class="text-warning" href="./detail_dosen.php?nip=<?php echo $data['nip'] ?>"><button class="btn btn-warning waves-effect waves-light" style="margin-bottom:15px;"><i class="fa fa-search"></i></button></a> -->
                                                                        <a class="text-primary" href="./edit_dosen.php?user_id=<?php echo $data['user_id'] ?>"><button class="btn btn-primary waves-effect waves-light" style="margin-bottom:15px;">Edit</button></a>
                                                                        <a class="text-danger" href="./hapus_dosen.php?user_id=<?php echo $data['user_id'] ?>" onclick = "return confirm('Yakin hapus dosen?')"><button class="btn btn-danger waves-effect waves-light" style="margin-bottom:15px;">Hapus</button></a>
                                                            
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                            }

                                                            $totalQuery = mysqli_query($connection,"SELECT jabatan.*,COUNT(dosen.nip) as total,COUNT(dosen.DTPS) as totalDTPS,dosen.*,mengajar.*,kompetensi.* FROM jabatan INNER JOIN dosen ON jabatan.id = dosen.jabatan_akademik LEFT JOIN mengajar ON mengajar.nip = dosen.nip LEFT JOIN kompetensi ON mengajar.nip = kompetensi.nip WHERE dosen.status_dosen = 'tetap' AND dosen.prodi = mengajar.kode_prodi GROUP BY dosen.nip ORDER BY dosen.nip DESC");
                                                            $total = mysqli_fetch_assoc($totalQuery);
                                                            ?>
                                                                <tr>
                                                                    <td><strong>Jumlah</strong></td>
                                                                    <td><strong>NDT : <?= $total['total'] ?></strong></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td><strong>NDTPS : <?= $total['totalDTPS'] ?></strong></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            <?php
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Hover table card end -->
                                    