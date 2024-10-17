<?php
$anggota = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY id DESC");
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border border-black border-2 p-3">
                <legend class="float-none w-auto px-3">Data Anggota</legend>
                <div align="right">
                    <a href="?pg=tambah-anggota" class="btn btn-primary">Tambah</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Anggota</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($rowAnggota = mysqli_fetch_assoc($anggota)):
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $rowAnggota['nama_anggota'] ?></td>
                                    <td><?php echo $rowAnggota['telepon'] ?></td>
                                    <td><?php echo $rowAnggota['email'] ?></td>
                                    <td><?php echo $rowAnggota['alamat'] ?></td>
                                    <td>
                                        <a id="edit-anggota" data-id="<?php echo $rowAnggota['id'] ?>" href="?pg=tambah-anggota&edit=<?php echo $rowAnggota['id'] ?>"
                                            class="btn btn-success btn-sm">Edit

                                        </a> |
                                        <a
                                            href="?pg=tambah-anggota&delete=<?php echo $rowAnggota['id'] ?>"
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