<?php
$tipe = mysqli_query($koneksi, "SELECT * FROM tipe ORDER BY id DESC");
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border border-black border-2 p-3">
                <legend class="float-none w-auto px-3">Data Tipe</legend>
                <div align="right">
                    <a href="?pg=tambah-tipe" class="btn btn-primary">Tambah</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Tipe</th>
                                <th>Dibuat Pada</th>
                                <th>Di Edit Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($rowtipe = mysqli_fetch_assoc($tipe)):
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $rowtipe['nama_level'] ?></td>
                                    <td><?php echo $rowtipe['created_at'] ?></td>
                                    <td><?php echo $rowtipe['updated_at'] ?></td>
                                    <td>
                                        <a id="edit-tipe" data-id="<?php echo $rowtipe['id'] ?>" href="?pg=tambah-tipe&edit=<?php echo $rowtipe['id'] ?>"
                                            class="btn btn-success btn-sm">Edit

                                        </a> |
                                        <a
                                            href="?pg=tambah-tipe&delete=<?php echo $rowtipe['id'] ?>"
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