<?php
if (isset($_POST['tambah'])) {
    $nama   = $_POST['nama_kategori'];
    // select, insert, update, delete
    $insert = mysqli_query($koneksi, "INSERT INTO kategori 
    (nama_kategori) VALUES 
    ('$nama')");
    header("location:?pg=kategori&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id = '$id'"
);
$rowEdit = mysqli_fetch_assoc($editKategori);

if (isset($_POST['edit'])) {
    $nama = $_POST['nama_kategori'];
    // ubah kategori kolom apa yang mau di ubah (SET), yang mau di ubah id ke berapa
    $update = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$nama' WHERE id='$id'");
    header("location:?pg=kategori&ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM kategori WHERE id='$id'");
    header("location:?pg=kategori&hapus=berhasil");
}


?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border border-black border-2 p-3">
                <legend class="float-none w-auto px-3"><?php echo nameOfPage() ?> User</legend>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Kategori</label>
                        <input type="text"
                            class="form-control"
                            name="nama_kategori"
                            placeholder="Masukkan nama kategori"
                            value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_kategori'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>