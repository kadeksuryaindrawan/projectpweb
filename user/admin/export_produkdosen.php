<?php
include "../../config/connection.php";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=produk_dosen.xls");
?>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Daftar Produk Dosen</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Dosen</th>
                                                                <th>Nama Produk</th>
                                                                <th>Deskripsi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $query = mysqli_query($connection, "SELECT produk_dosen.*,dosen.* FROM produk_dosen INNER JOIN dosen USING(nip) ORDER BY produk_dosen.id DESC");
                                                            $nomor = 1;
                                                            while($data = mysqli_fetch_assoc($query)){
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?=$nomor++?></th>
                                                                        <td><?=ucwords($data['nama_dosen'])?></td>
                                                                        <td><?=ucwords($data['nama_produk'])?></td>
                                                                        <td><?=ucfirst($data['deskripsi'])?></td>
                                                                        
                                                                    </tr>
                                                                <?php
                                                            }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        