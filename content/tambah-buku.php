<?php
if (isset($_POST['tambah'])) {
    $nama            = $_POST['nama_buku'];
    $penerbit        = $_POST['penerbit'];
    $tahun           = $_POST['tahun_terbit'];
    $pengarang       = $_POST['pengarang'];
    $id_kategori        = $_POST['id_kategori'];
    // select, insert, update, delete
    $insert = mysqli_query($koneksi, "INSERT INTO buku 
    (id_kategori, nama_buku, penerbit, tahun_terbit, pengarang) VALUES 
    ('$id_kategori','$nama','$penerbit','$tahun','$pengarang')");
    header("location:?pg=buku&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editBuku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id = '$id'"
);
$rowEdit = mysqli_fetch_assoc($editBuku);

if (isset($_POST['edit'])) {
    $nama            = $_POST['nama_buku'];
    $penerbit        = $_POST['penerbit'];
    $tahun           = $_POST['tahun_terbit'];
    $pengarang       = $_POST['pengarang'];
    $id_kategori      = $_POST['id_kategori'];
    // ubah buku kolom apa yang mau di ubah (SET), yang mau di ubah id ke berapa
    $update = mysqli_query($koneksi, "UPDATE buku SET id_kategori='$id_kategori', nama_buku='$nama', penerbit='$penerbit', tahun_terbit='$tahun', pengarang='$pengarang' WHERE id='$id'");
    header("location:?pg=buku&ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM buku WHERE id='$id'");
    header("location:?pg=buku&hapus=berhasil");
}

$queryKategori = mysqli_query($koneksi,"SELECT * FROM kategori");



?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border border-black border-2 p-3">
                <legend class="float-none w-auto px-3"><?php echo nameOfPage() ?> Buku</legend>
                <form action="" method="post">
                <div class="mb-3">
                        <label for="" class="form-label">Nama Kategori</label>
                        <select name="id_kategori" class="form-control" id="">
                            <!-- OPTION YANG DI AMBIL DARI TABEL KATEGORI -->
                            <option value="">Pilih Kategori</option>
                            <?php while ($rowKategori = mysqli_fetch_assoc($queryKategori)): ?>
                                <option <?php echo isset($_GET['edit'])?($rowKategori['id'] == $rowEdit['id_kategori'] ? 'selected' : '') : '' ?>  value="<?php echo $rowKategori['id']?>">
                                <?php echo $rowKategori['nama_kategori']?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                <div class="mb-3">
                        <label for="" class="form-label">Nama buku</label>
                        <input type="text" class="form-control" name="nama_buku" placeholder="Masukkan nama buku" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_buku'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" placeholder="Masukkan penerbit" value="<?php echo isset($_GET['edit']) ? $rowEdit['penerbit'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tahun Terbit</label>
                        <input type="text" class="form-control" name="tahun_terbit" placeholder="Masukkan tahun terbit" value="<?php echo isset($_GET['edit']) ? $rowEdit['tahun_terbit'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" placeholder="Masukkan nama pengarang" value="<?php echo isset($_GET['edit']) ? $rowEdit['pengarang'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>