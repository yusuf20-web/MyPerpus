<?php
if (isset($_POST['tambah'])) {
    $nama   = $_POST['nama_anggota'];
    $email  = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    // sql = structur query language / DML = data manipulation language
    // select, insert, update, delete
    $insert = mysqli_query($koneksi, "INSERT INTO anggota 
    (nama_anggota, email, telepon, alamat) VALUES 
    ('$nama','$email','$telepon','$alamat')");
    header("location:?pg=anggota&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editAnggota = mysqli_query(
    $koneksi,
    "SELECT * FROM anggota WHERE id = '$id'"
);
$rowAnggota = mysqli_fetch_assoc($editAnggota);

if (isset($_POST['edit'])) {
    $nama = $_POST['nama_anggota'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    // ubah user kolom apa yang mau di ubah (SET), yang mau di ubah id ke berapa
    $update = mysqli_query($koneksi, "UPDATE anggota SET nama_anggota='$nama', 
    email='$email', telepon='$telepon', alamat='$alamat' WHERE id='$id'");
    header("location:?pg=anggota&ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM anggota WHERE id='$id'");
    header("location:?pg=anggota&hapus=berhasil");
}


?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border border-black border-2 p-3">
                <legend class="float-none w-auto px-3"><?php echo nameOfPage() ?> Anggota</legend>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama </label>
                        <input type="text"
                            class="form-control"
                            name="nama_anggota"
                            placeholder="Masukkan nama anda"
                            value="<?php echo isset($_GET['edit']) ? $rowAnggota['nama_anggota'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email </label>
                        <input type="email"
                            class="form-control"
                            name="email"
                            placeholder="Masukkan email anda"
                            value="<?php echo isset($_GET['edit']) ? $rowAnggota['email'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Telepon </label>
                        <input type="number"
                            class="form-control"
                            name="telepon"
                            placeholder="Masukkan telepon anda"
                            value="<?php echo isset($_GET['edit']) ? $rowAnggota['telepon'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat </label>
                        <input type="text"
                            class="form-control"
                            name="alamat"
                            placeholder="Masukkan alamat anda"
                            value="<?php echo isset($_GET['edit']) ? $rowAnggota['alamat'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>