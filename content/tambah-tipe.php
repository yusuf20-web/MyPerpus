<?php
if (isset($_POST['tambah'])) {
    $nama   = $_POST['nama_level'];
    // select, insert, update, delete
    $insert = mysqli_query($koneksi, "INSERT INTO tipe 
    (nama_level) VALUES 
    ('$nama')");
    header("location:?pg=tipe&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$edittipe = mysqli_query($koneksi, "SELECT * FROM tipe WHERE id = '$id'"
);
$rowEdit = mysqli_fetch_assoc($edittipe);

if (isset($_POST['edit'])) {
    $nama = $_POST['nama_level'];
    // ubah tipe kolom apa yang mau di ubah (SET), yang mau di ubah id ke berapa
    $update = mysqli_query($koneksi, "UPDATE tipe SET nama_level='$nama' WHERE id='$id'");
    header("location:?pg=tipe&ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM tipe WHERE id='$id'");
    header("location:?pg=tipe&hapus=berhasil");
}


?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border border-black border-2 p-3">
                <legend class="float-none w-auto px-3"><?php echo nameOfPage() ?> Type </legend>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama tipe</label>
                        <input type="text"
                            class="form-control"
                            name="nama_level"
                            placeholder="Masukkan nama tipe"
                            value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_level'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>