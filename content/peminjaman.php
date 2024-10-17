<?php
$peminjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN anggota ON anggota.id = peminjaman.id_anggota ORDER BY peminjaman.id DESC");
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border border-black border-2 p-3">
                <legend class="float-none w-auto px-3">Data Peminjaman</legend>
                <div align="right">
                    <a href="?pg=tambah-peminjaman" class="btn btn-primary">Tambah</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Anggota</th>
                                <th>No Pinjaman</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Aksi</th>
                                <!-- <th>Status</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($rowPeminjaman = mysqli_fetch_assoc($peminjaman)):
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $rowPeminjaman['id_anggota'] ?></td>
                                    <td><?php echo $rowPeminjaman['no_pinjaman'] ?></td>
                                    <td><?php echo $rowPeminjaman['tanggal_pinjam'] ?></td>
                                    <td><?php echo $rowPeminjaman['tanggal_pengembalian'] ?></td>
                                    <!-- <td></td> -->
                                    <td>
                                        <a id="edit-peminjaman" data-id="<?php echo $rowPeminjaman['id'] ?>" href="?pg=tambah-peminjaman&detail=<?php echo $rowPeminjaman['id'] ?>"
                                            class="btn btn-success btn-sm">Detail

                                        </a> |
                                        <a
                                            href="?pg=tambah-peminjaman&delete=<?php echo $rowPeminjaman['id'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah anda yakin akan menghapus data ini??')">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </fieldset>
        </div>
    </div>
</div>